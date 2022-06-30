<?php include_once "./includes/header.php";
      include_once "./config/database.php";
?>

<?php 

// Get all post from database
// Table JOIN
$sql = "SELECT *
        FROM posts
        INNER JOIN users
        ON posts.username = users.username";

        
$posts = $conn->query($sql);
?>

<div class="container py-4">

  <h4 class="my-3"><strong>Latest Articles</strong></h4>

  <div class="row row-cols-1 row-cols-md-3 g-4">

  <?php while($post = $posts->fetch_assoc()){ ?>
    <div class="col">
      <div class="card h-100">
        <img src="./img/alexandre-debieve-FO7JIlwjOtU-unsplash-min.jpg" class="card-img-top"
          alt="Hollywood Sign on The Hill" />
        <div class="card-body">
          <small class="text-muted">posted by </small><span style="color:blueviolet"><?= $post['full_name'] ?></span>
          <a href="#"><h5 class="card-title mt-2"><?= $post['title'] ?></h5></a>
          <p class="card-text">
            <?= substr($post['body'], 0, 50) ?>...
          </p>
          <small class="text-muted">Last updated <?= $post['created_at'] ?></small>
        </div>
      </div>
    </div>

  <?php } ?>
    
  </div>

</div>


<?php include_once ("./includes/footer.php"); ?>