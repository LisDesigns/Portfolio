<?php

if (($_GET['loginpassword']=="pass") && ($_GET['loginusername']=="admin")) {
  session_start();
  $_SESSION["user"] = $_GET['loginusername'];
}

if (!isset($_SESSION["user"])) {
  session_start();
}

if (!$_SESSION["user"]) {
  header("location:login.php?error=1");
}

include "includes/dbconn.php";
include "includes/header.php";
$result = mysql_query("SELECT * FROM products ORDER BY product ASC ");

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}
?>
<p align="right"><a href="logout.php">Logout</a></p>
<h1>All Products</h1>
Click here to <a href="add.php">Add New Product</a><br/><br/>
<table border="1">
<tr><th>Id</th>
<th>Product</th>
<th>Category</th>
<th>Price</th>
<th>Shipping</th>
<th>Picture</th>
<th></th>
<th></th>
</tr>
<?
while($row = mysql_fetch_assoc($result)){



  echo "<tr><td>".$row['productId']."</td>";
  echo " <td>".$row['product']."</td>";
  echo "<td>".$row['category']."</td>";
  //echo "<br/><b>Description: </b>".$row['description']."</td>";
  echo "<td>".$row['price']."</td>";
  echo "<td>".$row['shipping']."</td>";
  echo "<td>".$row['picture']."</td>";
  echo "<td> <a href='edit.php?productId=".$row['productId']."'>Edit</a> "."</td>";
  echo "<td> <a href='delete.php?productId=".$row['productId']."'>Delete</a><br/>"."</td></tr>";  

}
?>
</table>

