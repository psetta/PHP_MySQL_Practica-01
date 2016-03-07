<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Datos coche</title>
    </head>
    <body>
        <?php
            if (is_numeric($_POST["id_coche"])) {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $databasename = "concesionarios";
                
                $connection = new mysqli($servername, $username, $password, $databasename);
                    echo "Conectando a MySQL e a Base de Datos '".$databasename."'...";
                    if ($connection->connect_error) {
                        die("> Error: " . $connection->connect_error);
                    }
                echo "Correcto.";
                echo "<br/><br/>";
                    
                $consulta_sql = "select nombre, precio from catalogo where"
                        . " Id_coche = ".$_POST["id_coche"].";";
                
                echo "<ul>";
                echo "<li>Consulta: ".$consulta_sql."</li>";
                echo "<br/>";
                
                $result = $connection->query($consulta_sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Modelo: ".$row["nombre"]."  <br/>Precio: "
                                . "".$row["precio"]."<br/><br/>";
                    }
                } else {
                    echo "Non hai ningún modelo con ese ID";
                }
                echo "</ul>";
                
            } else {
                echo "Necesita enviar ID de modelo";
            }
        ?>
        <br/>
        <br/>
        <hr/>
        <form method="get" action="modelo_coche.html">
            <button type="submit">Volver</button>
        </form>
    </body>
        
</html>
