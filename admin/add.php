<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';


if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $newpassword = sha1($password);
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_name;
    $role=$_POST['role'];
    


    if(move_uploaded_file($tmp_name,$location))
    echo "Upload Done";
    else 
    echo "Upload False";

    $insert = "INSERT INTO `admin` VALUES (NULL ,'$name',$age,'$address','$phone','$email','$newpassword','$image_name',$role)";
    $i = mysqli_query($conn,$insert);
    testMessage($i,"Insert Admin");
}

$select ="SELECT * FROM `roles`";
$roles = mysqli_query($conn,$select);
auth(1);
?>

<h1 class="text-center"> Add Admin Page</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" name="age" type="number">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="address" type="text">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone" type="text">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" type="text">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" type="text">
                </div>
                <div class="form-group">
                    <label>User Profile</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="" class="form-control">
                        <?php foreach ($roles as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['description'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="add" class="btn btn-info"> Add New </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>