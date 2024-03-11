<?php
    require 'config.php'; 
         if(isset($_GET['idCli'])){
            $idCli=$_GET['idCli'];
            $request=mysqli_query($con, "SELECT numFact FROM achat WHERE idCli='$idCli'");
            while($buyRow=mysqli_fetch_array($request)){
                $buyId=$buyRow['numFact'];
            }
        }
?>