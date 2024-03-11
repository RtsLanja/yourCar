<?php
    if(isset($_POST["submit"])){                  
        if(isset($_POST["search"])){
            require "config.php";
            $inputValue = $_POST["search"];
            $request = mysqli_query($con,"SELECT * FROM voiture WHERE idVoit='$inputValue' OR design LIKE '%$inputValue%'");
            $num_row = mysqli_num_rows($request);
            if($num_row > 0){
                echo '<button class="hide" name ="hide" id="hide"><img src="../image/x.png" id="searchCar"></button>';
                echo "<table id='result'>";
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
                        echo "<td>".number_format($price, 0,',','.')." AR</td>";
                        echo "<td>".$number."</td>";
                        echo '<td>
                                    <button class="buy"> <a href="buyCar.php?buyId='.$rows['idVoit'].'&name=buy"> Buy </a> </button>
                                    <button class="update"> <a href="form.php?updateId='.$rows['idVoit'].'&name=update"> Update </a> </button>
                                   <button class="delete"> <a href="../controler/deleteCar.php?deleteId='.$rows['idVoit'].'"> Delete</a> </button>
                                </td>';
                    echo "</tr>";                
                }
                echo "</table>";
            }
            else{
                echo '<button class="hide" name ="hide"><img src="../image/x.png" id="searchCar"></button>';
                echo "<p class='message' id='result'>Nothing found!";
            }
        }
    }
    
?>