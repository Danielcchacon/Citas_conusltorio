<?php

require_once 'models/ManagerPacientesModels.php';
class ManagerPacientesController {
private $conn; 

public function __construct(){
    $this->conn =include 'db.php';
}
    
public function index (){
    include 'views/admin/pacientes/list.php';
}

public function pacienteList(){
    // Pasar la conexión
    $UsersList = new ManagerPacientesModels($this->conn);
    $list = $UsersList->list();

    return $list; // Devolver los datos para ser usados en la vista
}



}