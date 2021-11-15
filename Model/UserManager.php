<?php

class UserManager {
    private $db;

    public function __construct($db1) {
        $this->db = $db1;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM `users` WHERE `user_email` =  \"" . $email . "\"";
       $req = $this->db->query($sql);
        
        $user = $req->fetchAll();
        $hash = md5($password);
        
        if($user){
            if($user[0]["user_password"] == $hash){
                echo "sucess";
                var_dump($user);
                $_SESSION["user_id"] = $user[0]["user_id"];
                $_SESSION["user_email"] = $user[0]["user_email"];
                $_SESSION["user_firstName"] = $user[0]["user_firstName"];
                $_SESSION["user_lastName"] = $user[0]["user_lastName"];
                $_SESSION["user_address"] = $user[0]["user_address"];
                $_SESSION["user_postalCode"] = $user[0]["user_postalCode"];
                $_SESSION["user_city"] = $user[0]["user_city"];
                $_SESSION["user_admin"] = $user[0]["user_admin"];
            }else{
                echo "mdp ou email";
            }
        }else{
            echo "mdp ou email";
        }

    }

    public function create(User $user) {
        $req = $this->db->prepare(
            'INSERT INTO users (user_lastName, user_firstName, user_email, user_address, user_postalCode, user_city, user_password, user_admin)
            VALUES (:lastName, :firstName, :email, :address, :cp, :city, :password, 0)'
        );
        return $req->execute(
            array(
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'email' => $user->getEmail(),
                'address' => $user->getAddress(),
                'cp' => $user->getPostalCode(),
                'city' => $user->getCity(),
                'password' => $user->getPassword()
            )
        );
    }
    
    public function findAll() {
        $sql = "SELECT * FROM `users`";
        $req = $this->db->query($sql);
        return $req->fetchAll();
       
    }

    public final function findOne($id) {
        $req = $this->db->prepare(
            'SELECT * FROM users WHERE user_id='.$id
        );

        $req->execute();

        return $req->fetchAll();

    }

    public final function update($user, $id) {
        var_dump($user  );
        $sql = "UPDATE `users` SET `user_email` = \"". $user["email"] . "\", `user_city` = \"". $user["city"] . "\", `user_postalCode` = \"". $user["postalCode"] . "\", `user_address` = \"". $user["address"] . "\" , `user_firstName` = \"". $user["firstName"] . "\" , `user_lastName` = \"". $user["lastName"] . "\" WHERE `users`.`user_id` = 56;";
        $rep = $this->db->query($sql);
        return true;    
    }

    public final function delete($id) {
        $req = $this->db->prepare(
            'DELETE FROM users WHERE user_id='.$id
        );

        $req->execute();
    }
}
