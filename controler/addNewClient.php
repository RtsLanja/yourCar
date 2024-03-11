<?php 
    require "config.php";
    require "function.php";
    //db insertion
    if(isset($_POST['btn_cli'])) {
        $id_cli=id($con,'idCli','client');
        $name_cli=$_POST['name_cli'];
        $firstname_cli=$_POST['firstname_cli'];
        $contact_cli=$_POST['contact_cli'];
        if(!empty($name_cli) && !empty($contact_cli) && !empty($id_cli)) {
            $req_cli=mysqli_query($con, "SELECT * FROM client WHERE nom='$name_cli $firstname_cli' OR contact = $contact_cli OR idCli='$id_cli'");
            $num_line_client= mysqli_num_rows($req_cli);
            if($num_line_client > 0) {
                $mess= "This Client already exist";
            }
            else {
                $stmt=mysqli_prepare($con, "INSERT INTO client(nom,contact,idCli) VALUES(CONCAT(UPPER(?),' ',?),?,?)");
                mysqli_stmt_bind_param($stmt,'ssss', $name_cli, $firstname_cli , $contact_cli,$id_cli);
                mysqli_stmt_execute($stmt);
                header('location:client.php');
            }
        }
        else {
            $mess= "Fill the form";
        }
    }
?>