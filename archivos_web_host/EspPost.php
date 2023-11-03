<?php
include 'conexion.php';

if ($con) {
    echo "Conexion con base de datos exitosa! ";
    
    
    if(isset($_POST['dato'])) {
        $dato = $_POST['dato'];
        echo "Voltaje: ".$dato;
    }
 
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        echo "/ Sensor: " .$nombre;
        
        date_default_timezone_set('america/costa_rica');
        $fecha_actual = date("Y-m-d H:i:s");

        // Inserta el dato y la fecha en la tabla TB_DHT11
        $consulta = "INSERT INTO TB_DHT11 (dato, nombre,  fecha_actual) VALUES ('$dato','$nombre','$fecha_actual')";
        $resultado = mysqli_query($con, $consulta);

        if ($resultado) {
            echo " Registro en base de datos OK! ";
        } else {
            echo " Falla! Registro BD: " . mysqli_error($con);
        }
    } else {
        echo "Falla! Datos no recibidos.";
    }
} else {
    echo "Falla! Conexion con Base de datos ";   
}
?>
