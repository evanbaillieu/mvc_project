<?php
    $id = $_GET["id"];
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
        $user = $userManager->findOne($id);
        var_dump($user);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
        $userData = array(
            'id' => $_POST['id'],
            'email' => $_POST['email'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'address' => $_POST['address'],
            'postalCode' => $_POST['postalCode'],
            'city' => $_POST['city'],
            'is_admin'=> $_POST['admin']
        );
        $con = new Connection();
        $db = $con->getDb();
    
    
        $userManager = new UserManager($db);
        $rep = $userManager->update($userData, $_POST['id']);
        
        echo "<h1>";
        echo $rep;
        echo "</h1>";
        if($rep){
            header("Location: http://localhost:8888/userManager/");
            Exit();
        }else{
            echo "error";   
        }
    
    }
?>
<header>
        <h1>Modification d'un User</h1>
        <h2>l'administeur n'est pas autoriser a modifier les </h2>
    </header>
    <hr />
    <section id="main-section">
        <form action="/userManager/Controller/update.php/" method="POST">
            <label>id :</label><br />
            <input type="text" name="id" value=<?php echo $user[0]["user_id"];?> /><br>
            <label>password :</label><br />
            <input type="password" name="password" value=<?php echo $user[0]["user_password"];?>  /><br>
            <label>Mail :</label><br />
            <input type="email" name="email" value=<?php echo $user[0]["user_email"];?>  /><br>
            <label>Nom :</label><br />
            <input type="text" name="lastName" value="<?php echo $user[0]["user_lastName"];?>"/><br>
            <label>Prénom :</label><br />
            <input type="text" name="firstName" value=<?php echo $user[0]["user_firstName"];?> /><br>
            <label>Adresse :</label><br />
            <input type="text" name="address" value=<?php echo $user[0]["user_address"];?> /><br>
            <label>Code Postal :</label><br />
            <input type="text" name="postalCode" value=<?php echo $user[0]["user_postalCode"];?> /><br>
            <label>Ville :</label><br />
            <input type="text" name="city" value="<?php echo $user[0]["user_city"];?>"/><br>
            <label>is admin :</label><br />
            <input type="text" name="admin" value=<?php echo $user[0]["user_admin"];?>  /><br>
            <p>
                <input type="submit" class="submit-btn" name="submit-create-user" value="Créer/Valider">
            </p>
        </form>
    </section>