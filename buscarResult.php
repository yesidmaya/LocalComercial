<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar Registros</title>
    <h1 align = 'center'>BUSQUEDA DE EMPRESAS</h1>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $passwor = "";
        $dbname = "empresa";

        $connection = new mysqli($servername, $username, $passwor, $dbname);
        

        $botbuscarEmp="";
        $emprebuscar="";

    ?>

    <br>
    <form action="buscarResult.php" method = "POST" align = "center">
        Buscar Empresa por Ciudad: <input type="text" name = "txtbuscaremp">
        <input type="submit" value="Buscar" name = "namebotbuscarEmp">
    </form>

    <br>

    <?php
        /* validar boton */
        if(isset($_POST['namebotbuscarEmp']))
            $botbuscarEmp=$_POST['namebotbuscarEmp'];

        if($botbuscarEmp){
            //echo "hola boton buscar";
            /* Verificar coneccion */ 
            if($connection->connect_error){
                echo "<script>
                    alert ('No hay coneccion con base de datos');
                    window.location = 'index.php';
                </script>";

                die("Connection faliled: " . $connection->connect_error);
            }
            else{
                $emprebuscar = $_POST['txtbuscaremp'];
                $sqlListEmpre = "
                    select 
                        em.nit as nit,
                        em.razonsocial as empresa,
                        em.telefono as telefono,
                        em.direccion as direccion,
                        em.ciudad
                    from
                        empresas em
                    where
                        em.ciudad = '$emprebuscar'
                    order by
                        empresa asc
                ";
                $resultListEmpre = $connection->query($sqlListEmpre);

                echo "<table border = '1' align = 'center'>";
                    echo "<tr>";
                        echo "<td>NIT</td>";
                        echo "<td>EMPRESA</td>";
                        echo "<td>TELÉFONO</td>";
                        echo "<td>DIRECCIÓN</td>";
                        echo "<td>CIUDAD</td>";
                    echo "</tr>";
                    while($row = $resultListEmpre->fetch_assoc()){
                        echo "<tr>";
                            echo "<td>".$row['nit']."</td>";
                            echo "<td>".$row['empresa']."</td>";
                            echo "<td>".$row['telefono']."</td>";
                            echo "<td>".$row['direccion']."</td>";
                            echo "<td>".$row['ciudad']."</td>";
                        echo "</tr>";
                    }
                echo "</table>";
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