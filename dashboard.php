<?php
include_once('./config/database.php');

// Check Authentication
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location: /tech-blog/login.php");
}

?>

<?php
include_once "./includes/header.php";
include_once "./config/database.php";
?>

<?php
$section = isset($_GET['section']) ? $_GET['section'] : '';
$include_uri = "./dashboard/index.php";
?>


<div class="row" style="width: 100%">
    <div class="col col-2">
        <?php include_once "./includes/dashboard-sidebar.php" ?>
    </div>
    <div class="col col-10 px-0">
        <section style="background-color: #F3F9FB;">
            <div class="container py-5">
                <?php
                switch ($section) {
                    case 'create-post':
                        $include_uri = "./dashboard/create-post.php";
                        break;
                    case 'all-post':
                        $include_uri = "./dashboard/all-post.php";
                        break;
                    case 'profile':
                        $include_uri = "./dashboard/profile.php";
                        break;
                    case 'change-password':
                        $include_uri = './dashboard/change-password.php';
                        break;
                    default:
                        $include_uri = "./dashboard/index.php";
                }

                include_once($include_uri);
                ?>
            </div>
        </section>
    </div>
</div>


<?php include_once("./includes/footer.php"); ?>