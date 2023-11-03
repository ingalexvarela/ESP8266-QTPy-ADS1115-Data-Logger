<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="refresh" content="1" charset="UTF-8">
    <title>Visor de datos recolectados con IoT</title>
    <style>
        body {
            font-family: monospace;
            background-color: rgb(4, 2, 7);
        }

        h1 {
            color: white;
            margin: 5px;
            text-align: center;
            margin: 50px;
            font-size: 30px;
        }
        
        h2 {
            color: #FFFF00; /* Color amarillo */
            margin: 5px;
            text-align: center;
            margin: 50px;
            font-size: 30px;
        }
        
        

        h4 {
            color: purple;
            margin: 5px;
            text-align: center;
            margin: 50px;
            font-size: 24px;
        }

        .barraTemp {
            height: 200px;
            width: 190px;
            background-color: rgba(0, 0, 0, 0.795);
            margin: auto;
            border-radius: 50%;
            overflow: hidden;
        }

        .cont {
            height: 100px;
            width: 200px;
        }

        .CirculoCentro {
            height: 150px;
            width: 150px;
            background-color: rgb(4, 2, 7);
            border-radius: 50%;
            margin: auto;
            position: relative;
            margin: -175px auto 50px;
        }

        .Rectangulo {
            height: 100px;
            width: 200px;
            background-color: rgb(4, 2, 7);
            position: relative;
            margin: -125px auto 50px;
        }
    </style>
</head>

<body>
    <h1>Visor de datos recolectados con IoT</h1>

    <h4>
        <?php
        include 'conexion.php';
        
        // Crea la conexión
        $conn = mysqli_connect($server, $user, $pass, $db);
        
        // Verifica la conexión
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        
        // Selecciona la base de datos
        mysqli_select_db($conn, $db);
        
        // Selecciona la última fila de la tabla TB_DHT11
        $sql = "SELECT * FROM TB_DHT11 ORDER BY fecha_actual DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        // Obtener el valor de 'dato' desde la base de datos
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dato = $row["dato"];
            $nombre = $row["nombre"];
            $fecha_actual = $row["fecha_actual"];
        }
        
        mysqli_close($conn);
        ?>
    </h4>
    
    <h2 style="font-size: 22px; position: relative; margin: -0px auto 50px;">
        <span style="color: purple;">Voltaje leído:</span> <span style="color: yellow;"><?php echo $dato; ?></span>
    </h2>
    
    <h2 style="font-size: 22px; position: relative; margin: -0px auto 50px;">
        <span style="color: purple;">Sensor leído:</span> <span style="color: yellow;"><?php echo $nombre; ?></span>
    </h2>
    

    <h4 style="font-size: 22px; position: relative; margin: -0px auto 50px;">
        <span style="color: purple;">Fecha del registro:</span> <span style="color: yellow;"><?php echo $fecha_actual; ?></span>
    </h4>
</body>

</html>
