<?php
require "config.php";
if(isset($_GET['deleteId'])) {
    $id=$_GET['deleteId'];
    $delete_client= mysqli_query($con,"DELETE FROM client WHERE idCli='$id'");
    if($delete_client) {
        $delete_client_bought=mysqli_query($con,"DELETE FROM achat WHERE idCli ='$id'");
        header('location:../view/client.php');
    }
    else {
        die('mysqli_error($con)');
    }
}
?>