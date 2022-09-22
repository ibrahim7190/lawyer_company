<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

$select = "SELECT * FROM `articales`";
$artical = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($artical);
########################################
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT * FROM articales where id = $id";
    $art = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($art);
    $image = $row['image'];
    unlink($image);
    $delete = "DELETE FROM articales where id = $id";

    mysqli_query($conn, $delete);
    header("location:/layer/artical/list.php");
}

?>

<h1 class="text-center">List Articales</h1>

<?php foreach ($artical as $data) : ?>

    <div class="container-fluid col-md-8 ">
        <div class="card">
            <img src="/layer/artical/<?= $data['image'] ?>" class="card-img-top" alt="">
            <div class="card-body" style="color:bisque">
                <h2 class="text-center"> <?= $data['title'] ?></h2>
                <h4 class="text-center"> <?= $data['description'] ?></h4>
                <p> Auther : <?= $data['auther'] ?></p>
                <?php if (isset($_SESSION['adminid'])) : ?>
                <a href="/layer/artical/list.php?delete=<?= $data['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a> 
               <?php endif; ?>
               
                    <br> <br> <br>
                    <hr>
                </div>
            </div>
        </div>
    <?php endforeach; ?>



    <?php include '../shared/footer.php'; ?>

    <!-- Example single danger button -->