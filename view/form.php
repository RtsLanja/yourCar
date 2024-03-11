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
        if($_GET['name']=="add") {
            require "../controler/uploadNewCar.php";
            echo '<h2>Add car</h2>';
        }
        else if($_GET["name"]== "update") {
            require "../controler/updateCar.php";
            echo '<h2>Update car</h2>';
        }
    ?>
    <div class="cars">
        <form action="" method="post" class="car">
        <input type="text" id="carName" 
            <?php if($_GET['name']=="add") : ?>
                <?= 'placeholder="Enter the car\'s name" name="carName"'; ?>
            <?php elseif($_GET['name']== "update") : ?>
                <?= 'value="'. $design_value .'" name="carName"'; ?>
            <?php endif ?>><br>
            <input type="text" id="price" 
            <?php if($_GET['name']=="add") : ?>
                <?= 'placeholder="Enter the price of the car"  name="price"'; ?>
            <?php elseif($_GET['name']== "update") : ?>
                <?= 'value="'. $prix_value .'"  name="price"'; ?>
            <?php endif ?>><br>
            <input type="number" id="carNumber" 
            <?php if($_GET['name']=="add") : ?>
                <?= 'placeholder="Enter the number of the car" name="carNumber"'; ?>
            <?php elseif($_GET['name']== "update") : ?>
                <?= 'value="'. $nombre_value .'"  name="carNumber"'; ?>
            <?php endif ?>><br>
            <?php
                if(isset($mess)){
                    echo "<p class = 'message'>".$mess."</p>";
                }
            ?>
            <input type="submit" 
            <?php if($_GET['name']=="add") : ?>
                <?= 'value="Add Car"';
                echo  'name="submit"'; ?>
           <?php elseif($_GET['name']== "update") : ?>
                <?= 'value="Update"';
                echo  'name="submit"';?>
            <?php endif ?>>
        </form>
    </div>
    
</body>
</html>