<!DOCTYPE html>
<html lang="es">
<?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Agregar Vendedor</title>
    <link rel="stylesheet" href="../../CSS/administrador/agregar_vendedor.css">
</head>

<body>
    <div>
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

    <p align="center" style="margin:50px;"><span class="Text_Agregar_Estudiante">Agregar Estudiante</span></p>
    <div class="container">
        <div class="card" style="background-color:brown; border-radius:10px; border:solid black 1px;">
            <div class="card-body">

                <form action="agregar.php" method="POST">
                    <div class="container text-center text-white">
                        <div class="row">
                            <div class="col">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" class="form-control" name="nombre_ven" placeholder="Nombres" maxlength="60" required>
                            </div>
                            <div class="col">
                                <label for=""><b>Apellidos</b></label>
                                <input type="text" class="form-control" name="apellido_ven" placeholder="Apellidos" maxlength="60" required>
                            </div>
                        </div>
                    </div>

                    <div class="container text-center text-white">
                        <div class="row">
                            <div class="col-4">
                                <label for=""><b>Cédula</b></label>
                                <input type="number" class="form-control" name="cedula_ven" placeholder="Cédula" maxlength="8" required>
                            </div>
                            <div class="col-4">
                                <label for=""><b>Telefono</b></label>
                                <input type="text" class="form-control" name="telefono_ven" placeholder="Telefono" maxlength="15" required>
                            </div>
                        </div>
                    </div>

                            <div class="container text-center text-white">
                                <div class="row">
                                    <div>
                                        <label for=""><b>Correo</b></label>
                                        <input type="email" class="form-control" name="correo_ven" placeholder="Correo" maxlength="40" required>
                                    </div>
                                </div>
                            </div>
                        <div class="text-center mt-5">
                            <a href="vendedores.php"><button type="button"class="btn btn-danger">Cancelar</button></a>
                            <button type="submit"class="btn btn-secondary">Borrar</button>
                            <button type="submit"class="btn btn-success">Agregar</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

