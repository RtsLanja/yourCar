<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formStyle.css">
    <title>yourCar</title>
</head>
<body>
    <?php
        if($_GET['name']=="buy") {
            require "../controler/buyCar.php";  
            echo '<h2>Buy car</h2>';
        }
        else if($_GET["name"]== "update") {
            require "../controler/updateBuy.php";
            echo '<h2>Update buy</h2>';
        }
    ?>
    <div class="cars">
        <form action="" method="post" class="car">
            <?php if($_GET['name']=="buy" && empty($_GET['buyId'])) : ?>
                <?= '<input type="text" name="clientName" id="carName" placeholder="Enter the Client name"><br>'; ?>
            <?php endif ?>
            <?php if($_GET['name']=="buy") : ?>
                <?= '<input type="text" name="carNumber" id="carNumber" placeholder="Enter the number of the car"><br>' ?>
                <?php elseif($_GET['name']== "update") : ?>
                <?= '<input type="text" name="carNumber" id="carNumber" value="'. $input .'"><br>'; ?>
            <?php endif ?>
            <?php
                if(isset($mess)){
                    echo "<p class = 'message'>".$mess."</p>";
                }
            ?>
            <button id ='submit' class="add" name="submit">
            <?php if($_GET['name']=="buy") : ?>
                <?= 'Buy'?>
           <?php elseif($_GET['name']== "update") : ?>
                <?= 'Update';?>
            <?php endif ?> </button>
        </form>
        <?php
            require "../controler/checkClientAnswer.php"; 
        ?>
    </div>  
</body>
</html>