<?php
        function getRecipe($month){
            require "config.php";
            $request= mysqli_query($con,"SELECT idVoit FROM achat WHERE month(date) = '$month'");
            $num_row = mysqli_num_rows($request);
            $recipe = 0;
            if($num_row > 0){
                while($rows = mysqli_fetch_assoc($request)){
                    $id = $rows["idVoit"];
                    $request1 = mysqli_query($con ,"SELECT prix FROM voiture WHERE idVoit = '$id'");
                    while($rows= mysqli_fetch_assoc($request1)){
                        $recipe = $recipe + $rows["prix"];
                    }
                }
            }
            return $recipe ;
        }
    function showRecipe(){
        require "config.php";
        $date= date("Y-m-d");
        $selectMonth = mysqli_query($con,"SELECT MONTH('$date') AS month");
        $num_row =mysqli_num_rows($selectMonth);
        if($num_row  > 0){
            $rows =mysqli_fetch_array($selectMonth);
            $actualMonth = $rows["month"];
        }
        $allMonth=[];
        $tmp;
        for($i = 0 ; $i < 6 ; $i++){
            $allMonth[$i]=0;
        }
        for($i = 0 ; $i < 6 ; $i++){
            $tmp = $actualMonth - $i;
            if($tmp > 0){
                $allMonth[5-$i] = $tmp;
            }
            if($allMonth[5-$i] <= 0){
                $allMonth[5-$i] = 12 + $tmp;
            } 
        }
        echo "<table >";
        echo "<tr>";
        $allMonthName=[];
        for($i = 0 ; $i < 6 ; $i++){
            $date1 = '2024-'.$allMonth[$i].'-01';
            $request1 = mysqli_query($con ,"SELECT MonthName(CONCAT('2024-','$allMonth[$i]','-01')) AS monthName");
            $rows1 = mysqli_fetch_array($request1);
            $allMonthName[$i] = $rows1["monthName"];
            echo "<th>".$allMonthName[$i]."</th>";
        }
        echo "<th>Total</th>";
        echo "</tr>";
        echo "<tr>";
        $total = 0;
        for($i = 0 ; $i < 6 ; $i++){
            $recipe =  getRecipe($allMonth[$i]);
            echo "<td>".number_format($recipe, 0,',','.') ."AR</td>";
            $total =$total + $recipe;
        }
        echo "<th>".number_format($total, 0,',','.')." AR</th>";
        echo "</tr>";
    }
?>