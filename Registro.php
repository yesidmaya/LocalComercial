<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $passwor = "";
        $dbname = "empresa";

        //CREATE CONNECTION
        $connection = new mysqli($servername, $username, $passwor, $dbname);
        //CHECK CONNECTION
        if($connection->connect_error){
            echo "<script>
                alert('No hay coneccion con base de datos');
                window.location= 'index.php'
            </script>";
            
            die("Connection faliled: " . $connection->connect_error);
        
        }
        else{
            $nomempresa = $_POST['txtnomempresa'];
            $nit = $_POST['txtnit'];
            $telefono = $_POST['txttelefono'];
            $direccion = $_POST['txtdireccion'];
            $ciudad = $_POST['cboxciudad'];

            $sqlinsert = "
                INSERT into empresas (nit,razonsocial,telefono,direccion,ciudad) values ('$nit','$nomempresa','$telefono','$direccion','$ciudad')
            ";
            $result = mysqli_query($connection,$sqlinsert) or die ("Error al insertar los datos");
            mysqli_close($connection);
            
            echo "<script>
                window.location= 'index.php'
                alert('Datos insertados correctamente');
            </script>";
        }


    ?>
</body>
</html>