<?php
include '../genral/conn.php';
include '../genral/function.php';
include '../shared/head.php';
include '../shared/nav.php';


if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $auther = $_POST['auther'];
    //Image code
    $image_Name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_Name;
    if (move_uploaded_file($tmp_name, $location))
        echo "Upload Done";
    else
        echo "Upload False";

    $insert = "INSERT INTO `articales` VALUES (NULL , '$title' , '$description' , '$auther' , '$location','0')";
    $check = mysqli_query($conn, $insert);
    testmessage($check, "Insert Article");
}

?>
<h1 class="text-center"> Creat New Artical </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form  method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Title</label>
                        <input type="text"  name="title" class="form-control" id="inputEmail4" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description</label>
                        <input type="text" name="description" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Auther</label>
                    <input type="text" name="auther" class="form-control" id="inputAddress" >
                </div>
                <div class="form-group">
                    <label>Profile Image</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <button name='send'  class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>