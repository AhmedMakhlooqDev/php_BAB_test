<?php 

class User{

private $USER_ID;
private $USERNAME;
private $PASSWORD;
private $EMAIL;
private $USER_TYPE;

public function getUserId() {
    return $this->USER_ID;
}

public function setUserId($USER_ID) {
    $this->USER_ID = $USER_ID;
}

public function getUsername() {
    return $this->USERNAME;
}

public function setUsername($USERNAME) {
    $this->USERNAME = $USERNAME;
}

public function getPassword() {
    return $this->PASSWORD;
}

public function setPassword($PASSWORD) {
    $this->PASSWORD = $PASSWORD;
}

public function getEmail() {
    return $this->EMAIL;
}

public function setEmail($EMAIL) {
    $this->EMAIL = $EMAIL;
}

public function getUserType() {
    return $this->USER_TYPE;
}

public function setUserType($USER_TYPE) {
    $this->USER_TYPE = $USER_TYPE;
}

public function initWith($user_id, $username, $password, $email, $user_type) {
    $this->USER_ID = $user_id;
    $this->USERNAME = $username;
    $this->PASSWORD = $password;
    $this->EMAIL = $email;
    $this->USER_TYPE = $user_type;
}

public function SignUp(){

}


public function IsAdmin(){
    
}

public function Login(){

}



}



?>