<?php

$postTitle = "";
$postBody = "";
$user = $_SESSION['username'];

// Check Authentication
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location: /tech-blog/login.php");
}

if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];

    // Get the post for edit
    $sql = "SELECT * FROM posts WHERE id=$editId";
    $editPost = $conn->query($sql)->fetch_assoc();
}

if (!empty($_POST)) {
    $postTitle = $_POST['title'];
    $postBody = $_POST['post-body'];
    $sql = '';

    if (isset($_GET['update'])) {
        $postId = $_GET['update'];
        $sql = "UPDATE posts
                SET title='$postTitle', body='$postBody'
                WHERE id=$postId";
    } else {
        // Create posts Table if not eixist
        $sql = "CREATE TABLE IF NOT EXISTS posts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            title TEXT(255) NOT NULL,
            body TEXT(999) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (username) REFERENCES users(username)
            )";

        $conn->query($sql);

        // Insert Post into Database
        $sql = "INSERT INTO posts(username, title, body) VALUES('$user','$postTitle', '$postBody')";
    }


    $conn->query($sql);
}

?>

<section class="card card-body">
    <h4 class="mb-5">Create a New Post:</h4>
    <div class="row pb-4">

        <div class="col col-sm-5">
            <form action="/tech-blog/dashboard.php?section=create-post&<?= isset($editPost) ? 'update=' . $editPost['id'] : '' ?>" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="title" id="form1Example1" class="form-control" value="<?= (isset($editPost)) ? $editPost['title'] : '' ?>" />
                    <label class="form-label" for="form1Example1">Title</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <textarea name="post-body" id="form1Example2" class="form-control" rows="8"><?= (isset($editPost)) ? $editPost['body'] : '' ?></textarea>
                    <label class="form-label" for="form1Example2">Write your post...</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Publish</button>
            </form>
        </div>
    </div>
</section>