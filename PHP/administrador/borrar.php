<?php

$mysqli= new mysqli("localhost","root","","opticadb");

$id_ven= base64_decode($_GET['id']);

$eliminar_ven ="DELETE FROM vendedores WHERE id_vendedor='$id_ven'";
$resultado= $mysqli->query($eliminar_ven);

if ($resultado) {
    echo '<script>alert("Vendedor Eliminado con exito");window.location.href="vendedores.php";</script>';
} else {
    echo "Hubo un error al eliminar al vendedor";
}

$mysqli->close();
?>