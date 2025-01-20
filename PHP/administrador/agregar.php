<?php

    $mysqli= new mysqli("localhost","root","","opticadb");

    $nombre_ven = $_POST['nombre_ven'];
    $apellido_ven = $_POST['apellido_ven'];
    $cedula_ven = $_POST['cedula_ven'];
    $telefono_ven = $_POST['telefono_ven'];
    $correo_ven = $_POST['correo_ven'];

  
    if (empty($nombre_ven) || empty($apellido_ven) || empty($cedula_ven) || empty($telefono_ven) || empty($correo_ven)) {
        echo '<script>alert("Debe colocar todos los Datos");window.location.href="agregar_vendedor.php";</script>';
    } else {
    
    $insercion = $mysqli->prepare("INSERT INTO vendedores (nombre_vendedor, apellido_vendedor, cedula, telefono, correo) VALUES (?, ?, ?, ?, ?)");
    $insercion->bind_param("sssss", $nombre_ven, $apellido_ven, $cedula_ven, $telefono_ven, $correo_ven);

    if ($insercion->execute()) {
        echo '<script>alert("Vendedor agregado exitosamente");window.location.href="agregar_vendedor.php";</script>';
    } else {
        echo "Hubo un error al intentar grabar los datos a la base de datos";
    }
    $insercion->close();
}
$mysqli->close();
?>