<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT * FROM admin WHERE id = $id ";
    $admin = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($admin);
    $image = $row['image'];
    unlink($image);
    $delete = "DELETE FROM admin WHERE id = $id";
    $run = mysqli_query($conn, $delete);
    header("location:/layer/admin/list.php");
    testMessage($run, "Delete Admin");
}

$select = "SELECT * FROM `admin`";
$admin = mysqli_query($conn, $select);
auth(1, 2, 3);
?>
<h1 class="text-center">Admins List</h1>

<div class="container-fluid col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th> id </th>
                        <th> Name</th>
                        <th> Role </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $data) : ?>
                        <tr>
                            <td><?= $data['id']; ?></td>
                            <td><?= $data['name']; ?></td>
                            <td><?= $data['role']; ?></td>
                            <td>
                                <?php if ($_SESSION['adminRole'] == 1) : ?>
                                    <div class="dropdown">
                                        <i type="button" data-toggle="dropdown" aria-expanded="false" class="fa-solid btn btn-light fa-ellipsis-vertical"></i>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-info" href="/layer/admin/show.php?show=<?= $data['id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                            <a class="dropdown-item text-primary" href="/layer/admin/update.php?edit=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="dropdown-item text-danger" href="/layer/admin/list.php?delete=<?= $data['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                <?php else : echo 'no access'; ?>
                                <?php endif;?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>