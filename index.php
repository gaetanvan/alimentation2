<?php
//Connexion a la BDD
//Connexion
//On stock les infos du user
$user = [
        "id"=>1,
        "name"=>"Roger",
        "age"=> 21,
        "weight"=> 79,
        "sex"=>"male",
        "size"=>173,
        "imc"=>23.4,
        "mail"=>"roger@gmail.com",
        "isLogged"=>true
];
$foods = [
    "foodName"=>array("BigMac","Tomate","Wrap","Pizza","Céréales"),
    "foodCalories"=>array(504,205,536,864,345),
];
if (!$user['isLogged']){
    header('location: login.php');
    exit;
}
$page = [
    "title"=>"Alim-Entation"
];
include_once("includes/header.php");
?>
<body>
    <div class="container">
        <header>
            <div class="title">Alim-Entation</div>
            <div class="profil"><?php echo $user['name']; ?></div>
        </header>
        <section class="dataUser">
            <div class="graph"></div>
            <div class="imc"><?php echo $user['imc']; ?></div>
            <div class="weight"><?php echo $user['weight']; ?> kg</div>
        </section>
        <section class="date">
            <div class="date"><?php echo date("l M y") ?></div>
        </section>
        <section class="list">
            <?php
            for ($i = 0;$i < count($foods["foodName"]); $i++) { ?>
                <div class="food" >
                <div class="foodName" ><?php echo $foods["foodName"][$i]; ?></div >
                <div class="foodCalories" > <?php echo $foods["foodCalories"][$i]; ?> kcal</div >
            <?php } ?>
        </section>
        <footer>
            <button>+
            </button>
        </footer>
    </div>
    <?php
    include_once 'includes/header.php';
    ?>