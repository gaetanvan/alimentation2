<?php
//Connexion a la BDD
//Connexion
//On recupere les infos du user
require 'class/Autoloader.php';
Autoloader::register();
$user = new User();

//On stock les info food
$foods = new Food();

if (!$user->isLogged){
    header('location: login.php');
    exit;
}
$page = [
    "title"=>"Alim-Entation"
];
include_once("includes/header.php");
?>
<body>
    <div class="containerApp">
        <header>
            <div class="container">
                <div class="row align-items-center">
                        <div class="col">
                            <h1>Alim-Entation</h1>
                        </div>
                        <div class="col-auto">
                        <div><i class="bi bi-person"></i> <?php echo $user->name ?></div>
                        </div>
                </div>
            </div>
        </header>
        <main>
            <section class="dataUser align-items-center">
                <div class="imc col"><?php echo $user->imc; ?></div>
                <div class="col doughnut">
                    <canvas id="myChart"></canvas>
                    <div class="kcal">1200 kcal</div>
                </div>
                <div class="weight col"><?php echo $user->weight; ?> kg</div>
                <div class="custom-shape-divider-bottom-1671193259">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
                    </svg>
                </div>
            </section>
            <section class="date">
                <div class="date text-center py-3"><?php $formatter = new IntlDateFormatter('fr_FR',
                        IntlDateFormatter::FULL,
                        IntlDateFormatter::NONE);echo $formatter->format(time()); ?></div>
            </section>
            <section class="list">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php
                            for ($i = 0;$i < count($foods->foodName); $i++) { ?>
                                <div class="food" >
                                <h3 class="foodName" ><?php echo $foods->foodName[$i]; ?></h3 >
                                <p class="foodCalories" > <?php echo $foods->foodCalories[$i]; ?> kcal</p >
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="text-center">
                <button class="btn btn-dark">+</button>
            </div>
        </footer>
    </div>
    <?php
    include_once 'includes/header.php';
    ?>