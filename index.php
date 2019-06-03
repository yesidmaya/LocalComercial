<!DOCTYPE html>
<html lang="en">
<style>
    .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
    }

    .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    }
</style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <h1 style = "text-align:center">EMPRESAS NACIONALES</h1>
    <h1 style = "text-align:center">Ingresar Empresas</h1>
<head>
    <title>Empresa</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $passwor = "";
        $dbname = "empresa";

        //CREATE CONNECTION
        $connection = new mysqli($servername, $username, $passwor, $dbname);
    ?>

    <form action="Registro.php" method="POST">
        Nombre Empresa: <input type="text" name="txtnomempresa"><br><br>
        Nit: <input type="text" name="txtnit"><br><br>
        Telefono: <input type="text" name="txttelefono"><br><br>
        Dirección: <input type="text" name="txtdireccion"><br><br>
        Ciudad: 
        <select name="cboxciudad">
            <option value="pasto">Pasto</option>
            <option value="bogota">Bogotá</option>
            <option value="cali">Cali</option>
        </select><br><br>
        <input type="submit" value="Registrar Empresa" name = "f1"> <br><br><br>
    </form>

    <br>
    <?php
         //CHECK CONNECTION
         if($connection->connect_error){
             echo "<script>
                 alert('No hay coneccion con base de datos');
                 window.location= 'index.php';
             </script>";
             
             die("Connection faliled: " . $connection->connect_error);
         
         }
        $sqlEmpresa ="
            select 
                e.razonsocial as empresa,
                e.nit as nit,
                e.telefono as telefono,
                e.direccion as direccion,
                e.ciudad
            from
                empresas e
            order by empresa
        ";
        $result = $connection->query($sqlEmpresa);

        echo "<table border = '1' align = 'center'>"; 
            echo "<tr>";
                echo "<td>EMPRESA</td>";
                echo "<td>NIT</td>";
                echo "<td>TELEFONO</td>";
                echo "<td>DIRECCION</td>";
                echo "<td>CIUDAD</td>";
            echo "</tr>";

            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['empresa']."</td>";
                echo "<td>".$row['nit']."</td>";
                echo "<td align = 'center'>".$row["telefono"]."</td>";
                echo "<td>".$row['direccion']."</td>";
                echo "<td>".$row['ciudad']."</td>";
            }
        echo "</table>";
    ?>

    <br>
    <!-- Buscar -->
    <!-- <form action="buscarResult.php" method = "POST" align = "center">
        Buscar Empresa por Ciudad: <input type="text" name = "txtbuscaremp">
        <input type="submit" value="Buscar" name = "buscarResult">
    </form> -->
    <center>
            <div class = "tooltip">
                <a href="buscarResult.php" >
                <!-- <img src="img/botbuscar1.png" type="submit" name = "buscarResult" width = "300" height = "120"> -->
                    <img src="img/botbuscar1.png" type="submit" name = "buscarResult" width = "70" height = "70">
                    <span class="tooltiptext">Buscar Información</span>
                </a>
            </div>

            <div class = "tooltip">
                <a href="Editar.php">
                    <img src="img/editar.png" type="submit" name = "buscarResult" width = "70" height = "70">
                    <span class="tooltiptext">Editar Información</span>
                </a>
            </div>

            <div class = "tooltip">
                <a href="eliminar.php">
                    <img src="img/eliminar1.png" type="submit" name = "buscarResult" width = "70" height = "70">
                    <span class="tooltiptext">Eliminar Información</span>
                </a>
            </div>
    </center>

    <!--Ingresar personas-->

    <!-- <h1 style = "text-align:center">Ingresar Persona</h1>
        <form action="/Registro.php">
            Nombres: <input type="text" name="nombres"> <br><br>
            Apellidos: <input type="text" name="apellidos"> <br><br>
            Telefono: <input type="text" name = "telefono"> <br><br>
            Ciudad Persona: 
            <select name="ciudademp" id="ciudadempid">
                <option value="1">Pasto</option>
                <option value="2">Bogotá</option>
                <option value="3">Cali</option>
            </select> <br><br>
            <input type="submit" value = "Registrar Empleado">
        </form> -->
</body>
</html>