<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    header("location: /tech-blog/dashboard.php");
}

include_once('./config/database.php');

$error = false;
$error_msg = "";

if (!empty($_POST)) {

    $userName = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$userName' AND password='$password'";
    
    $row = $conn->query($sql)->num_rows;

    if($row == 1){

        if(!isset($_SESSION)) session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $userName;

        header("location:/tech-blog/dashboard.php");
        exit;
    }else{
        $error = true;
        $error_msg = "Login Faild, Username or Password is incorrect !";
    }
}

?>

<?php
include_once "./includes/header.php";
?>

<div class="container py-5">
    <h2 class="text-center">Login Your Account</h2>

    <div class="row py-5">
        <div class="col"></div>

        <div class="col col-sm-5">
            <form action="/tech-blog/login.php" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="username" id="form1Example1" class="form-control <?= $error ? 'is-invalid': '' ?>" />
                    <label class="form-label" for="form1Example1">User Name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example2" class="form-control <?= $error ? 'is-invalid': '' ?>" />
                    <label class="form-label" for="form1Example2">Password</label>
                    <?php if($error){ ?>
                        <div class="invalid-feedback"><?= $error_msg ?></div>
                    <?php } ?>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </form>
        </div>

        <div class="col"></div>
    </div>
</div>



<?php include_once("./includes/footer.php"); ?>