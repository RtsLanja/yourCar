<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <title>yourCar</title>
</head>
<body>
    <?php
        require 'controler/connexion.php';
    ?>
    <section class="form" >
        <div class="logo">
            <p class="part1">your<span class ="part2">Car</span></p>
        </div>
        <form action="" method="post">
            <h2>Connexion</h2>
            <input type="tel" name="name" id="name" placeholder="Your Name"></i><br>
            <input type="password" name="pwd" id="pwd" placeholder="Password"></i><br>
            <?php
                if(isset($error)){
                    echo "<p class = 'error'>".$error."</p>";
                }
            ?>
            <button class="btn" name="submit">Connexion</button><br>
        </form>
    </section>
</body>
</html>