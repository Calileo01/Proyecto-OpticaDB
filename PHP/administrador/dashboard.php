<!DOCTYPE html>
<html lang="es">
    <?php
    session_start();

    // Verificar si el usuario ha iniciado sesión y es administrador
if (!isset($_SESSION['tipo_usu']) || $_SESSION['tipo_usu'] != 1) {
    // Redirigir al login si no es administrador
    header("location:../../HTML/Login.html");
    exit();
}

    $mysqli= new mysqli("localhost","root","","opticadb");
    $consulta="SELECT*FROM vendedores";
    $resultados=$mysqli->query($consulta);
    $filas=$resultados->fetch_all(MYSQLI_ASSOC);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/administrador/dashboard.css">
    <title>Administrador</title>
</head>
<body>
<header>
    <div class="Title">El Monóculo Bifocal</div>
        <nav>
            <div id="Navegador">
                <ul>
                    <li><a href="vendedores.php">Lista de Vendedores</a></li>
                    <li><a href="../logout.php">Cerrar Sesión (<?php echo $_SESSION['nombre_usu'];?>)</a></li>
                </ul>
            </div>
        </nav>
</header>

    <p align="center" style="margin:50px;"><span class="Wellcome"> Bienvenido <?php echo $_SESSION['nombre_usu'];?></span></p>
<div class="container text-center" style="box-shadow: black 0px 0px 10px 2px; background-color: rgba(0, 0, 0, 0.5);">
    <div class="row">
        <div class="col">
            <div class="container-fluid d-flex align-items-center justify-content-center" style="height:30vh;">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center fs-4 text-white" style="background-color:brown;">Vendedores   
                    </div>
                        <div class="card-body" style="background-color:brown;">
                            <h1 style="color: white;"><?php echo count($filas); ?></h1>
                        </div>
                </div>
            </div>
        </div>
            <div class="col">
                <div class="container-fluid d-flex align-items-center justify-content-center" style="height:30vh;">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header text-center fs-4 text-white" style="background-color:brown;">Administradores
                        </div>
                            <div class="card-body" style="background-color:brown;">
                                <h1 style="color: white;">1</h1>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

