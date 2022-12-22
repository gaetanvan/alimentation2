<?php
$page = [
    "title"=>"Alim-Entation - Login"
];
use \App\Autoloader;
use \App\Food;
use \App\user;
use \App\Database;


require 'app/class/Autoloader.php';
Autoloader::register();
if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    User::login($mail, $password);
}
include_once("includes/header.php");
?>
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
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"  name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                </form>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>
</main>
<footer>
</footer>
<?php
include_once 'includes/header.php';
?>