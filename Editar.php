<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EditarRegistro</title>
    <h1 align = 'center'>EDITAR EMPRESA</h1>
</head>
<body>
    <?php
        $nameserver = "localhost";
        $username = "root";
        $passwor = "";
        $dbname = "empresa";

        $connection = new mysqli($nameserver,$username,$passwor,$dbname);
 
        $boteditar = "";
        $nit = "";
        $nombreEditar = "";
    ?>

    <br>
    <form action="Editar.php" method = "POST" align = "center">
        Digite el NIT de Empresa: <input type="text" name = "txtNit"><br><br>
        Digite el NUEVO NOMBRE DE LA EMPRESA: <input type="text" name = "txtNombreEdit">
        <input type="submit" value = "Editar" name = "namebutEditar">
    </form>

    <?php
        /* validar boton */
        if(isset($_POST['namebutEditar'])) // isset = si la variable esta definida y no es null
            $boteditar=$_POST['namebutEditar'];

        if($boteditar){
            //echo "hola boton eliminar";
            if($connection->connect_error){
                echo "<script>
                    alert ('No hay coneccion con base de datos.');
                    window.location = 'index.php';
                </script>";

                die("Connection faliled: " . $connection->connect_error);
            }
            else{
                $nit = $_POST['txtNit'];
                $nombreEditar = $_POST['txtNombreEdit'];
                $sqleditar = "
                    
                    UPDATE empresas SET razonsocial = '$nombreEditar'  WHERE nit = '$nit'
                ";
                $resSqlEditar = $connection->query($sqleditar);

                
                if ($resSqlEditar){
                    echo "<script>
                    alert ('REGISTRO EDITADO CON EXITO.');
                    window.location = 'index.php';
                </script>";
                }
                else{
                    echo "<script>
                    alert ('REGISTRO NO EDITADO.');
                    window.location = 'index.php';
                </script>";
                }
            }
        }
        
    ?>

    <br>
    <center>
        <a href="index.php">
            <img src="img/botonregresar.jpg" width = "100" heigth = "50">
        </a>
    </center>
    
</body>
</html>