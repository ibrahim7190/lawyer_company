<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $select = "SELECT *FROM lawyers WHERE id=$id";
    $employee = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($employee);


    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $years_ex = $_POST['years_ex'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($_FILES['image']['name']))
            $image_name = $row['image'];
        else {
            $image_Name = time() . $_FILES['image']['tmp_name'];
            $location = "./upload/" . $image_Name;
            if (move_uploaded_file($tmp_name, $location))
                echo "Upload Done";
            else
                echo "Upload False";
        }

        $update = "UPDATE lawyers SET `name` = '$name' ,age=$age,`address`='$address', salary =$salary,years_ex=$years_ex, phone = '$phone',email='$email',`password`='$password', `image` ='$image_name' WHERE id=$id";
        $check = mysqli_query($conn, $update);
        testmessage($check, "Update Lowyer");
    }
}
auth(1, 2);
?>
<h1 class="text-center"> Update Lowyer : </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name * : </label>
                    <input class="form-control" requireed value=<?= $row['name'] ?> name="name" type="text">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" value="<?= $row['age'] ?>" name="age" type="number">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" value="<?= $row['address'] ?>" name="address" type="text">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input class="form-control" value="<?= $row['salary'] ?>" name="salary" type="number">
                </div>
                <div class="form-group">
                    <label>Years_EX</label>
                    <input class="form-control" value="<?= $row['years_ex'] ?>" name="years_ex" type="number">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" value="<?= $row['phone'] ?>" name="phone" type="text">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="<?= $row['email'] ?>" name="email" type="text">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" value="<?= $row['password'] ?>" name="password" type="text">
                </div>
                <div class="form-group">
                    <label>Profile Image : <img src="/layer/lowyer/upload/<?= $row['image'] ?>" width="20"></label>
                    <input class="form-control" name="image" type="file">
                </div>
                <button name="update" class="btn btn-info"> Update Data </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>