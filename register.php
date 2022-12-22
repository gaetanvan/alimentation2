<?php
use \App\Autoloader;
use \App\Food;
use \App\User;
use \App\Database;


require 'app/class/Autoloader.php';
Autoloader::register();

$page = [
    "title"=>"Alim-Entation - Register"
];
if (isset($_POST['register'])) {
    if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name']);
        $age = $_POST['age'];
        $size = $_POST['size'];
        $weight = $_POST['weight'];
        $mail = htmlspecialchars($_POST['mail']);
        $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
        $sizeImc = $size / 100;
        $imc = $weight/($sizeImc*$sizeImc);
        User::createUser($name, $age, $size, $weight, $mail,$password,$imc);
        header('Location:login.php');
    } else {
        echo "Veuillez completer tous les champs..";
    }
}
include_once("includes/header.php");
?>
<script src="assets/js/register.js" defer></script>
</head>
<header>
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1>Register</h1>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name='name' class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name='age' id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sexe</label>
                        <select class="form-select" name='sex' aria-label="Default select example">
                            <option selected>Homme</option>
                            <option value="2">Femme</option>
                            <option value="3">Non Binaire</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Taille en cm</label>
                        <input type="range" name='size' class="form-range" min="120" max="230" step="1"
                               id="customRange1" oninput="sizeChange(this.value)">
                        <output id="output">160</output>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Poids</label>
                        <input type="range" name='weight' class="form-range" min="40" max="160" step="1"
                               id="customRange2" oninput="weightChange(this.value)">
                        <output id="output1">70</output>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name='mail' class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name='password' class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="register" class="btn btn-dark">Submit</button>
                </form>
                    <a href="login.php">Login</a>
            </div>
        </div>
    </div>
</main>
<footer>
</footer>

<?php
include_once 'includes/footer.php';
?>
