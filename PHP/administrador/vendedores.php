<!DOCTYPE html>
<html lang="es">
    <?php
    session_start();
    $mysqli= new mysqli("localhost","root","","opticadb");
    $consulta="SELECT*FROM vendedores";
    $resultados=$mysqli->query($consulta);
    $filas=$resultados->fetch_all(MYSQLI_ASSOC);
  
    if (isset($_POST['busqueda'])){
        $termino_busqueda=$mysqli->real_escape_string($_POST['busqueda']);

        $consulta_buscar="SELECT*FROM vendedores WHERE (nombre_vendedor LIKE '%$termino_busqueda%') OR (apellido_vendedor LIKE '%$termino_busqueda%')";
        $resultados_busqueda=$mysqli->query($consulta_buscar);
        $filas_busqueda=$resultados_busqueda->fetch_all(MYSQLI_ASSOC);
    }
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

        <div class="container table-scroll" style="border: black solid 1px; background-color: rgb(77, 9, 9); padding:10px;">
            <table class="container">

                <div class="card">
                    <div class="card-header">   
                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <a href="agregar_vendedor.php"><button class="btn text-white"style="background-color:brown;">Agregar Vendedores</button></a>
                                </div>
                                <div class="col">
                                    <form action="vendedores.php" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" name="busqueda" class="form-control" placeholder="Escribe para buscar" aria-describedby="basic-addon1">
                                            <button type="submit"class="btn bg-warning">Buscar</button>
                                            <a href="vendedores.php"><button class="btn btn-secondary">Limpiar</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                            <div class="container text-center">
                                <?php 
                                if (isset($_POST['busqueda'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php
                                    echo "Los resultados de la búsqueda para: " . htmlspecialchars($_POST['busqueda']);
                                    ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php } ?>
                                 
        
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
                                    if (isset($_POST['busqueda'])) {
                                    $num=1;
                                    foreach($filas_busqueda as $fila_busqueda){
                                    ?>
                                    <tr>
                                        <td style="border-radius: 10px 0px 0px 10px;"><?php echo $num++;?></td>
                                        <td><?php echo $fila_busqueda['nombre_vendedor'];?></td>
                                        <td><?php echo $fila_busqueda['apellido_vendedor'];?></td>
                                        <td><?php echo $fila_busqueda['cedula'];?></td>
                                        <td><?php echo $fila_busqueda['telefono'];?></td>
                                        <td><?php echo $fila_busqueda['correo'];?></td>
                                        <td align="center"style="border-radius: 0px 10px 10px 0px;"><a href="editar_vendedor.php?id=<?php echo base64_encode($fila_busqueda['id_vendedor']);?>"><button type="buttom" class="btn btn-warning">Editar</button></a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="Modal_eliminar_<?php echo $fila_busqueda['id_vendedor'];?>">Eliminar</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="#Modal_eliminar_<?php echo $fila_busqueda['id_vendedor'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: rgb(77, 9, 9);">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Vendedor</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white;"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-black">¿Está seguro que desea el vendedor (<?php echo $fila_busqueda['nombre_vendedor'].' '.$fila_busqueda['apellido_vendedor'];?>)?</p>
                                                        </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <a href="borrar.php?id=<?php echo base64_encode($fila_busqueda['id_vendedor']);?>"><button type="buttom" class="btn btn-danger">Eliminar</button></a>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                            
                                    </tr>
                                    <?php
                                    }
                                    
                                    } else {
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
                                            <td align="center"style="border-radius: 0px 10px 10px 0px;"><a href="editar_vendedor.php?id=<?php echo base64_encode($fila['id_vendedor']);?>"><button type="buttom" class="btn btn-warning">Editar</button></a>
                                            <button type="buttom" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal_eliminar_<?php echo $fila['id_vendedor'];?>">Eliminar</button>

                                                    <!-- Modal -->
                                                <div class="modal fade" id="Modal_eliminar_<?php echo $fila['id_vendedor'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: rgb(77, 9, 9);">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Vendedor</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white;"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p class="text-black">¿Está seguro que desea eliminar este vendedor (<?php echo $fila['nombre_vendedor'].' '.$fila['apellido_vendedor'];?>)?</p>
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <a href="borrar.php?id=<?php echo base64_encode($fila['id_vendedor']);?>"><button type="buttom" class="btn btn-danger">Eliminar</button></a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    
                                ?>
                                    
                                </tbody>
                            </div>
        </div>          

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

