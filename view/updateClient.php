<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formStyle.css">
    <title>yourCar</title>
</head>
<body>
    <h2>Update Client</h2>
    <div class="cars">
        <form action="" method="post" class="car">
            <?php
                require "../controler/updateClient.php";
            ?>
            <input type="text" name="name_cli" value= "<?= $name_value ?>"><br>
            <input type="text" name="contact_cli" value= "<?= $contact_value ?>"><br>
            <button name="btn_cli" class ="update">Update</button>
        </form>
    </div>
    
</body>
</html>