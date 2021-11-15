<?php
    if(!session_id()){
        session_start();
        session_regenerate_id();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>metier entity</title>
</head>
<body>
    <?php
    if($_SESSION['user_id']){
        echo "<h2>bienvenue a toi  </h2>";
        echo  $_SESSION["user_email"];
        require_once "./View/Home/pageAdmin.php";
        
        
    }else{
        echo '<a href="/userManager/Controller/login.php">login</a>
        <a href="/userManager/Controller/register.php">sinscrire</a>';
    }

    ?>
</body>
</html>
