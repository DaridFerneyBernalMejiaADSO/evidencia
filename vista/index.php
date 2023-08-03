<?php
require_once __DIR__ . '/../model/User.php';
$pdo = new PDO('mysql:host=localhost;dbname=1095787252_sena', 'root', '');
//cargamos dependecias
$usuario = new User($pdo);
$users = $usuario->getAll();



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h1 class="h4">REGISTRAR</h1>
                        </div>
                        <div class="card-body">
                            <form action="../controller/controlador.php" method="post" id="formulario">
                                <div>
                                    <label class="form-label">REGISTRAR</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Firs_name" class="form-label">Firs_name</label>
                                    <input type="text" class="form-control" name="Firs_name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Last_name" class="form-label">Last_name</label>
                                    <input type="text" class="form-control" name="Last_name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fecha_nacimiento" class="form-label">fecha_nacimiento</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento">
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary" id="btn-enviar" name="enviar"
                                        value="calcular">REGISTRAR</button>
                                </div>
                                
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Mostrar los errores en la página -->
            <?php if (!empty($errors)) { ?>
                <div>
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li>
                                <?php echo $error; ?>
                            </li>
                        <?php }
                        ; ?>
                    </ul>
                </div>
            <?php }
            ; ?>







        </div>

    </main>




    <div class="row justify-content-center">
    <div class="col-md-8 mt-4">
        <div class="card">
            <div class="card-body">
                <h3>REGISTRADOS:</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>nombre</th>
                                <th>apellido</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>fecha_nacimiento</th>
                                <th>updated_at</th>
                                <th>edad</th>
                                <th>eliminar</th>
                                <th>actualizar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $key) { ?>
                                <tr>
                                    <!-- aca traemos las columnas de la base de datos -->
                                    <td><?= $key['Id'] ?></td>
                                    <td><?= $key['Firs_name'] ?></td>
                                    <td><?= $key['Last_name'] ?></td>
                                    <td><?= $key['email'] ?></td>
                                    <td><?= $key['phone'] ?></td>
                                    <td><?= $key['date_birth'] ?></td>
                                    <td><?= $key['updated_at'] ?></td>
                                    <td><?= $usuario->obtener_edad($key['date_birth'])?></td>

                                    <td>
                                        <form action="../controller/controlador.php" method="POST">
                                            <input type="hidden" name="identificador" value="<?= $key['Id'] ?>">
                                            <button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="actualizar.php" method="POST">
                                            <input type="hidden" name="identificador" value="<?= $key['Id'] ?>">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



    

</body>

    
</html>