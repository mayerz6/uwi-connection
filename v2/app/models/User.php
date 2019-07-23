<?php

class User{

public $db;

public function __construct(){
    $this->db = new db;
}

public function userLogin($email, $pwd){
    $check = $this->db->authorizeUser($email, $pwd);
        return $check;
}

public function fetchUserData($userId){
    $record = $this->db->retrieveUserIdById($userId);
        return $record;
}

public function addRecord($data){
  $check = $this->db->registerUser($data);
    return $check;
}

public function editRecord($data){
    $check = $this->db->editUser($data);
      return $check;
  }

  public function updateRecord($data){
    $check = $this->db->updateUser($data);
      return $check;
  }

public function checkEmail($email){
    $check = $this->db->checkUserEmail($email);
        return $check;
}

public function showUsers(){
   $records = $this->db->displayAllUsers();
        return $records;
}

public function confirmValidUserById($userId){
    $record = $this->db->checkUserById($userId);
         return $record;
 }

}
