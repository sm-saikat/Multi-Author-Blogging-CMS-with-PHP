<?php 

// Fetch user frofile from database
if(!isset($_SESSION)) session_start();
$userName = $_SESSION['username'];

// $sql = "SELECT *
//         FROM users
//         INNER JOIN details
//         ON users.username=details.username
//         WHERE users.username='$userName'";
$sql = "SELECT * FROM users
        WHERE username='$userName'";
$user = $conn->query($sql)->fetch_assoc();

$sql = "SELECT * FROM details
        WHERE username='$userName'";
$result = $conn->query($sql);
$userDetails = $result->fetch_assoc();
$userDetailsExist = false;
if($result->num_rows > 0) $userDetailsExist = true;

// Number of posts
$sql = "SELECT COUNT(id) AS number_of_post FROM posts WHERE username='$userName'";
$postCount = $conn->query($sql)->fetch_assoc()['number_of_post'];

?>

<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?= $user['full_name']?></h5>
                <p class="text-muted mb-1"><?= $userDetailsExist? $userDetails['title']: '' ?></p>
                <p class="text-muted mb-4"><?= $userDetailsExist? $userDetails['bio']: '' ?></p>
                <div class="d-flex justify-content-center mb-2">
                    <a href="/tech-blog/dashboard.php?section=profile" class="btn btn-outline-primary ms-1">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                        <p class="mb-0"><?= $userDetailsExist? $userDetails['github']: '' ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                        <p class="mb-0"><?= $userDetails? $userDetails['twitter']: '' ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                        <p class="mb-0"><?= $userDetails? $userDetails['linkedin']: '' ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                        <p class="mb-0"><?= $userDetailsExist? $userDetails['facebook']: '' ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $user['full_name'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $user['email'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $userDetails? $userDetails['phone']: 'Update your phone number' ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $userDetailsExist? $userDetails['address']: 'Update address' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="display: flex !important; flex-direction: row;">
            <div class="card card-body m-2">
                <h6>Total Post</h6>
                <h4><?= $postCount ?></h4>
            </div>
            <div class="card card-body m-2">
                <h6>Total Likes</h6>
                <h4>56</h4>
            </div>
            <div class="card card-body m-2">
                <h6>Total Earning</h6>
                <h4>45$</h4>
            </div>
        </div>
    </div>
</div>