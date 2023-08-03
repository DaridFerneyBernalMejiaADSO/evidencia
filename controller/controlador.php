<?php
// Indicamos que trabajaremos en directorio que estamos situados (__DIR__)
//Incluimos el fichero de configuración 
require_once('../config/config.php');
//Incluimos la clase conexion a la base de datos
require_once('../libs/Database.php');
// Incluimos la clase usuario
require_once('../model/User.php');




//Creamos la instancia de la clase conexion a la base de datos
$database = new Database();
//Llamamos el metodo conexion que es quien nos retorna la conexion a la base de datos
$connection = $database->getConnection();
//Creamos la instancia del modelo usuario y pasamos la conexion a la base de datos
$userModel = new User($connection);






//verificamos si esta pasado por el post y le cambiamos el nombre a los name por una variable y luego los enviamos por el set
if (isset($_POST['Firs_name'])) {
    $nombre = $_POST['Firs_name'];
    $apellido = $_POST['Last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nacimiento = $_POST['fecha_nacimiento'];
    


    $userModel->setNombre($nombre);
    $userModel->setApellido($apellido);
    $userModel->setEmail($email);
    $userModel->setPhone($phone);
    $userModel->setNacimiento($nacimiento);
    

    

    // ponemos los nombres de la variable 
    //ponemos los nombres de las variables 
    //error es igual a la funcion de validacion y le pasamos los parametros
    $errors = validacion($nombre, $apellido, $email, $phone, $nacimiento);

    //el error se queda en el controlodor poque aca es la validacion
    if (empty($errors)) {
        // esta bien
        $userModel->guardar();
        //SE REDIRIGE AL INDEX
        header('Location:../vista/index.php');





    } else {

        // La validación falló
        foreach ($errors as $error) {

            echo $error . "<br>";
            //LO ENVIO AL INDEX.PHP
            header('Location:../vista/index.php');
        }
    }





}
//validacion DEL CODIGO
function validacion($nombre, $apellido, $email, $phone, $nacimiento)
{
    $errors = [];

    if (empty($nombre)) {
        $errors[] = "El nombre es obligatorio.";
    }

    if (empty($apellido)) {
        $errors[] = "El apellido es obligatorio.";
    }

    if (empty($email)) {
        $errors[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico no es válido.";
    }

    if (empty($phone)) {
        $errors[] = "El teléfono es obligatorio.";
    }

    if (empty($nacimiento)) {
        $errors[] = "La fecha de nacimiento es obligatoria.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $nacimiento)) {
        $errors[] = "La fecha de nacimiento debe tener el formato 'YYYY-MM-DD'.";
    }

    return $errors;
}




// TRAER LA FUNCION ELIMINAR
if (isset($_POST['eliminar'])) {
    $datos = $_POST['identificador'];
    $userModel->setDatos($datos);
    $userModel->Eliminar();
}
//------------------------------

//actualizar
$userModel->actualizar();



// $users = $userModel->getAll();



//$users = $userModel->getAll();

//header('Location:../vista/index.php');

//-----------------------------------------------
?>