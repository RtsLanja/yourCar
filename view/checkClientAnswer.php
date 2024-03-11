<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="popup.css">
    <title>yourCar</title>
</head>
<body>
    <form action="" method="post">
        <?php require '../controler/checkClientAnswer.php'?>
        <p>Do you want to buy another car?</p>
        <div>
            <button name = "no"> <a href="buy.php"> Non</a></button>
            <button name = "yes"> <a href="car.php?buyId=<?=$buyId?>">Yes</a> </button>
        </div>
    </form>
</body>
</html>