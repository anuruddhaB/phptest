<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new mainClass();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new mainClass();
    $classObject->$methodName();
}

class mainClass {
    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "php_test_db");
    }

    function registration(){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $nic = $_POST['nic'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);
        try {
            $query = "insert into user_reg values('$nic','$name','$email','$contact','$address','$password','$username')";
            $this->connection->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    function login(){
        $username = $_POST['username'];
        $userpassword =md5($_POST['password']);
        try {

                $query = "select * from user_reg where username='$username'";
                $resultSet = $this->connection->query($query);
                if ($row = $resultSet->fetch_assoc()) {
                    $password = $row['password'];
                }
                if($userpassword == $password){
                    echo 1;
                }else{
                    echo 0;
                }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }


    }
}

