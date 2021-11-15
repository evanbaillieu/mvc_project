<?php
if(!session_id()){
    session_start();
    session_regenerate_id();
}
require('../Model/User.php');
require('../Model/UserManager.php');
require('../Model/Connection.php');
require_once('../View/Home/login.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con = new Connection();
    $db = $con->getDb();
    $userManager = new UserManager($db);
    $rep = $userManager->login($email, $password);
    var_dump($_SESSION);
    if($_SESSION["user_id"]){
        echo "success";
        header("Location: http://localhost:8888/userManager/");
        Exit();
    }else{
        echo "error";   
    }
    

}

?>