<?php include_once "./includes/header.php";
      include_once "./config/database.php";
?>

<?php 

// Get all users from database
$sql = "SELECT *
        FROM users";
$users = $conn->query($sql);

// $sql = "SELECT *
//         FROM details";
// $userDetails = $conn->query($sql);
// $userDetailsExist = false;
// if($userDetails->num_rows > 0) $userDetailsExist = true;
?>

<div class="container py-4">

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>Position</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php while($user = $users->fetch_assoc()){ ?>

    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?= $user['full_name'] ?></p>
            <p class="text-muted mb-0"><?= $user['email'] ?></p>
          </div>
        </div>
      </td>
      <td>
        <!-- <p class="fw-normal mb-1"><?= $userDetailsExist? $details['title']: '' ?></p> -->
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td>Writter</td>
      <td>
        <button class="btn btn-sm btn-primary">Follow</button>
      </td>
    </tr>

  <?php } ?>
  </tbody>
</table>

</div>


<?php include_once ("./includes/footer.php"); ?>