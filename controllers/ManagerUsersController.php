<?php

require_once 'models/ManagerUsersModels.php';
class ManagerUsersController {
private $conn; 

public function __construct(){
    $this->conn =include 'db.php';
}
    
public function index (){
    include 'views/admin/users/list.php';
}

public function userList(){
    // Pasar la conexión
    $UsersList = new ManagerUsersModels($this->conn);
    $list = $UsersList->list();

    return $list; // Devolver los datos para ser usados en la vista
}



}