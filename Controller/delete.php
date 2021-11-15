<?php
if(!session_id()){
    session_start();
    session_regenerate_id();
}
require('../Model/UserManager.php');
require('../Model/Connection.php');

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $con = new Connection();
    $db = $con->getDb();
    $userManager = new UserManager($db);
    $userManager->delete($id);
    echo "user delete";
}

?>