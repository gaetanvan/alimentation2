<?php

namespace App;
use PDO;
class Food
{

    static function getFood($id) {
        $db = new PDO('mysql:host=localhost;dbname=alimentation', 'root', '');
        $food = $db->prepare('SELECT * FROM food WHERE userID = ?');
        $food->execute($id);
        $foodInfo = $food->fetchAll();
        return $foodInfo;
    }
    /**
     * @var string[] tableau des nom de nourriture
     */
    public $foodName = array("BigMac", "Tomate", "Wrap", "Pizza");
    /**
     * @var int[] tableau des calories par nourriture
     */
    public $foodCalories = array(504, 205, 536, 864);
}