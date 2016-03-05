<html>
    <head>
		<meta charset="UTF-8">
        <title>PHP - Creación</title>
    </head>
    <body>
        <?php
            if($_POST['create']){
				
                function crear_base($connec,$database) {
                    echo "Correcto.<br/>";
                    $creacion_database_sql = "create database ".$database.";";
                    echo "<br/>";
                    echo "<ul>";
                    echo "<li>COMANDO: ".$creacion_database_sql."</li>";
                    $result = $connec->query($creacion_database_sql);
                    if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> ERROR - A Base xa existe.";
                    }
                    echo "<br/><br/>";
                }
				
                function crear_tablas($connec,$database) {
                    $creacion_table_clientes_sql = "create table clientes ("
                                . " DNI char(9) primary key,"
                                . " nombre varchar(20),"
                                . " apellido1 varchar(20),"
                                . " apellido2 varchar(20),"
                                . " telefono int);";
                    echo "<li>COMANDO: ".$creacion_table_clientes_sql."</li>";
                    $result = $connec->query($creacion_table_clientes_sql);
                    if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> ERROR - A tabla xa existe.";
                    }
                    echo "<br/><br/>";
                    $creacion_table_ventas_sql = "create table ventas ("
                                . " Cod_venta int primary key,"
                                . " cliente char(9),"
                                . " modelo varchar(20),"
                                . " foreign key (cliente) references clientes(DNI));";
                    echo "<li>COMANDO: ".$creacion_table_ventas_sql."</li>";
                    $result = $connec->query($creacion_table_ventas_sql);
                    if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> ERROR - A tabla xa existe.";
                    }
                        echo "<br/><br/>";

                    $creacion_table_catalogo_sql = "create table catalogo ("
                                . " Id_coche int primary key,"
                                . " nombre varchar(20),"
                                . " precio int);";
                    echo "<li>COMANDO: ".$creacion_table_catalogo_sql."</li>";
                    $result = $connec->query($creacion_table_catalogo_sql);
                    if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> ERROR - A tabla xa existe.";
                    }
                    echo "</ul>";
                }
            }
        ?>
        <?php
            if($_POST['create']){

                $servername = "localhost";
                $username = "root";
                $password = "";
                $databasename = "concesionarios";

                echo "Conectando a MySQL... ";
                $connection = new mysqli($servername, $username, $password);
               
                if ($connection->connect_error) {
                   die("Error: " . $connection->connect_error);
                }
               
                crear_base($connection,$databasename);
               
                $connection = new mysqli($servername, $username, $password, $databasename);
                    echo "<li>Conectando a Base de Datos '".$database."'...<br/>";
                    if ($connection->connect_error) {
                        die("Error: " . $connection->connect_error);
                    }
                echo "> Correcto</li><br/>";
               
                crear_tablas($connection,$databasename);
            } else {
                echo "Necesitas acceder dende 'index.php'<br/>";
            }
        ?>
        <br/>
        <form method="get" action="index.php">
            <button type="submit">Índice</button>
        </form>
    </body>
</html>
    