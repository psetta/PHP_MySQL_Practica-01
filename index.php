<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Database creation</title>
    </head>
    <body>
        <p>MySQL PHP -  Exercicio</p>
        <hr/>
        <br/>
        <p>1.- Crea una base de datos nueva llamada "concesionario". 
        En  esa  base  de  datos,  crea  tres  tablas  de  la  siguiente 
        forma:</p>
        <ul>
            <li>Tabla "clientes": con los campos "DNI" (string, clave 
            primaria),  "nombre"  ,  "apellido1",  "apellido2" 
            (string) y "telefono" (int). </li>
            <li>Tabla  "ventas":con  los  campos  "Cod_venta"  (int,  clave 
            primaria), "cliente" (string, sera el DNi del cliente 
            -clave foránea-), "modelo" (string). </li>
            <li>Tabla  "catalogo":  con  los  campos  "Id_coche"  (int, 
            clave  primaria),  "nombre"  (string,sera  el  modelo  de 
            coche), "precio" (int).</li>
        </ul>
        <form action="crear_base.php" method="POST">
            <input type="submit" value="Crear Base de Datos" name="create" />
        </form>
        <br/>
        <p>2.- Añade 2 clientes a la tabla clientes, y las dos ventas a la tabla 
        ventas y al menos dos coches a la tabla catálogo (cuyos Id_coche 
        serán 1 y 2 respectivamente). </p>
        <form action="engadir_datos.php" method="POST">
            <input type="submit" value="Engadir datos" name="engadir" />
        </form>
        <br/>
        <p>3.- Crea una web "modelo_coche.html" que contenga un formulario html 
        que recoja el campo Id_coche y nos devuelva el nombre del modelo 
        y el precio del mismo. </p>
        <a href="modelo_coche.html">modelo_coche.html</a>
        <br/>
        <br/>
        <p>4.- Crea una web "carga_coches.html" que permita cargar, mediante un 
        formulario, en la tabla "catalogo" la información recogida en el 
        archivo "coches.csv" que se adjunta.</p>
        <a href="carga_coches.html">carga_coches.html</a>
    </body>
</html>
