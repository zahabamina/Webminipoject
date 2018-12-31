<?php

$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbase = 'canteen';

   $dab = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase);
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
   if($requestMethod == "POST") {

      $dish = $_POST['dish'];
      $no_dish = $_POST['no_dish'];
      $time = $_POST['time'];
      $amount = $_POST['amount'];
      $total = $no_dish * $amount;
    
      $sql1 = "INSERT INTO cfood VALUES ('$dish','$no_dish','$time','$amount','$total')";
            $result1 = mysqli_query($dab,$sql1);
            echo "$result1";
            if ($result1) {
              header("location:menu.html");
            }
            }
             ?>

<!DOCTYPE html>
<html>
<head>
<title>CHINESE FOOD</title>
<style>
.navbar {
  overflow: hidden;
  background-color: olive;
  color :black;
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
.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px;
}
.footer{
       position: local;     
       text-align: center;    
       bottom: 0px; 
       width: 100%;
       background-color: #dddd;
       color:black;
       padding: 14px 14px;
       text-decoration: none;
       font-size: 20px;
}
div.background {

    background-image: url("img/ccc.jpg");
    min-height: 500px; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border: 2px solid black;
}

div.transbox {
  text-align: center;
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.8;
  filter: alpha(opacity=60);
  border-radius: 5%;
  border:2px;
  border-color:white;
  max-width:50%;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
  

}
h1{
text-align:center;
}
</style>
</head>
<body style="margin:0px">

<div class="navbar" style="font-style: italic;">
          <a href="nfood.php">North Indian</a>
          <a href="sfood.php">South Indian</a>
          <a href="chats.php">Chats/Saviours</a>
	  <a href="refresh.php">Refreshments</a>
	  <a href="bakery.php">Bakery</a>
	  <a href="cart.php">Cart</a>
          <a href="index.html">Logout</a>
    </div>

<div class="background">
<br><br><br><br>
<br><br><br><br>
<center>
  <div class="transbox">
<br>
    <h1>CHINESE FOOD</h1><br>

		<form action="" method="POST">

  <label>Enter the Dish:</label>
  
 <br> <select name="dish" >
 <option>Choose a Dish</option>
<option>Noodels</option>
<option>Gobi Manchuri</option>
</select>

<br><br><br><br>

  <label>Enter the Number of Dishes:</lable>
  <br> <select name="no_dish" >
 <option>select</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>

<br><br><br><br>

  <label>Enter the Schedule Time:</label>
  <br><input type="time" placeholder="" required name="time"><br><br><br><br>

<label>Amount:</label>
<br><select name="amount">
<option>Amount</option>
<option>100-Noodles</option>
<option>150-Gobi manchuri</option>
</select>

<br><br>
<button type="submit">ORDER</button>
<br><br><br><br>

  
</form>

  </div>
<br><br><br><br><br><br><br><br>
</center>
</div>

</body>
</html>


 
