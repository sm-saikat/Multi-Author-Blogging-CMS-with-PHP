<?php

// Check Authentication
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("location: /tech-blog/login.php");
}

$username = $_SESSION['username'];
$edit = false;

if (isset($_GET['edit'])) $edit = true;

if (!empty($_POST)) {

    $title = $_POST['title'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $bio = $_POST['bio'];

    $sql = '';
    if (!$edit) {
        // Insert data into table
        $sql = "INSERT INTO details
                VALUES('$username', '$title', '$company', '$address', '$phone', '$facebook', '$github', '$twitter', '$linkedin', '$bio')";
    } else {
        // Update data
        $sql = "UPDATE details
                SET title='$title', company='$company', address='$address', phone='$phone', facebook='$facebook', github='$github', twitter='$twitter', linkedin='$linkedin', bio='$bio'
                WHERE username='$username'";
    }

    $conn->query($sql);
}

$detailsExist = false;

// Get details from table if exist
$sql = "SELECT * FROM details WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $detailsExist = true;
    $edit = true;
}
$details = $result->fetch_assoc();

?>



<form action="/tech-blog/dashboard.php?section=profile<?= $edit ? '&edit=true' : '' ?>" method="POST">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" name="title" id="form6Example1" class="form-control" value="<?php echo ($detailsExist ? $details['title'] : '') ?>" />
                <label class="form-label" for="form6Example1">Title</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="company" id="form6Example2" class="form-control" value="<?php echo ($detailsExist ? $details['company'] : '') ?>" />
                <label class="form-label" for="form6Example2">Company</label>
            </div>
        </div>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <input type="text" name="address" id="form6Example3" class="form-control" value="<?php echo ($detailsExist ? $details['address'] : '') ?>" />
        <label class="form-label" for="form6Example3">Address</label>
    </div>

    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="number" name="phone" id="form6Example6" class="form-control" value="<?php echo ($detailsExist ? $details['phone'] : '') ?>" />
        <label class="form-label" for="form6Example6">Phone</label>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" name="facebook" id="form6Example1" class="form-control" value="<?php echo ($detailsExist ? $details['facebook'] : '') ?>" />
                <label class="form-label" for="form6Example1">Facebook</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="github" id="form6Example2" class="form-control" value="<?php echo ($detailsExist ? $details['github'] : '') ?>" />
                <label class="form-label" for="form6Example2">Github</label>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" name="twitter" id="form6Example1" class="form-control" value="<?php echo ($detailsExist ? $details['twitter'] : '') ?>" />
                <label class="form-label" for="form6Example1">Twitter</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="linkedin" id="form6Example2" class="form-control" value="<?php echo ($detailsExist ? $details['linkedin'] : '') ?>" />
                <label class="form-label" for="form6Example2">Linkedin</label>
            </div>
        </div>
    </div>

    <!-- Message input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" name="bio" id="form6Example7" rows="4"><?php echo ($detailsExist ? $details['bio'] : '') ?></textarea>
        <label class="form-label" for="form6Example7">Write your Bio</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>