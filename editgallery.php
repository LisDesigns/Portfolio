<?php

if (!isset($_SESSION["user"])) {
  session_start();
}
$user = "admin";
$pass = "glebe123";

$loginusername = $_POST["loginusername"];
$loginpassword = $_POST["loginpassword"];

if (!$_SESSION["user"]) {
  if (($loginusername != $user) || ($loginpassword != $pass)){
    header("location:login.php?error=1");
  } else {
    $_SESSION["user"] = $user;
    $_SESSION["pass"] = $pass;
  }
}

//$GalleryName="Baby and Toddler";

if (empty($_POST["GalleryName"])) {
  $GalleryName = $_GET["GalleryName"];
} else {
  $GalleryName = $_POST["GalleryName"];
}
if ($GalleryName == "Create New Gallery") {
  header("location:createnewgallery.php");
}
if ($GalleryName == "Please select") {
  header("location:login.php?error=3");
}

$msg = $_GET["msg"];
if ($msg == "1") {
  $message = "<div style='width:704px;text-align:left;padding:4px'><b>Success!</b> Image uploaded.</div>";
} else if ($msg == "2") {
  $message = "<div style='width:704px;text-align:left;padding:4px'><b>Error:</b> Please upload only jpg files (no greater than 2MB).</div>";
} else if ($msg == "3") {
  $message = "<div style='width:704px;text-align:left;padding:4px'><b>Success!</b> Image deleted.</div>";
}else if ($msg == "4") {
  $message = "<div style='width:704px;text-align:left;padding:4px'><b>Success!</b> Image title renamed.</div>";
}else if ($msg == "5") {
  $message = "<div style='width:704px;text-align:left;padding:4px'><b>Success!</b> Image changed.</div>";
}

header("Pragma:no-cache");
include "includes/header.php";

include "includes/dbconn.php";
?>

<center>
<div id="wrapper" style="overflow:hidden;width:706px">
<div style="width:704px"><p align="right">
<a href="gallery.php?event=<? echo $GalleryName; ?>" style="color:blue">View Live</a>&nbsp; <a href="download.php?GalleryName=<? echo $GalleryName; ?>" style="color:blue">View Voting Results</a>
<a href="logout.php" style="color:blue">Logout</a>
</p>

<div style="width:704px"><h1>Edit <? echo $GalleryName; ?> Gallery</h1> 
<br/><br/>
</div>
<?
echo $message;
?>
<div style="color:rgb(60,60,60);width:704px;height:60px;padding:4px;background-color:#CCDDEE;text-align:left;border: solid 1px rgb(200,200,200);overflow:hidden;">
<h1>Upload New Image</h1>
<form name="postad" method="post" action="process.php" enctype="multipart/form-data" style="display:inline-block;margin-top:4px;">
<? 

//$GalleryName = $_POST["GalleryName"];
//$GalleryName="Baby and Toddler";




echo '<input type="hidden" value="'.$GalleryName.'" name="GalleryName"/>'; 

?>
<b>Name:</b> <input type="text" name="imgname"/> <b style="margin-left:74px">Please select:</b> <input type="file" name="file1" id="file1" style="width:241px;text-align:left!important;"/> <input type="submit" value="Save" style="margin-left:2px"/>
</form>
</div>

<form name="postad" method="post" action="process.php?GalleryName=<? echo $GalleryName; ?>" enctype="multipart/form-data" style="display:inline-block;margin-top:4px">
<table id="table1" style="">
<tbody>
<input type="hidden" name="GalleryName" value="<? echo $GalleryName; ?>">

<?

$dir = "watermark/";
$i=0;


$imgname = $_POST["imgname"];


//$GalleryName = $_GET["GalleryName"];
//$GalleryName="Baby and Toddler";

$query  = "SELECT * FROM photogallery WHERE ImagesId=(select MAX(ImagesId) from photogallery WHERE GalleryName='".$GalleryName."')";
$result = mysql_query($query);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

while($row = mysql_fetch_assoc($result)){
  $id=$row['ImagesId'];
}

$query  = "SELECT * FROM photogallery WHERE GalleryName='".$GalleryName."' ORDER BY Position DESC";
$result = mysql_query($query);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

while($row = mysql_fetch_assoc($result)){
  $id=$row['ImagesId'];
  $ImageName=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $i++;

  $tableheight = $i * 70 + 300;
  if ($tableheight < 300) {
    $tableheight = 600;
  }
//  if ($i > 300) {

  echo '<form name="form'.$id.'" id="form'.$id.'" method="post" action="process.php" enctype="multipart/form-data"><input type="hidden" type="text" name="currentpos" value="'.$Position.'"><tr id="row'.$id.'" ';
  if ($i % 2) {
    echo 'class="shadedrows" ';
  } else {
    echo 'class="lightrows" ';
  }
  $largeimg = "largeimg".$id;
  echo '><td id="col'.$id.'a" class="leftcol" valign="middle"><img src="thumbs/'.$FileName.'" height="56" alt="'.$ImageName.'" align="left" onmouseover="showTip('."'".$largeimg."'".')"  onmouseout="hideTip('."'".$largeimg."'".')" > <img src="watermark/'.$FileName.'" width="160" alt="'.$ImageName.'" id="largeimg'.$id.'" style="position:absolute; margin-top:-40px; display:none" align="left" onmouseout="hideTip('."'".$largeimg."'".')"/>'.$ImageName.' </td><td id="col'.$id.'b" ><input type="button" name="rename" value="Rename" onclick="renameImage('.$id.')"/> <input type="button" name="edit" value="Change Image" onclick="changeImage('.$id.')" style="display:none"/> <input type="button" name="delete" value="Delete" onclick="deleteImage('.$id.",'".$GalleryName."')".'"/> </td></tr></form>';   


//  }
}
?>


<?
echo "</table>";
mysql_close($connection);
?>

<script language="JavaScript1.2" type="text/javascript"/>
<?
echo 'document.getElementById("wrapper").style.height="'.$tableheight.'"';
?>
</script>
<script language="JavaScript1.2" type="text/javascript" src="scripts/photogallery.js"/>
</script>
</div>
</center>
</body>
</html>
<?



?>
