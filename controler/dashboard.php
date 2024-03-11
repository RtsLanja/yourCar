<?php
require "function.php";
    function selectCliNumber(){
        require "config.php";
        $sql = "SELECT count(idCli) As number FROM  client";
        $number = select($con,'number',$sql);
        echo "<p>$number</p>";
    }
    function selectCarNumber(){
        require "config.php";
        $sql = "SELECT count(idVoit) As number FROM  voiture";
        $number = select($con,'number',$sql);
        echo "<p>$number</p>";
    }
    function selectBoughtCar(){
        require "config.php";
        $sql = "SELECT count(numAchat) As number FROM  achat";
        $number = select($con,'number',$sql);
        echo "<p>$number</p>";
    }
?>