<?php
if(!session_id()){
    session_start();
    session_regenerate_id();
}
    require('Model/UserManager.php');
    require('Model/Connection.php');
    $con = new Connection();
    $db = $con->getDb();
    $userManager = new UserManager($db);
    $rep = $userManager->findAll();
    ?>

<table>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>firstname</th>
        <th>lastName</th>
        <th>address</th>
        <th>postalCode</th>
        <th>city</th>
        <th>is admin</th>
        <th>delete</th>
        <th>modifier</th>
    </tr>
<?php
    foreach($rep as $user){
        ?>
    <tr>
        <td><?php echo $user["user_id"];?></td>
        <td><?php echo $user["user_email"];?></td>
        <td><?php echo $user["user_firstName"];?></td>
        <td><?php echo $user["user_lastName"];?></td>
        <td><?php echo $user["user_address"];?></td>
        <td><?php echo $user["user_postalCode"];?></td>
        <td><?php echo $user["user_city"];?></td>
        <td><?php echo $user["user_admin"];?></td>
        <td><a href=<?php echo"Controller/delete.php/?id=";
                          echo $user["user_id"];?>>delete</a>
        <td><a href=<?php echo"Controller/update.php/?id=";
                          echo $user["user_id"];?>>modifie</a>
    </tr>

<?php
    }
    ?>
</table>
    
