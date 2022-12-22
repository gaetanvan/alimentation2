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
        if($result-> rowCount() > 0)
        {
            if (\password_verify($password , $data[0]['password'])){
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

    static function getInfo($id){
        $db = new PDO('mysql:host=localhost;dbname=alimentation', 'root', '');
        $sqlUser = "SELECT * FROM user where userID = '$id'";
        $resultUser = $db->prepare($sqlUser);
        $resultUser->execute();
        $dataUser = $resultUser->fetch();
        return $dataUser;
    }

    static function createUser($name, $age, $size, $weight, $mail,$password,$imc){
        $db = new PDO('mysql:host=localhost;dbname=alimentation', 'root', '');
        $insertUser = $db->prepare('INSERT INTO user (name,age,size,weight, mail, password,imc) VALUES (? , ? , ?, ?, ?, ?, ?)');
        $insertUser->execute(array($name, $age, $size, $weight, $mail,$password,$imc));
    }
}