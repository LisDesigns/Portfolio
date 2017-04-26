<?

header("Pragma:no-cache");
include "includes/dbconn.php";
include "includes/output_header.php";

$GalleryName = $_GET["event"];
$output='class="photothumbs"';
if ($_GET["event"] = ""){
?>
 <script language="JavaScript1.2" type="text/javascript">
   document.location.href="Location:http://www.thephotostudio.com.au/events/";
 </script>

<?
} 


//$GalleryName = "The Face of Photo Studio";

//$query  = 'SELECT * FROM photogallery WHERE GalleryName="'.$GalleryName.'" ORDER BY Position ASC';

$query  = 'SELECT * FROM photogallery WHERE GalleryName="'.$GalleryName.'" ORDER BY Position ASC';

$result = mysql_query($query);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

$num = 0;
while($row = mysql_fetch_assoc($result)){
  $num++;
}

?>
     <br/>
        <h1><center><? echo $GalleryName; ?></center></h1>
        
        <p style="text-align: center">Scroll down and <a href="#vote">vote</a> for your favourite picture!</p>
<table width="1000" cellpadding="5" cellspacing="1">

<tr>
<td height="10" colspan="5" align="right">
<? echo "Page: ";

  if ($num >= 0) { 
    echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=1">1</a> ';
  }
  if ($num > 50) {
    echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=2">2</a> ';
  }
  if ($num > 100) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=3">3</a> ';
  }
  if ($num > 150) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=4">4</a> ';
  }
  if ($num > 200) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=5">5</a> ';
  }
  if ($num > 250) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=6">6</a> ';
  }
  if ($num > 300) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=7">7</a> ';
  }
  if ($num > 350) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=8">8</a> ';
  }
  if ($num > 400) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=9">9</a> ';
  }
  if ($num > 450) { 
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=10">10</a>  ';
  }

?> &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; </td>
</tr>

<?
$i = 0;
$x = 0;
$startrow = '<tr>';
$closerow = '</tr>';
$query  = 'SELECT * FROM photogallery WHERE GalleryName="'.$GalleryName.'" ORDER BY Position ASC';

$result = mysql_query($query);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}
echo $startrow;
while($row = mysql_fetch_assoc($result)){
  $x++;

if (($_GET["page"] == "") || ($_GET["page"] == "1")){
  if ($x <= 50) {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  $vertical = ' height="100" width="150"';
  $horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'"alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}

if ($_GET["page"] == 2) {
  if (($x > 50) && ($x <= 100)) {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}

if ($_GET["page"] == 3) {

  if (($x > 100) && ($x <= 150))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}


if ($_GET["page"] == 4) {
  if (($x > 150) && ($x <= 200))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}

if ($_GET["page"] == 5) {
  if (($x > 200) && ($x <= 250))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
if ($_GET["page"] == 6) {
  if (($x > 250) && ($x <= 300))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}



if ($_GET["page"] == 7) {
  if (($x > 300) && ($x <= 350))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
/*
if ($_GET["page"] == 8) {
  if (($x > 309) && ($x <= 400))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }

}


if ($_GET["page"] == 8) {
  if (($x > 350) && ($x <= 400))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
if ($_GET["page"] == 9) {
  if (($x > 400) && ($x <= 450))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
if ($_GET["page"] == 10) {
  if (($x > 450) && ($x <= 500))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    //$output = $vertical;
  } else {
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
if ($_GET["page"] == 11) {
  if (($x > 500) && ($x <= 550))  {

  $id=$row['ImagesId'];
  $title=$row['ImageName'];
  $FileName=$row['FileName'];
  $Position=$row['Position'];
  $large = "watermark/".$FileName;
 // $large = "uploads/".$FileName;
  $thumb = "thumbs/".$FileName;
  //$size = getimagesize();
  $thumbsize = imagecreatefromjpeg($thumb);  
  $thumbsize_width = imagesx($thumbsize);  
  $thumbsize_height = imagesy($thumbsize);  
  //$vertical = ' height="100" width="150"';
  //$horizontal =  ' width="150" height="100"';
  if ($thumbsize_height > $thumbsize_width ) {
    $output="";
    //$output = $vertical;
  } else {
    $output="";
    //$output = $horizontal;
  }

  if ($i < 5) {
  echo '<td width="153" height="100"  align="center" valign="middle">';
  echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  } else {
    $i = 0;
    echo $closerow.$startrow;
    echo '<td width="153" height="100"  align="center" valign="middle">';
    echo '<a href="'.$large.'" target="first_window"><div class="photocell"><img src="'.$thumb.'" alt="'.$title.'" '.$output.'/></div></a><br/>'.$title.'<br/></td>';
  }

  }
}
*/

  $i++;

}
echo $closerow;


?>

<tr>
<td height="10" colspan="5" align="right">
<?

  echo "Page: ";
  if ($num >= 0) { 
    echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=1">1</a> ';
  }
  if ($num > 50) {
    echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=2">2</a> ';
  }
  if ($num > 100) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=3">3</a> ';
  }
  if ($num > 150) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=4">4</a> ';
  }
  if ($num > 200) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=5">5</a> ';
  }
  if ($num > 250) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=6">6</a> ';
  }
  if ($num > 300) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=7">7</a> ';
  }
  if ($num > 350) {
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=8">8</a> ';
  }
  if ($num > 400) {  
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=9">9</a> ';
  }
  if ($num > 450) { 
  echo '<a href="http://www.thephotostudio.com.au/photogallery/gallery.php?event='.$GalleryName.'&page=10">10</a>  ';
  }

?> &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; 
</td>
</tr>

</table>


<center>
<div style="margin-left:;500px;width:560px;text-align:left; border-top-style:;dashed; border-top-width:;1px;border-color:;rgb(200,200,200)">
<center>
<a name="vote"></a><h1><? echo $GalleryName; ?></h1>

Please enter your vote for <? echo $GalleryName; ?> Competition
</center>
<br/><br/><form name="vote" action="http://www.thephotostudio.com.au/photogallery/gallery.php?event=vote.php" method="post">
<table style="margin-left:40px;">
<input type="hidden" name="competitionname" value="<? echo $GalleryName; ?>"/>
<tr><td>First Name: <span class="ast">*</span></td><td><input type="text" name="firstname"/></td>
<td> &nbsp; &nbsp;Last Name: <span class="ast">*</span></td><td><input type="text" name="lastname"/></td></tr>

<tr><td>Email: <span class="ast">*</span></td><td><input type="text" name="emailaddress"/></td>
<td> &nbsp; &nbsp;Phone: <span class="ast">*</span></td><td><input type="text" name="phone"/></td></tr>

<tr><td>Vote Number: <span class="ast">*</span></td><td><input type="text" name="votenumber"/></td>
<td></td><td align="right"><input type="submit" value="Vote" style=""/></td></tr>


<tr><td></td><td align="right" valign="top" style="text-align:right"></td></tr>
</table>

</div>
<!--
<div id="submitDiv" style="height:20px;text-align:right;width:560px;padding-right:156px;"><input type="submit" value="Vote" style=""/></div>
-->

</form>
</center>

<!--
<script language="JavaScript" type="text/javascript" src="scripts/validatevote.js"></script>
-->
<?
include "includes/output_footer.php";
?>