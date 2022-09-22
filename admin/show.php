<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

if(isset($_GET['show']))
{
    $id=$_GET['show'];
    $select="SELECT *FROM admin WHERE id=$id";
    $run = mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($run);
}
auth(1,2);
?>

<h6 class="text-center"> Show Admin : </h6>
<div class="container-fluid col-md-3 text-center">
    <div class="card">
        <img src="/layer/admin/<?= $row['image'] ?>" class="card-img-top" alt="">
        <div class="card-body">
            <p> Name : <?= $row['name'] ?></p>
            <p> Age : <?= $row['age'] ?></p>
            <p> Address : <?= $row['address'] ?></p>
            <p> phone : <?= $row['phone'] ?></p>
            <p> Email : <?= $row['email'] ?></p>
            <p> role : <?= $row['role'] ?></p>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>