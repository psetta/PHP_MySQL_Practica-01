<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    echo "<li>Conectando a Base de Datos '".$database."'...<br/>";
                    if ($connection->connect_error) {
                        die("Error: " . $connection->connect_error);
                    }
                echo "> Correcto</li><br/>";
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
