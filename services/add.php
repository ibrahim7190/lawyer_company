<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';



if(isset($_POST['add']))
{
    $title=$_POST['title'];
    $lawyer_id=$_POST['lawyer_id'];

    $insert = "INSERT INTO services VALUES(NULL,'$title',$lawyer_id) ";
    $run = mysqli_query($conn,$insert);
}

$select = "SELECT * FROM lawyers";
$i = mysqli_query($conn, $select);
auth(1,2);

?>

<h1 class="text-center"> Add Services </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label for="lawyer">admin</label>
                        <select class="custom-select mr-sm-2" name="lawyer_id">
                            <option selected>Choose Lawyer</option>
                            <?php foreach ($i as $data) : ?>
                            <option value="<?= $data['id']; ?>">
                                <?= $data['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add" class="btn btn-primary mt-2">Add Services</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php';

?>
