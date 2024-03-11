<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewStyle.css">
    <title>yourCar</title>
</head>
<body>
    <div class="top_bar">
        <div class="logo">
        <div class="logo">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="w-6 h-6">
            <path fillRule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clipRule="evenodd" />
            </svg>
            <p class="part1">your<span class ="part2">Car</span></p>
        </div>
        </div>
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="car.php" class="forAdmin">Cars</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="buy.php">Buy</a></li>
        </ul>
        <div class="container">
            <p>List of Clients</p>
            <form action="" method="post">
                <button class="add" name="add"><a href="addNewClient.php">Add New Client</a></button>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <?php 
                        require "../controler/config.php";
                        //affichage
                        $req_show=mysqli_query($con , "SELECT * FROM client");
                        $num_line_show= mysqli_num_rows($req_show);
                        if($num_line_show >0) {
                            while($row_show = $req_show ->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <th scope="row">' . $row_show['idCli'] . '</th>
                                        <td>' . $row_show['nom'] . '</td>
                                        <td>' . $row_show['contact'] . '</td>  
                                        <td> 
                                        <button class ="update"> <a href="updateClient.php?updateId='.$row_show['idCli'].'">  Update </a> </button>
                                        <button class ="delete"><a href="../controler/deleteClient.php?deleteId='.$row_show['idCli'].'"> Delete </a></button> 
                                        </td>               
                                    </tr> 
                                    ';
                            }
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>