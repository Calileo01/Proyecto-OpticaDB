<?php

    $mysqli= new mysqli("localhost","root","","opticadb");
    
    $id_ven = $_POST['id'];
    $nombre_ven = $_POST['nombre_ven'];
    $apellido_ven = $_POST['apellido_ven'];
    $cedula_ven = $_POST['cedula_ven'];
    $telefono_ven = $_POST['telefono_ven'];
    $correo_ven = $_POST['correo_ven'];

if (empty($nombre_ven) || empty($apellido_ven) || empty($cedula_ven) || empty($telefono_ven) || empty($correo_ven)) {
    echo '<script>alert("Debe colocar todos los Datos");window.location.href="editar_vendedor.php?id=' . base64_encode($id_ven) . '";</script>';
} else {

 $editar_ven="UPDATE vendedores SET
 nombre_vendedor='$nombre_ven',
 apellido_vendedor='$apellido_ven',
 cedula='$cedula_ven',
 telefono='$telefono_ven',
 correo='$correo_ven'
 WHERE id_vendedor='$id_ven'";

 $resultado= $mysqli->query($editar_ven);

        if ($resultado) {
            echo '<script>alert("Vendedor editado exitosamente");window.location.href="vendedores.php";</script>';
        } else {
            echo "Hubo un error al intentar guardar los datos";
        }
 
 }
    $mysqli->close();
    ?>