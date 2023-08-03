<?php
require_once "../libs/Database.php";
class User
{
     // Propiedades de la clase
    protected $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    private $nombre;
    private $apellido;
    private $email;
    private $phone;
    private $nacimiento;

    // Métodos "set" para asignar valores a las propiedades
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }





    // -----get--------------------------------------------
    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getEmail()
    {
        return $this->email;
    }
    function getPhone()
    {
        return $this->phone;
    }
    function getNacimiento()
    {
        return $this->nacimiento;
    }

    function getAll()
    //selecionar base de datos 
    {
        $stm = $this->db->prepare("SELECT * FROM profiles");
        $stm->execute();
        return $stm->fetchAll();
    }

    function obtener_edad($fecha_nacimiento){
        $naci = new DateTime($fecha_nacimiento);
        $ahora = new datetime(date("2023-08-02"));
        $diferencia = $ahora->diff($naci);
        $dif= $diferencia->format("%y");
        return $dif;
    
    }
    
    // function edad($edad){
    //     $edad = $this->obtener_edad($this->nacimiento);


    // }
    
    function guardar()
{
    
    // Verificar si el número de teléfono ya existe en la base de datos
    $stmCheck = $this->db->prepare("SELECT COUNT(*) FROM profiles WHERE phone = :phone");
    $stmCheck->bindValue(':phone',$this->phone);  
    $stmCheck->execute();
    $count = $stmCheck->fetchColumn();

    if ($count > 0) {
        // El número de teléfono ya existe en la base de datos, muestra un mensaje de error o maneja la situación adecuadamente
        echo "El número de teléfono ya está registrado.";
    } else {
        
        // El número de teléfono no existe en la base de datos, procede con la inserción
        $stm = $this->db->prepare("INSERT INTO profiles(Firs_name, Last_name, email, phone,	date_birth) VALUES (:nom, :ape, :email, :phone, :naci)");
        $marcadores = [
            ":nom" => $this->nombre,
            ":ape" => $this->apellido,
            ":email" => $this->email,
            ":phone" => $this->phone,
            ":naci" => $this->nacimiento
        ];
        $stm->execute($marcadores);
    }
}

private $datos;
function setDatos($datos){
    $this->datos = $datos;
}
function getDatos(){
    return $this->datos;
}

function eliminar() {
    $stm = $this->db->prepare("DELETE FROM profiles WHERE Id=:id");
    $stm->bindValue(':id', $this->datos);
    $stm->execute();
    header('Location: ../vista/index.php');
}

function actualizar()
{
    // Aquí, realiza la consulta SQL para actualizar el registro
    $stm = $this->db->prepare("UPDATE profiles SET Firs_name=:nom, Last_name=:ape, email=:email, phone=:phone, date_birth=:naci WHERE Id=:da");
    $marcadores = [
        ":nom" => $this->nombre,
        ":ape" => $this->apellido,
        ":email" => $this->email,
        ":phone" => $this->phone,
        ":naci" => $this->nacimiento,
        ":da" => $this->datos,
    ];
    $stm->execute($marcadores);
    header('Location: ../vista/index.php');
    exit; // Importante salir del script después de la redirección
}




}

//     function guardar()
//     {


//         // Verificamos si hay algo en la base de datos
//         $stm = $this->db->prepare("INSERT INTO usuarios(Nombre, venta1, venta2, venta3,	ganvend,ganemp) VALUES (:nom, :ven1, :ven2, :ven3,:ganvend,:ganemp)");
//         $marcadores = [
//             ":nom" => $this->nombre,
//             ":ven1" => $this->venta1,
//             ":ven2" => $this->venta2,
//             ":ven3" => $this->venta3,
//             ":ganvend" => $this->ganvend,
//             ":ganemp" => $this->ganemp
//         ];


//         $stm->execute($marcadores);
//     }

// }
