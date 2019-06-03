<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EliminarRegistro</title>
    <h1 align = 'center'>EIMINAR EMPRESA</h1>
</head>
<body>
    <?php
        $nameserver = "localhost";
        $username = "root";
        $passwor = "";
        $dbname = "empresa";

        $connection = new mysqli($nameserver,$username,$passwor,$dbname);

        $boteliminar ="";
        $niteliminar = "";
    ?>

    <br>
    <form action="Eliminar.php" method = "POST" align = "center">
        Digite el NIT de Empresa a Eliminar: <input type="text" name = "txtniteliminar">
        <input type="submit" value = "Eliminar" name = "namebutEliminarEmpre">
    </form>

    <?php
        /* validar boton */
        if(isset($_POST['namebutEliminarEmpre'])) // isset = si la variable esta definida y no es null
            $boteliminar=$_POST['namebutEliminarEmpre'];

        if($boteliminar){
            //echo "hola boton eliminar";
            if($connection->connect_error){
                echo "<script>
                    alert ('No hay coneccion con base de datos.');
                    window.location = 'index.php';
                </script>";

                die("Connection faliled: " . $connection->connect_error);
            }
            else{
                $niteliminar = $_POST['txtniteliminar'];
                $sqleliminar = "
                    delete from empresas where nit = '$niteliminar'
                ";
                $ressqlelimina = $connection->query($sqleliminar);

                
                if ($ressqlelimina){
                    echo "<script>
                    alert ('REGISTRO ELIMINADO CON EXITO.');
                    window.location = 'index.php';
                </script>";
                }
                else{
                    echo "<script>
                    alert ('REGISTRO NO SE ELIMINADO.');
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