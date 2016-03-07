<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cargar modelos</title>
    </head>
    <body>
        <?php
          if ($_FILES["arquivo"]["name"] and !$_FILES["arquivo"]["error"]) {
            $arquivo = $_FILES["arquivo"]["name"];
            $partes = explode(".", $arquivo); 
            $extension = end($partes);
            if ($extension == "csv") {
                echo "<table border='1'>";
                foreach ($_FILES["arquivo"] as $name => $valor) {
                   echo "<tr>";
                   echo "<td>".$name."</td><td>".$valor."</td>";
                   echo "</tr>";
                }
                echo "</table>";
                echo "<br/>";
                
                $directorio = "Arquivos/";
                
                if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
                    echo "Arquivo subido<br/>";
                    $arquivo = time().$arquivo;
                    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $directorio.$arquivo)) {
                        echo "Arquivo movido a ".$directorio.$arquivo."<br/>";
                        
                        echo "<br/>";
                        
                        //CONECTAR A BASE DE DATOS
                        
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $databasename = "concesionarios";
				
                        $connection = new mysqli($servername, $username, $password, $databasename);
                            echo "Conectando a MySQL e a Base de Datos '".$databasename."'... ";
                            if ($connection->connect_error) {
                                die("> Error: " . $connection->connect_error);
                            }
                        echo "Correcto.<br/><br/>";
                        
                        $csv = array_map('str_getcsv', file($directorio.$arquivo));
                        
                        $engadir_coches_sql = "insert into catalogo values ";
                        $values = "";
                        
                        echo "Modelos a engadir a Base de Datos:<br/>";
                        echo "<ul>";
                        $contador = count($csv);
                        foreach ($csv as $valor) {
                            foreach ($valor as $v) {
                                $contador -= 1;
                                echo "<li>".$v."</li>";
                                $parseado = explode(":", $v);
                                $values = $values."(".$parseado[0].", '".$parseado[1]."', ".$parseado[2].")";
                                if ($contador == 0) {
                                    $values = $values.";";
                                } else {
                                    $values = $values.", ";
                                }
                            }
                        }
                    echo "</ul>";
                    echo "<br/><br/>";
                    echo "Consulta: ".$engadir_coches_sql.$values."<br/>";
                        
                    $result = $connection->query($engadir_coches_sql.$values);
                    if ($result==1) {
                        echo "> Datos engadidos a tabla 'catalogo'.";
                    } else {
                        echo "> Error ao engadir os datos a tabla";
                    }
                        
                    } else {
                        echo "Non se puido mover o arquivo a ".$directorio."<br/>";
                    }
                } else {
                    echo "Error. Non se puido subir o arquivo.";
                }
                
            } else {
                echo "Formato de arquivo erroneo.";
            }
          } else {
              echo "Error.";
          }
        ?>
        <br/>
        <br/>
        <hr/>
        <form method="get" action="carga_coches.html">
            <button type="submit">Volver</button>
        </form>
    </body>
</html>
