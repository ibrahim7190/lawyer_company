<?php 
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

$select = "SELECT * FROM lawyers";
$lowyers = mysqli_query($conn,$select);

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $select="SELECT *FROM lawyers WHERE id=$id";
    $lowyers=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($lowyers);
    $image=$row['image'];
    unlink($image);
    $delete = "DELETE FROM lawyers WHERE id =$id";
    mysqli_query($conn,$delete);
    header("location:layer/lowyer/list.php");

}
auth(1, 2, 3);
?>

<h1 class="text-center"> List lowyer</h1>

<div class="container-fluid col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th> #ID </th>
                    <th> Lowyer</th>
                    <th> Action</th>
                </tr>
                <?php foreach ($lowyers as $data) { ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['name'] ?> </td>
                        <td>
                            <div class="dropdown">
                                <i type="button" data-toggle="dropdown" aria-expanded="false" class="fa-solid btn btn-light fa-ellipsis-vertical"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-info" href="/layer/lowyer/show.php?show=<?= $data['id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                    <a class="dropdown-item text-primary" href="/layer/lowyer/update.php?edit=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="dropdown-item text-danger" href="/layer/lowyer/list.php?delete=<?= $data['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>
