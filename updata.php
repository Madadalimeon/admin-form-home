<?php
include("./config/config.php");
include("./include/header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE employees_id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found!";
        exit;
    }
}
if (isset($_POST['update'])) {
    $first_name       = $_POST["first_name"];
    $last_name        = $_POST["last_name"];
    $email            = $_POST["email"];
    $mobile_no        = $_POST["mobile_no"];
    $dob              = $_POST["dob"];
    $date_of_joining  = $_POST['date_of_joining'];
    $position         = $_POST["position"];
    $department       = $_POST["department"];
    $shift            = $_POST["shift"];
    $role             = $_POST["role"];
    $country          = $_POST["country"];
    $state            = $_POST["state"];
    $city             = $_POST["city"];
    $address          = $_POST["address"];

    $file_name = $employee['profile_pic'];
    if (!empty($_FILES['profile_pic']['name'])) {
        $file_name = time() . "_" . basename($_FILES['profile_pic']['name']);
        $file_tmp  = $_FILES['profile_pic']['tmp_name'];
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
    $update_query = "UPDATE employees SET 
        first_name      = '$first_name',
        last_name       = '$last_name',
        email           = '$email',
        mobile_no       = '$mobile_no',
        dob             = '$dob',
        date_of_joining = '$date_of_joining',
        position        = '$position',
        department      = '$department',
        shift           = '$shift',
        role            = '$role',
        country         = '$country',
        state           = '$state',
        city            = '$city',
        address         = '$address',
        profile_pic     = '$file_name'
        WHERE employees_id = '$id'";

    $conn->query($update_query);
        
}
?>

<!-- Update Form -->
<form method="post" enctype="multipart/form-data">
    <div class="container mt-5">
        <h2 class="text-center">Update Employee</h2>
        <div class="row mt-5">
            <div class="col-6 mb-3">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?= $employee['first_name']?>" required>
            </div>
            <div class="col-6 mb-3">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?= $employee['last_name'] ?>" required>
            </div>
            <div class="col-6 mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $employee['email'] ?>" required>
            </div>
            <div class="col-6 mb-3">
                <label>Mobile No</label>
                <input type="tel" class="form-control" name="mobile_no" value="<?= $employee['mobile_no'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>DOB</label>
                <input type="date" class="form-control" name="dob" value="<?= $employee['dob'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Date of Joining</label>
                <input type="date" class="form-control" name="date_of_joining" value="<?= $employee['date_of_joining'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Position</label>
                <input type="text" class="form-control" name="position" value="<?= $employee['position'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Department</label>
                <input type="text" class="form-control" name="department" value="<?= $employee['department'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Shift</label>
                <input type="text" class="form-control" name="shift" value="<?= $employee['shift'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Role</label>
                <input type="text" class="form-control" name="role" value="<?= $employee['role'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Country</label>
                <input type="text" class="form-control" name="country" value="<?= $employee['country'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>State</label>
                <input type="text" class="form-control" name="state" value="<?= $employee['state'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>City</label>
                <input type="text" class="form-control" name="city" value="<?= $employee['city'] ?>">
            </div>
            <div class="col-6 mb-3">
                <label>Address</label>
                <textarea class="form-control" name="address"><?= $employee['address'] ?></textarea>
            </div>
            <div class="col-6 mb-3">
                <label>Profile Pic</label><br>
                <img src="uploads/<?= $employee['profile_pic'] ?>" width="80"><br><br>
                <input type="file" class="form-control" name="profile_pic">
            </div>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Employee</button>
    </div>
</form>


<?
include("./include/footer.php");
?>