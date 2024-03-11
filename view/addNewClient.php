<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formStyle.css">
    <title>yourCar</title>
</head>
<body>
    <h2>Add client</h2>
    <div class="cars">
        <form action="" method="post" class="car">
            <input type="text" name="name_cli" placeholder="Enter your name"><br>
            <input type="text" name="firstname_cli" placeholder="Enter your firstname"><br>
            <input type="text" name="contact_cli" placeholder="Enter your phone number"><br>
            <?php
                if(isset($mess)){
                    echo "<p class = 'message'>".$mess."</p>";
                }
            ?>
            <button name="btn_cli" class ="add">add</button>
            <?php
                require "../controler/addNewClient.php";
            ?>
        </form>
    </div>
    
</body>
</html>