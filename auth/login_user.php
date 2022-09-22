<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';
if (isset($_POST['loginuser'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $newpassword = sha1($password);
    $email = $_POST['email'];
    $select = "SELECT * FROM users where  `password` = '$newpassword' and email = '$email'";
    $user = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($user);
    $count = mysqli_num_rows($user);
    if ($count == 1) {
        $_SESSION['userid'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("location: /layer/");
    } else {
        echo "<div class='alert alert-danger col-4 mx-auto'>
        Wrong Data
        </div>";
    }
}
?>
<h1 class="text-center">Login User</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" name="loginuser" class="btn btn-info">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>