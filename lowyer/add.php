<?php 
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

if(isset($_POST['send']))
{
    $name=$_POST['name'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $years_ex=$_POST['years_ex'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $newpassword = sha1($password);

    //image
    $image_name=time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_name;

    if(move_uploaded_file($tmp_name,$location))
    echo "Upload Done";
    else 
    echo "Upload False";

    $insert = "INSERT INTO lawyers VALUES(NULL,'$name',$age,'$address',$salary,$years_ex,'$phone','$email','$newpassword','$location') ";
    $run = mysqli_query($conn,$insert);
    testMessage($run,"Insert Lawyers");

}
auth(1, 2);
?>
<h1 class="text-center"> Add Lawyer</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
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
                    <label>Salary</label>
                    <input class="form-control" name="salary" type="number">
                </div>
                <div class="form-group">
                    <label>Years_EX</label>
                    <input class="form-control" name="years_ex" type="number">
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
                    <label>Profile Image</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <button name="send" class="btn btn-info"> Send Data </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>
