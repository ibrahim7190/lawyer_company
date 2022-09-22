<?php
function testMessage($concation, $message)
{
    if ($concation) {
        echo " <div class='alert alert-success col-4 mx-auto'>
   $message Done Successfuly
</div>";
    } else {
        echo " <div class='alert alert-danger col-4 mx-auto'>
        $message Falied Proccess
     </div>";
    }
}


function auth($num1 = "", $num2 = "", $num3 = "")
{
    if ($_SESSION['adminid']) {
        if (
            $_SESSION['adminRole'] == $num1 || $_SESSION['adminRole'] == $num2
            || $_SESSION['adminRole'] == $num3) 
            {} 
        else {
            header("location:/layer/404.php");
        }
    }
     else 
    {
        header("location:/layer/auth/login.php");
    }
}
