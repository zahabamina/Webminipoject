<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbase = 'canteen';

   $dab = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase);
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST")
   {
      //nothing
   }
         
          
            $summary ="SELECT * FROM nfood UNION SELECT * FROM sfood UNION SELECT * FROM cfood UNION SELECT * FROM chats
		UNION SELECT * FROM refresh UNION SELECT * FROM bakery";
            $sresult = mysqli_query($dab,$summary);
            $rows = mysqli_num_rows($sresult);
              
            if($sresult)
            {
              for ($j = 0 ; $j < $rows; $j++)
              {
                $row = mysqli_fetch_array($sresult,MYSQLI_ASSOC); 
              }  
            }
          
?>

<!DOCTYPE html>
<html>

<head>

<style>
h2{color: black;
}
.navbar {
  overflow: hidden;
  background-color:white;
  color :black;
  font-style: italic;
  position: flex;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: rgba(0, 0, 0, 0.685);
  text-align: center;
  padding: 14px 15px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover {
  background: rgb(214, 208, 208);
  color: black;
}
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table th {
    background-color: black;
    color: white;
}
p.s1 {
    font-family: "Chiller", Times, serif;
}

p.s2 {
    font-family: "courier new", Helvetica, sans-serif;
}
p.s3 {
    font-family: "Engravers MT", Helvetica, sans-serif;
    color:white;
}
table tr:nth-child(even) {
    background-color: white;
}

table tr:nth-child(odd) {
   background-color: #fff;
}
.bg {
    background-image: url("img/tile.jpg");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
body, html {
    height: 100%;
    margin: 0;
}

</style>
  
    <title>ORDER SUMMARY</title>

    <form action="" method="POST">


    <br><br>
    <br><br>
</head>



<body class="bg">
<div class="navbar">
      <a href="nfood.php">North Indian</a>
          <a href="sfood.php">South Indian</a>
          <a href="chats.php">Chats/Saviours</a>
	  <a href="refresh.php">Refreshments</a>
	  <a href="bakery.php">Bakery</a>
	  <a href="cfood.php">Chinese</a>
          <a href="index.html">Logout</a>
    </div>
 <h2><p align=center class ="s3">ORDER SUMMARY</p></h2>

<h3><p class ="s2">


<?php
//displaying staff details in html
$a=0;
$sresult = mysqli_query($dab,$summary);
if($sresult){
    echo "<table><tr><th> DISH </th><th> QUANTITY </th><th> TIME </th><th> AMOUNT </th><th> TOTAL</th></tr>";
  for ($j = 0 ; $j < $rows; $j++){
    $row = mysqli_fetch_array($sresult,MYSQLI_ASSOC);   

    echo nl2br( "<tr><td>".$row['dish'] . "</td><td>".$row['no_food']. "</td><td>".$row['time']. "</td><td>".$row['amount']
    . "</td><td>".$row['total']."</tr></td>"); 
	$a += $row['total'];
  }
  echo "</table>";
	echo "<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;final total is: ".$a; echo "</h2>";

}

?>

<h2>Payment Option:</h2>  
<select name="" >
<option>Payment</option>
<option>CASH</option>
<option>CREDIT/DEBIT CARD</option>
<option>PAYTM</option>
</select>

<h2>
Click the button to print the summary</h2>
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>
</p></h3>

<?php
echo "<h2>The token Number is:" .uniqid();
echo "</h2>";
?>
</body>
</html>
