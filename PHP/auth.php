<?php 
session_start();

$usu = $_POST['Usuario'];
$pass = $_POST['Contraseña'];

if(empty($usu) OR empty($pass)){
echo"Debe ingresar su Usuario y Contraseña";
exit();
}

$mysqli= new mysqli("localhost","root","","opticadb");

if($mysqli){
    echo"Conexión Exitosa";
}
$query="SELECT * FROM usuarios WHERE nombre_usuario='$usu'";
$result=$mysqli->query($query);

//echo $result->num_rows;

if($result->num_rows==1){
    $row=$result->fetch_assoc();
    if(password_verify($pass,$row['password'])){
        $_SESSION['id_usuario']=$row['id'];
        $_SESSION['nombre_usu']=$row['nombre_usuario'];
        $_SESSION['correo_usu']=$row['correo_usuario'];
        $_SESSION['tipo_usu']=$row['tipo_usuario'];

        header("location:administrador/dashboard.php");
        exit();

    }
    else{
        echo" Contraseña incorrecta";
        exit();
    }
 }
 else{
    echo" Usuario no encontrado";
    exit();
 }

 $mysqli->close();

?>