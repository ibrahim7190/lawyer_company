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
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $newpassword = sha1($password);

    $insert = "INSERT INTO users VALUES(NULL,'$name',$age,'$address','$phone','$email','$newpassword') ";
    $run = mysqli_query($conn,$insert);
    testMessage($run,"Insert User");

}
auth(1,2,3);
?>
<h1 class="text-center"> Add User</h1>

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
                <button name="send" class="btn btn-info"> Send Data </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>
