<?php
if(!session_id()){
    session_start();
    session_regenerate_id();
}
require('../Model/User.php');
require('../Model/UserManager.php');
require('../Model/Connection.php');
require_once('../View/Home/register.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = array(
        'password' => $_POST['password'],
        'email' => $_POST['email'],
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'address' => $_POST['address'],
        'postalCode' => $_POST['postalCode'],
        'city' => $_POST['city']
    );

    $con = new Connection();
    $db = $con->getDb();

    $user = new User();
    $user->hydrate($userData);

    $userManager = new UserManager($db);
    $rep = $userManager->create($user);
    if($rep){
        header("Location: http://localhost:8888/userManager/Controller/login.php");
        Exit();
    }else{
        echo "error";   
    }

}

?>