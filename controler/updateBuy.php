<?php
    require "config.php";
    require "function.php";
    if($_GET['updateId']) {
        $id=$_GET['updateId'];
        //valeur recuperer
        $result=mysqli_query($con,"SELECT nombre FROM voiture WHERE idVoit=(SELECT idVoit FROM achat WHERE numAchat='$id')");
        $result0=mysqli_query($con,"SELECT qte FROM achat WHERE numAchat='$id'");
        $row0=mysqli_fetch_array($result0);
        $input=$row0["qte"];
        $row=mysqli_fetch_array($result);
        $qty_value=$row["nombre"];
        if(isset($_POST['submit'])){
            $carNumber =$_POST['carNumber'];
            $verifyNumber=VerifyNumber($carNumber);
            if($verifyNumber=="true"){
                $qte=$qty_value-$carNumber;
                if(empty($carNumber) || $carNumber==0){
                    $carNumber=$input;
                }
                if($qte<0){
                    $mess= 'Insufficient stock';
                }
                else{
                    $request1=mysqli_query($con,"UPDATE achat SET qte = '$carNumber' WHERE numAchat='$id'"); 
                    if($carNumber<$input){
                        $qteCar=$qty_value+($input-$carNumber);
                        $requestCar=mysqli_query($con,"UPDATE voiture SET nombre = '$qteCar' WHERE idVoit=(SELECT idVoit FROM achat WHERE numAchat='$id')");     
                    }
                    else{
                        $qteCar=$qty_value-($carNumber-$input);
                        $requestCar=mysqli_query($con,"UPDATE voiture SET nombre = '$qteCar' WHERE idVoit=(SELECT idVoit FROM achat WHERE numAchat='$id')");     
                    }
                    header ("Location:buy.php");
                }
            }
            else{
                $mess='Enter Number';
            }
        }
    }        
?>