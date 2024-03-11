<?php
    require "config.php";
    if (isset($_GET["updateId"])) {
        $id=$_GET["updateId"];
        $sql="SELECT * FROM client WHERE idCli='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $contact_value=$row["contact"];
        $name_value=$row["nom"];
            if (isset($_POST["btn_cli"])) {
            $name_cli=$_POST['name_cli'];
            $contact_cli=$_POST['contact_cli'];
                if(empty($name_cli)) {
                    $name_cli=$name_value;
                }
                else if(empty($contact_cli)){
                    $contact_cli=$contact_value;
                }
                $req_cli=mysqli_query($con, "SELECT nom FROM client WHERE nom='$name_cli' AND idCli<>'$id'");
                $num_line_client= mysqli_num_rows($req_cli);
                if($num_line_client > 0) {
                    echo "<script>alert('" . "Failed: This Client already exist" . "')</script>";
                }
                else {
                    $update= mysqli_query($con,"UPDATE client set nom='$name_cli',contact='$contact_cli' WHERE idCli='$id'");
                    if(!$update) {
                        echo "<script>alert('" . "Failed to update" . "')</script>";
                    }
                    else {
                        header('location:../view/client.php');
                    }
                }
        }
    }
?>