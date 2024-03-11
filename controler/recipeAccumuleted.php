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
        echo "<div class ='recipe'>";
        $allMonthName=[];
        $total = 0;
        for($i = 0 ; $i < 6 ; $i++){
            $date1 = '2024-'.$allMonth[$i].'-01';
            $request1 = mysqli_query($con ,"SELECT MonthName(CONCAT('2024-','$allMonth[$i]','-01')) AS monthName");
            $rows1 = mysqli_fetch_array($request1);
            $allMonthName[$i] = $rows1["monthName"];
            $recipe =  getRecipe($allMonth[$i]);
            $total =$total + $recipe;
            echo "<div>";
            echo '<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="w-6 h-6">
                  <path fillRule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clipRule="evenodd" />
                  </svg>';
            echo "<h2>".$allMonthName[$i]."</h2>";
            echo "<p>".number_format($recipe, 0,',','.') ."AR</p>";
            echo "</div>";
        }
        echo "<div>";
        echo '<svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
              <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
              </svg>';
        echo "<h2>Total</h2>";
        echo "<p>".number_format($total, 0,',','.')." AR</p>";
        echo "</div>";
        echo "</div>";
        
    }
?>