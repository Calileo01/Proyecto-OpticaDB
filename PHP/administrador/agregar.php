<?php

    $mysqli= new mysqli("localhost","root","","opticadb");

    if (isset($nombre_ven) == null OR isset($apellido_ven) OR isset($cedula_ven) OR isset($telefono_ven) OR isset($correo_ven)) {
        echo '<script>alert("Debe colocar todos los Datos");window.location.href="agregar_vendedor.php";</script>';
    } else {
            
$nombre_ven = $_POST['nombre_ven'];
$apellido_ven = $_POST['apellido_ven'];
$cedula_ven = $_POST['cedula_ven'];
$telefono_ven = $_POST['telefono_ven'];
$correo_ven = $_POST['correo_ven'];

$insercion = "INSERT vendedores SET
nombre_vendedor   ='$nombre_ven',
apellido_vendedor ='$apellido_ven',
cedula            ='$cedula_ven',
telefono          ='$telefono_ven',
correo            ='$correo_ven'";

$resultado=$mysqli->query($insercion);
if($resultado){
    echo '<script>alert("Vendedor agregado exitosamente");window.location.href="agregar_vendedor.php";</script>';
}
else{
    echo "Hubo un error al intentar grabar los datos a la base de datos";
    }
}

$mysqli->close();
?>