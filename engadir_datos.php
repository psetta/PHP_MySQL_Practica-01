<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - Datos</title>
    </head>
    <body>
        <?php
            if($_POST['engadir']){
		$servername = "localhost";
                $username = "root";
                $password = "";
                $databasename = "concesionarios";
				
		$connection = new mysqli($servername, $username, $password, $databasename);
                    echo "Conectando a MySQL e a Base de Datos '".$databasename."'...";
                    if ($connection->connect_error) {
                        die("> Error: " . $connection->connect_error);
                    }
                echo " Correcto<br/><br/>";
                $engadir_clientes_sql = "insert into clientes values"
                        . " ('12345678M', 'Perico', 'Delos', 'Palotes', 980123456),"
                        . " ('87654321M', 'Paco', 'García', 'García', 970123456);";
                echo "<ul>";
                echo "<li>Comando: ".$engadir_clientes_sql."</li>";
                $result = $connection->query($engadir_clientes_sql);
                if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> Error";
                    }
                echo "<br/><br/>";
                $engadir_ventas_sql = "insert into ventas values"
                        . " (1, '12345678M', 'Peugeot'),"
                        . " (2, '87654321M', 'Ferrari');";
                echo "<li>Comando: ".$engadir_ventas_sql."</li>";
                $result = $connection->query($engadir_ventas_sql);
                if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> Error";
                    }
                echo "<br/><br/>";
                $engadir_ventas_sql = "insert into catalogo values"
                        . " (1, 'Peugeot', 15000),"
                        . " (2, 'Ferrari', 50000);";
                echo "<li>Comando: ".$engadir_ventas_sql."</li>";
                $result = $connection->query($engadir_ventas_sql);
                if ($result==1) {
                        echo "> Correcto.";
                    } else {
                        echo "> Error";
                    }
                echo "</ul>";
		} else {
                echo "Necesitas acceder dende 'index.php'<br/>";
            }
        ?>   
        <br/>
        <hr/>
        <form method="get" action="index.php">
            <button type="submit">Índice</button>
        </form>
    </body>
</html>
