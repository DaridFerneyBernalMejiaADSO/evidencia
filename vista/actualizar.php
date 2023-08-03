
<!-- actualizar.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Actualizar Usuario:</h3>
                
                <!-- Formulario de actualización -->
                <form action="../controller/controlador.php" method="POST">

                    <input type="hidden" name="identificador" value="<?= $_POST['identificador'] ?>">
                    <!-- Campos de actualización (nombre, apellido, etc.) -->
                    <div>
                    <label for="Firs_name" class="form-label">Firs_name</label><br>
                    <input type="text" name="Firs_name" value="">
                    </div><br>
                    <div>
                    <label for="Last_name" class="form-label">Last_name</label><br>
                    <input type="text" name="Last_name" value="">
                    </div><br>
                    <div>
                    <label for="email" class="form-label">email</label><br>
                    <input type="text" name="email" value="">
                    </div><br>
                    <div>
                    <label for="phone" class="form-label">phone</label><br>
                    <input type="text" name="phone" value="">
                    </div><br>
                    <div>
                    <label for="fecha_nacimiento" class="form-label">fecha_nacimiento</label><br>
                    <input type="date" name="fecha_nacimiento" value="">

                    </div><br>
                    <div>
                    <button class="btn btn-primary" type="submit" name="actualizar_registro">Actualizar Registro</button>

                    </div><br>
                    
                    
                </form>
                <a href="index.php">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>