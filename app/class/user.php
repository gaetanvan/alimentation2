<?php
namespace App;

class User
{
    /**
     * @var int id de l'user
     */
    public $id = 1;

    /**
     * @var string nom de l'user
     */
    public $name = "Roger";

    /**
     * @var int age de l'user
     */
    public $age = 21;

    /**
     * @var int poids de l'user
     */
    public $weight = 79;

    /**
     * @var string sexe de l'user
     */
    public $sex = "male";

    /**
     * @var int taille de l'user
     */
    public $size = 173;

    /**
     * @var float imc de l'user
     */
    public $imc = 23.4;

    /**
     * @var string
     */
    public $mail = "roger@gmail.com";

    /**
     * @var bool si l'user est connécté ou pas
     */
    public $isLogged = true;
}