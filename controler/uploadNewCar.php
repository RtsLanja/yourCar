<?php
    if(isset($_POST['submit'])){
        require "config.php";
        require "function.php";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if( isset($_POST['carName']) && isset($_POST['price']) && isset($_POST['carNumber'])){
                $carName=$_POST['carName'];
                $price=$_POST['price'];
                $number=$_POST['carNumber'];
                $verifyPrice=VerifyNumber($price);
                $verifyNumber=VerifyNumber($number);
                if($verifyPrice=="true" && $verifyNumber=="true"){
                    $request=mysqli_query($con,"SELECT * FROM voiture WHERE design = '$carName'");
                    $num_row=mysqli_num_rows($request);
                    if($num_row > 0){
                        while($row=mysqli_fetch_array($request)){
                            $nb_value=$row["nombre"];
                        }
                        if($nb_value> 0){
                            echo "<script>alert('this car already exist');</script>";
                            header ("Location:car.php");
                        }
                        else{
                            $updateCarNumber=mysqli_query($con,"UPDATE voiture set nombre='$number', prix='$price' WHERE design='$carName'");
                            header ("Location:car.php");
                        }
                    }
                    else{
                        $carId=id($con,'idVoit','voiture');
                        $stmt=mysqli_prepare($con,"INSERT INTO voiture(idVoit,design,prix,nombre) VALUE(?,?,?,?)");
                        mysqli_stmt_bind_param($stmt,'ssss',$carId,$carName,$price,$number);
                        mysqli_stmt_execute($stmt);
                        $message="Car uploaded!";
                        header ("Location:car.php");
                    }
                }
                else {
                    $mess="Error:";
                }
            }
        }
    }
?>