<?php
    require "config.php";
    if(isset($_GET["deleteId"])){
        $id = $_GET["deleteId"];
        $delete_car= mysqli_query($con, "DELETE FROM voiture WHERE idVoit='$id'");
        if($delete_car) {
            header("location:../view/car.php");
        }
        else {
            die('mysqli_error($connexion)');
        }
    }
?>