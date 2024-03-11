<?php
    function VerifyName($name) : bool {
        $verification=preg_match("/^[A-Za-z]+$/", $name);
        if ($verification) {
            return true;
        }
        else{
            return false;
        }
    }
        function VerifyNumber($number) : bool {
            $verification=preg_match("/^[0-9]+$/", $number);
            if ($verification) {
                return true;
            }
            else{
                return false;
            }
        }
        function stmt($con,$buyId,$idCli,$id,$date,$carNumber,$qte) {
            $numAchat=id($con,'numAchat','achat');
            $stmt=mysqli_prepare($con,"INSERT INTO achat(numAchat,numFact,idCli,idVoit,date,qte) VALUES (?,?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt,"ssssss",$numAchat,$buyId,$idCli, $id, $date ,$carNumber);
            $request1=mysqli_stmt_execute ($stmt);
            if($request1){
                $updateNumber=mysqli_query($con,"UPDATE voiture SET nombre = '$qte' WHERE idVoit='$id'");
                $show = $idCli;
                header("location:../view/checkClientAnswer.php?idCli=$show");
            }
        }
        function id($con,$nameId,$array) : int {
            $requestId=mysqli_query($con, "SELECT MAX($nameId) AS max FROM $array");
            $num_ligne=mysqli_num_rows($requestId);
            if($num_ligne>0){
                while($idRow=mysqli_fetch_array($requestId)){
                    $value=$idRow['max'];  
                }
                return $Id=(int)($value) + 1;
            }
            else{
                return  $Id=1;
            } 
        }
        function select($connnexion,$array,$sql){
            $request = mysqli_query($connnexion,$sql);
            $num_ligne= mysqli_num_rows($request);
            $value = 0;
            if($num_ligne > 0){
                while($Row=mysqli_fetch_array($request)){
                    $value= $value+$Row[$array];  
                }
                return $value;
            }
            else 
                return 0;
        }
?>