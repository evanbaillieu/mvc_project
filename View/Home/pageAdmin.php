

<?php
    if($_SESSION["user_admin"] == 0){
        echo "vous n'éte pas admin";
    }else{
        echo "bienvenue jeune admin";
        require_once("listuser.php");
    }
    ?>