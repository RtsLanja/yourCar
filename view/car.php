<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewStyle.css">
    <title>yourCar</title>
</head>
<body>
    <form action="" method="post">
        <div class="top_bar">
            <div class="logo">
                <div class="logo">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="w-6 h-6">
                    <path fillRule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clipRule="evenodd" />
                    </svg>
                    <p class="part1">your<span class ="part2">Car</span></p>
                </div>
                <div class="search">
                    <input type="search" name="search" id="search" placeholder="search... ">
                    <button name="submit" id= "searchButton"><img src="../image/1.png" alt=""></button>
                </div>
            </div>
            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="#" class="forAdmin">Cars</a></li>
                <li><a href="client.php">Clients</a></li>
                <li><a href="buy.php">Buy</a></li>
            </ul>
            <div class="container">
                <p>List of Cars</p>
                <button class="add" name="add"><a href="form.php?name=add">Add New Car</a></button>
                <?php
                    if(isset($_POST["submit"])){
                        require "../controler/searchCar.php";
                    }
                    $buyId ="";
                    if(isset($_GET['buyId'])){
                        $buyId= $_GET['buyId']; 
                    }
                    require "../controler/config.php";
                    if(empty($_POST['search'])){
                        $request=mysqli_query($con,"SELECT * FROM voiture WHERE nombre > 0 ");
                        $num_row=mysqli_num_rows($request);
                        if($num_row > 0){
                            echo "<table id = 'all'>";
                            echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Car Name</th>";
                                echo "<th>Price</th>";
                                echo "<th>Number</th>";
                            echo "</tr>";
                            while($rows=mysqli_fetch_assoc($request)){
                                $id=$rows['idVoit'];
                                $carName=$rows['design'];
                                $price = $rows['prix'];
                                $number =$rows['nombre'];
                                echo "<tr>";
                                    echo "<td>".$id."</td>";
                                    echo "<td>".$carName."</td>";
                                    echo "<td>".number_format($price, 0,',','.')."AR</td>";
                                    echo "<td>".$number."</td>";
                                    echo '<td>
                                            <button class="buy"> <a href="buyCar.php?carId='.$rows['idVoit'].'&name=buy&buyId='.$buyId.'"> Buy </a> </button>
                                            <button class="update"> <a href="form.php?updateId='.$rows['idVoit'].'&name=update"> Update </a> </button>
                                            <button class="delete"> <a href="../controler/deleteCar.php?deleteId='.$rows['idVoit'].'"> Delete</a> </button>
                                        </td>';
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        
                    }
                ?>
            </div>
        </div>
    </form>
</body>
</html>