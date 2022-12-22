<?php
namespace App;
require 'Database.php';
use \PDO;
class User
{
    static function login($mail, $password){
        $db = new PDO('mysql:host=localhost;dbname=alimentation', 'root', '');
        $sql = "SELECT * FROM user where mail = '$mail'";
        $result = $db->prepare($sql);
        $result->execute();
        $data = $result->fetchAll();
        if ($result->rowCount() > 0)
        {
            if (password_verify($password , $data[0]['password'])){
                $_SESSION['mail'] = $data[0]['mail'];
                $_SESSION['password'] = $data[0]['password'];
                $_SESSION['userID'] = $data[0]['userID'];
                header('Location:index.php?id='.$_SESSION['userID']);
            }
        }
        else
        {
            echo 'Mot de passe ou mail incorrect.';
        }
    }

    public $isLogged = true;
}