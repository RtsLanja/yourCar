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
                <div class="search ">
                    <input type="date" name="date1" id="search">
                    <input type="date" name="date2" id="search">
                    <button name="submit" id="searchButton"><img src="../image/1.png" alt=""></button>
                </div>
            </div>
            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="car.php" class="forAdmin">Cars</a></li>
                <li><a href="client.php">Clients</a></li>
                <li><a href="#">Buy</a></li>
            </ul>
            <div class="container">
                <p>List of All Solde</p>
                <?php
                    require "../controler/config.php";
                    require "../controler/searchBought.php";
                    if(empty($_POST['date1']) && empty($_POST['date2'])){
                        $requestAchat=mysqli_query($con,"SELECT * FROM achat WHERE MONTH(date) = MONTH(CURRENT_DATE)");
                        $num_rowAchat=mysqli_num_rows($requestAchat);
                        if($num_rowAchat > 0){
                            echo "<table>";
                            echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Date</th>";
                                echo "<th>Client Name</th>";
                                echo "<th>Car Name</th>";
                                echo "<th>Number</th>";
                            echo "</tr>";
                            while($rows=mysqli_fetch_assoc($requestAchat)){
                                $idVoit=$rows['idVoit'];
                                $idCli=$rows['idCli'];
                                $date = $rows['date'];
                                $qte =$rows['qte'];
                                $id= $rows['numAchat'];
                                $selectDesign=mysqli_query($con,"SELECT design FROM voiture WHERE idVoit='$idVoit'");
                                $rowDesign=mysqli_fetch_array($selectDesign);
                                $design_value=$rowDesign["design"];
                                $selectClient=mysqli_query($con,"SELECT nom FROM client WHERE idCli='$idCli'");
                                $rowClient=mysqli_fetch_array($selectClient);
                                $client_value=$rowClient["nom"];
                                echo "<tr>";
                                    echo "<td>".$id."</td>";
                                    echo "<td>".$date."</td>";
                                    echo "<td>".$client_value."</td>";
                                    echo "<td>".$design_value."</td>";
                                    echo "<td>".$qte."</td>";
                                    echo '<td>
                                            <button class="update"> <a href="buyCar.php?updateId='.$rows['numAchat'].'&name=update"> Update </a> </button>
                                            <button class="delete"> <a href="../controler/deleteBuy.php?deleteId='.$rows['numAchat'].'"> Delete</a> </button>
                                            <button class="add"> <a href="../controler/generatePDF.php?buyId='.$rows['numFact'].'"> Invoice </a> </button>
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