<?php
    require "config.php";
    require "function.php";
    if($_GET['updateId']) {
        $id=$_GET['updateId'];
        //valeur recuperer
        $sql="SELECT * FROM voiture WHERE idVoit='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $nombre_value=$row["nombre"];
        $design_value=$row["design"];
        $prix_value=$row["prix"];
        if(isset($_POST['submit'])){
            //valeur input
            $carName=$_POST['carName'];
            $price =$_POST['price'];
            $carNumber = $_POST['carNumber'];
            $verifyPrice=VerifyNumber($price);
            $verifyNumber=VerifyNumber($carNumber);
            if($verifyPrice=="true" && $verifyNumber=="true"){
                if(empty($carName) || empty($price) || empty($carNumber)) {
                    $carName=$design_value;
                    $price=$prix_value;
                    $carNumber=$nombre_value;
                }
                $request1=mysqli_query($con,"UPDATE voiture SET design = '$carName',prix='$price',nombre='$carNumber' WHERE idVoit='$id'");
                if(!$request1) {
                    echo "<script>alert('" . "Failed to update" . "')</script>";
                }
                else {
                    header ("Location:car.php");
                }
            }
            else {
                $mess="Error:";
            }
        }
    }        
?>