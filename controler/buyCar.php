<?php
    require "config.php";
    require "function.php";
if($_GET['carId']) {
    $id=$_GET['carId'];
    $selectNumber=mysqli_query($con,"SELECT nombre FROM voiture WHERE idVoit='$id'");
    $qte=0;
    while($row=mysqli_fetch_assoc($selectNumber)){
        $nb= $row["nombre"];                          
    }
    if(empty($_GET['buyId'])){
        $buyId =id($con,"numFact","achat"); 
            if(isset($_POST['submit'])) {
                if(isset($_POST['clientName']) && isset($_POST['carNumber'])) {
                    $clientName=$_POST['clientName'];
                    $carNumber =$_POST['carNumber'];
                    $verifyNumber=VerifyNumber($carNumber);
                    if($verifyNumber=="true"){
                        $qte=$nb-$carNumber;
                        if($qte<0){
                            $mess= 'Insufficient stock';
                        }
                        else {
                            $request=mysqli_query($con, "SELECT idCli FROM client WHERE nom='$clientName'");
                            $num_ligne=mysqli_num_rows($request);
                            if($num_ligne> 0){
                                $date= date("Y-m-d");
                                while($rowCli=mysqli_fetch_assoc($request)){
                                    $idCli=$rowCli["idCli"];
                                }
                                stmt($con,$buyId,$idCli,$id,$date,$carNumber,$qte);
                            }
                            else {
                                $mess= "Error: the client doesn't exist";
                            }
                        }
                    }
                }
                
            }
    }
    else if(!empty($_GET['buyId'])){
        $buyId=$_GET['buyId'];
        if(isset($_POST['carNumber'])){
            if(isset($_POST['submit'])){
                $carNumber =$_POST['carNumber'];
                $verifyNumber=VerifyNumber($carNumber);
                if($verifyNumber=="true"){
                    $qte=$nb-$carNumber;
                    if($qte<0){
                        $mess= 'Insufficient stock';
                    }
                    else {
                        $date= date("Y-m-d");
                        $requestIdCli=mysqli_query($con,"SELECT idCli FROM achat WHERE numFact='$buyId'");
                        $rowIdcli=mysqli_fetch_assoc($requestIdCli);
                        $idCli=$rowIdcli['idCli'];
                        stmt($con,$buyId,$idCli,$id,$date,$carNumber,$qte);
                    }
                }
            }
        }
    }
}
?>