<?php
    if(isset($_POST["submit"])){                  
        if(isset($_POST["date1"])  && isset($_POST["date2"])){
            require "config.php";
            $firstDate = $_POST["date1"];
            $secondDate = $_POST["date2"];
            $request = mysqli_query($con,"SELECT * FROM achat WHERE date >= '$firstDate' AND date <= '$secondDate' OR date <= '$firstDate' AND date >= '$secondDate'");
            $num_row = mysqli_num_rows($request);
            if($num_row > 0){
                echo '<button class="hide" name ="hide" id="hide"><img src="../image/x.png" id="searchCar"></button>';
                echo "<table id = 'result'>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Date</th>";
                            echo "<th>Client Name</th>";
                            echo "<th>Car Name</th>";
                            echo "<th>Number</th>";
                        echo "</tr>";
                        while($rows=mysqli_fetch_assoc($request)){
                            $idVoit=$rows['idVoit'];
                            $idCli=$rows['idCli'];
                            $date = $rows['date'];
                            $qte =$rows['qte'];
                            $id= $rows['numAchat'];
                            $selectName=mysqli_query($con,"SELECT nom FROM client WHERE idCli='$idCli'");
                            $rowName=mysqli_fetch_array($selectName);
                            $name_value=$rowName["nom"];
                            $selectDesign=mysqli_query($con,"SELECT design FROM voiture WHERE idVoit='$idVoit'");
                            $rowDesign=mysqli_fetch_array($selectDesign);
                            $design_value=$rowDesign["design"];
                            echo "<tr>";
                                echo "<td>".$id."</td>";
                                echo "<td>".$date."</td>";
                                echo "<td>".$name_value."</td>";
                                echo "<td>".$design_value."</td>";
                                echo "<td>".$qte."</td>";
                                echo '<td>
                                        <button class="update"> <a href="buyCar.php?updateId='.$rows['numAchat'].'&name=update"> Update </a> </button>
                                        <button class="delete"> <a href="../controler/deleteBuy.php?deleteId='.$rows['numAchat'].'"> Delete</a> </button>
                                    </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
            }
            else{
                echo '<button class="hide" name ="hide"><img src="../image/x.png" id="searchCar"></button>';
                echo "<p class='message'>Nothing found!";
            }
        }
    }
    
?>