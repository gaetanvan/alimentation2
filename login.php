<?php
$page = [
    "title"=>"Alim-Entation - Login"
];
include_once("includes/header.php");
?>
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
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
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