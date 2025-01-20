<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "opticadb");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$usu = $_POST['Usuario'];
$pass = $_POST['Contraseña'];

// Consulta para verificar en la tabla de usuarios
$consulta_usuarios = $mysqli->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
$consulta_usuarios->bind_param("s", $usu);
$consulta_usuarios->execute();
$resultado_usuarios = $consulta_usuarios->get_result();

if ($resultado_usuarios->num_rows == 1) {
    $row = $resultado_usuarios->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        $_SESSION['id_usuario'] = $row['id'];
        $_SESSION['nombre_usu'] = $row['nombre_usuario'];
        $_SESSION['correo_usu'] = $row['correo_usuario'];
        $_SESSION['tipo_usu'] = $row['tipo_usuario'];

        header("location:administrador/dashboard.php");
        exit();
    } else {
        echo '<script>alert("Contraseña incorrecta");window.location.href="../HTML/login.html";</script>';
    }
} else {
    // Consulta para verificar en la tabla de vendedores
    $consulta_vendedores = $mysqli->prepare("SELECT * FROM vendedores WHERE nombre_vendedor = ?");
    $consulta_vendedores->bind_param("s", $usu);
    $consulta_vendedores->execute();
    $resultado_vendedores = $consulta_vendedores->get_result();

    if ($resultado_vendedores->num_rows == 1) {
        $row = $resultado_vendedores->fetch_assoc();
        if (password_verify($pass, $row['password_vendedor'])) {
            $_SESSION['id_usuario'] = $row['id_vendedor'];
            $_SESSION['nombre_usu'] = $row['nombre_vendedor'];
            $_SESSION['correo_usu'] = $row['correo'];
            $_SESSION['tipo_usu'] = 'vendedor';

            header("location:vendedor/dashboard.php");
            exit();
        } else {
            echo '<script>alert("Contraseña incorrecta");window.location.href="../HTML/login.html";</script>';
        }
    } else {
        echo '<script>alert("Usuario no encontrado");window.location.href="../HTML/login.html";</script>';
    }
}

$consulta_usuarios->close();
$consulta_vendedores->close();
$mysqli->close();
?>
