<?php
session_start();

if (isset($_SESSION["id_usu"])){
    header("Location:../HTML/Login.html");
    exit();
}
session_destroy();
echo '<script>alert("Hasta Luego"); window.location.href="../HTML/Login.html";</script>';
?>