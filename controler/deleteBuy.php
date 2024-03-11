<?php
    require "config.php";
    if(isset($_GET["deleteId"])){
        $id = $_GET["deleteId"];
        $delete_buy= mysqli_query($con, "DELETE FROM achat WHERE numAchat='$id'");
        if($delete_buy) {
            header("location:../view/buy.php");
        }
        else {
            die('mysqli_error($connexion)');
        }
    }
?>