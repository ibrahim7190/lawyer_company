<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

$id = $_SESSION['userid'];

$select = "SELECT * FROM `users` where id =$id  ";
$user= mysqli_query($conn,$select);
$row= mysqli_fetch_assoc($user);
?>

<h1 class="text-center"> Your Profile</h1>

<div class="container col-4">
    <div class="card">
        <img src="/layer/lowyer/upload/<?= $row['image'] ?>" alt="">
        <div class="card-body">
            <h2> Name : <?php echo $row['name']; ?> </h2>
            <h2> age : <?= $row['age'] ?> </h1>
            <h2> address : <?= $row['address'] ?> </h2>
            <h2> phone : <?= $row['phone'] ?> </h2>
            <h2> email : <?= $row['email'] ?> </h2>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>