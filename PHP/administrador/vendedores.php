<!DOCTYPE html>
<html lang="es">
    <?php
    session_start();
    $mysqli= new mysqli("localhost","root","","opticadb");
    $consulta="SELECT*FROM vendedores";
    $resultados=$mysqli->query($consulta);
    $filas=$resultados->fetch_all(MYSQLI_ASSOC);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/administrador/vendedores.css">
    <title>Administrador</title>
    
</head>
<body>
<header>
        <div class="Title">El Monóculo Bifocal</div>
            <nav>
                <div id="Navegador">
                    <ul>
                        <li><a href="vendedores.php">Lista de Vendedores</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="../logout.php">Cerrar Sesión (<?php echo $_SESSION['nombre_usu'];?>)</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <p align="center" style="margin:50px;"><span class="Wellcome">Usuarios Vendedores</span></p>

        <div class="container table-scroll" style="border: black solid 1px; background-color: white; padding:10px;">
            <table class="container">

                <div class="card">
                    <div class="card-header">   
                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <a href="agregar_vendedor.php"><button class="btn text-white"style="background-color:brown;">Agregar Vendedores</button></a>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                                <div class="col">
                                    Column
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <thead>
                    <tr align="center"class="text-white" style="background-color: rgb(77, 9, 9);">
                        <th style="border-radius:10px 0px 0px 10px;">#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th style="border-radius:0px 10px 10px 0px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num=1;
                    foreach($filas as $fila){
                    ?>
                    <tr>
                        <td style="border-radius: 10px 0px 0px 10px;"><?php echo $num++;?></td>
                        <td><?php echo $fila['nombre_vendedor'];?></td>
                        <td><?php echo $fila['apellido_vendedor'];?></td>
                        <td><?php echo $fila['cedula'];?></td>
                        <td><?php echo $fila['telefono'];?></td>
                        <td><?php echo $fila['correo'];?></td>
                        <td align="center"style="border-radius: 0px 10px 10px 0px;"><button type="buttom" class="btn btn-warning">Editar</button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
//session_start();
//echo "Bienvenido ".$_SESSION['nombre_usu'];
?>
