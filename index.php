<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綜合練習-萬年曆製作</title>
    <style>
    .header{
  height: 10vh;
  width: 100vw;
  background-color: black;
  color: white;
  padding: 5px; 
  text-align: center;
  display: table-cell;
  vertical-align: center;
}
body{  
  font-size: 1em;
  margin: auto;
  font-family: "微軟正黑體";
  text-align: center;
  background-color: pink;
}
p.saying{
  font-family: "Times New Norman";
  font-size: 1.2em;
  text-align: center;
  margin: 15px;
}

table {
    border-collapse: collapse;    
    margin: auto;  
    font-size: 1.5rem;

}
table td{
  border: 1px solid white;
  width: 35px;
  height: 35px;  
  padding: 1px;
  background-color: black; 
  color: white;  
}
table th{
  border: 1px solid white;
  width: 35px;
  height: 35px%;  
  padding: 1px;
  background-color: darkblue; 
  color: white;  
}

div.jump{
  font-size: 25px;
  font-weight: bold;
  color: white;
  background-color: darkgray;
  text-decoration: none;  
  padding: 2px;
  margin: 2px;
  display: inline-block;

 }


    </style>
</head>
<body>

<div class="header">
<h1>The Present</h1>
</div>

<div>
<p class="saying">Yesterday's the past, tomorrow's the future, but today is a gift. That's why it's called the present. --Bil Keane</p>

</div>


<div class="container">


<?php

//決定目前的月份

if(!empty($_GET['month'])){
    $month=$_GET['month'];
}else{
        $month=date("m");
}
// echo $month . "<br>"; 
if(!empty($_GET['year'])){
    $year=$_GET['year'];

}else{
        $year=date("Y");
}
// echo $year;
?>

<?php
    $sd=[
        9=>"生日",
        10=>"國慶日",
        25=>"光復節",
    ];
    $today=date("Y-m-d");
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));
    $days=date("t",strtotime($start));
    $endDay=date("w",strtotime($year-$month-$days));

    echo "<h2>".date("Y-m",strtotime($start))."</h2>";
?>


<br>


<div class="jump">


<?php
 if(($month-1)>0){
    ?>
        <a href="?month=<?=($month-1);?>&year=<?=($year);?>">上一月</a> 
    <?php
      }else{
    ?>
        <a href="?month=<?=12;?>&year=<?=($year-1);?>">上一月</a> 
    <?php
     }
    ?>
</div>

<div class="jump">
    <?php
    if(($month+1)<=12){
    ?>
        <a href="?month=<?=($month+1);?>&year=<?=($year);?>">下一月</a>
    <?php
    }else{
    ?>
        <a href="?month=1&year=<?=($year+1);?>">下一月</a>
    <?php
    }
    ?>

</div>

<table>
    <tr>
        <th>日</th>
        <th>一</th>
        <th>二</th>
        <th>三</th>
        <th>四</th>
        <th>五</th>
        <th>六</th>
    </tr>
<?php
for($i=0;$i<6;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){
        if(!empty($sd[$i*7+$j+1-$startDay])){
            $str="";
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                if(($i*7+$j+1-$startDay)==$todayDays){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                if(($i*7+$j+1-$startDay)==$todayDays){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>
</div>
</body>
</html>