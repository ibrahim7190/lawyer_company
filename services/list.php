<?php 
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

$select = "select * from services";
$r = mysqli_query($conn, $select);
$view = "select services.id serv_id, services.title title, lawyers.name lawyer_name, lawyers.image img from services join lawyers on lawyers.id=services.id";
$v = mysqli_query($conn, $view);

?>

<?php foreach ($v as $servicess) : ?>
<div class="container col-5 ">
    <div class="card text-center" style="width:full; color:whitesmoke">
       <img src="<?= $servicess['img'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h6 class="card-title"><?= $servicess['title']; ?></h6>
            <h6 class="card-title"><?= $servicess['lawyer_name']; ?></h6>
        </div>
    </div>
</div>
<?php endforeach; ?>


<?php include '../shared/footer.php'; ?>

