<?php

namespace App;
/**
 * Permet de recuperer la nourriture rentrer
 */
class Food
{
    /**
     * @var string[] tableau des nom de nourriture
     */
    public $foodName = array("BigMac", "Tomate", "Wrap", "Pizza");
    /**
     * @var int[] tableau des calories par nourriture
     */
    public $foodCalories = array(504, 205, 536, 864);
}