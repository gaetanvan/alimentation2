<?php
//Connexion a la BDD
//Connexion
//On recupere les infos du user
use \App\Autoloader;
use \App\Food;
use \App\User;
use \App\Database;


require 'app/class/Autoloader.php';
Autoloader::register();
$user = new User();
$db = new Database('alimentation');
$datas = $db->query('SELECT * from user');
$id = array($_GET['id']);

if (isset($_POST['enter'])) {
    $foodName = $_POST['meal'];
    $foodWeight = $_POST['kcal'];
    $foodDate = date('Y-m-d');
    $userID = 1;
    $insertFood = $db->prepare('INSERT INTO food (userID, foodName , foodWeight, foodDate) 
    VALUES (? , ? , ? , ?)', array($userID, $foodName, $foodWeight, $foodDate));
}
$mail = 'roger@gmail.com';
$db = new PDO('mysql:host=localhost;dbname=animodo', 'root', '');
$sql = "SELECT * FROM user where mail = '$mail'";
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetch();
var_dump($data['name']);

//On stock les info food
$food = $db->prepare('SELECT * FROM food WHERE userID = ?', $id);
var_dump($food);
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
                            <h1><?php echo $data['name']; ?></h1>
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
                            foreach ( $food as $foods): ?>
                                <div class="food" >
                                <h3 class="foodName" ><?php echo $foods->foodName; ?></h3 >
                                <p class="foodCalories" > <?php echo $foods->foodWeight; ?> kcal</p >
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="text-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveaux repas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="meal" class="form-label">Repas</label>
                                    <input type="text" name="meal" class="form-control" id="meal">
                                </div>
                                <div class="mb-3">
                                    <label for="kcal" class="form-label">Calories</label>
                                    <input type="text" name="kcal" class="form-control" id="kcal">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" name='enter' class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php
    include_once 'includes/footer.php';
    ?>