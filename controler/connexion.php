<?php
    session_start();
    if(isset($_POST["name"]) && isset($_POST["pwd"])){
        if(isset($_POST["submit"])){
            require 'config.php';
            $name = $_POST["name"];
            $password = $_POST["pwd"];
            $request = mysqli_query($con,"SELECT name FROM admin WHERE name = '$name' AND pwd = '$password'");
            $num_row = mysqli_num_rows($request);
            if($num_row > 0){
                while($rows=mysqli_fetch_assoc($request)){
                    $id = $rows["name"];
                }
                $_SESSION["id"] = $id;
                header("Location:view/home.php");
            }
            else{
                $error = "Phone Number or Password !<br>";
            }
        }
    }
?>