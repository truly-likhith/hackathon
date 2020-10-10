<?php
 include("dr-config.php");
 if(isset($_POST['dr-generate'])){
  $drfullname = $_POST['dr-fullname'];
  $drworkshop = $_POST['dr-workshop'];
  $dremailid = $_POST['dr-emailid'];
  $drlocation = $_POST['dr-location'];
 $drSql ="INSERT INTO table2(NAME,WORKSHOP,EMAILID,LOCATION) VALUES('$drfullname','$drworkshop','$dremailid','$drlocation')";
 $drConnect->exec($drSql);

 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Free Online Certificate Maker | Create Your Own Certificate Online - Developer Ravi Group</title>
  <link href="https://fonts.googleapis.com/css?family=Amaranth|Courgette|Pacifico|Philosopher:700" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
 </head>
<body>

  <div id="drConvert">
    <div id="dr_header">
      <div class="dr_top_ads"></div>
    </div>
  <form method="post">
    <div id="dr_u2p">
      <p class="dr_title">Certificate Generator</p> <br>
    <div class="drLeftAds">

    </div>
    <div class="drInput">
        <form method="post">
<div class="row">
  <div class="form col-lg-6 col-md-6" >
<label for="Nameinput">User Name :</label>
<input type="text" class="form-control" id="Nameinput" placeholder="Enter Name" name="dr-fullname">
</div>
<br>

<div class="form">
<label for="Course/program">Course/program :</label>
<input type="text" class="form-control" id="courseinput" placeholder="Enter workshop name" name="dr-workshop">
</div>
<br>
<div class="form col-lg-8 col-md-8">
<label for="InputEmail">Email address :</label>
<input type="email" class="eform-control" id="emailinput" placeholder="Enter emailid" name="dr-emailid">
</div>
<br>
<div class="form col-lg-6 col-md-6">
<label for="InputLocation">Location :</label>
<input type="text" class="form-control" id="locationinput" placeholder="Enter Location" name="dr-location">
</div>
</div>
<br>
      <input type="submit" class="btn btn-primary col-sm-6" value="Create" name="dr-generate">
<br>
      <div class="form">
    <label for="File1">File input</label>
    <input type="file" class="form-control-file" id="File1">
  </div>
<br>
</form>
</div>
</div>
<div class="clearfix"></div>
  </form>
  <div class="clearfix"></div>
  <div id="drOutput">
<?php
if(isset($_POST['dr-generate'])){
$fullname = strtoupper($_POST['dr-fullname']);
$fullname_len = strlen($fullname);
if($fullname==""){
  echo "<div class='dr-alert'>* All Fields are required!!!</div>";
}
else {
  ?>
  <div class="drSuccess">
    <?php
  echo "<h3 class='text-center'>Congratulations $fullname on your excellent success and good luck for more progress</h3>";
//certifcate adjustment
    ?>
  </div>
  <?php
  //echo mime_content_type('cert.png') . "\n";
 $imgsrc = "cert.png";
$createimg = imagecreatefromjpeg($imgsrc);
$output = "intern.png";
$white = imagecolorallocate($createimg, 205, 245, 255);
$black = imagecolorallocate($createimg, 0, 0, 0);
$rotation = 0;
$origin_x = 170;
$origin_y=180;
if($fullname_len<=7){
  $font_size = 30;
  $origin_x = 180;
}
elseif($fullname_len<=12){
  $font_size = 30;
}
elseif($fullname_len<=15){
  $font_size = 30;
}
elseif($fullname_len<=20){
   $font_size = 30;
}
elseif($fullname_len<=22){
  $font_size = 30;
}
elseif(fullname_len<=33){
  $font_size=20;
}
else {
  $font_size =15;
}
//certifcate
$certificate_text = $fullname;
$drFont = dirname(__FILE__)."/fonts/developer1.ttf";
$text1 = imagettftext($createimg, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);
// $text1 = imagettftext($createimg, $font_size, $rotation, $origin_x+2, $origin_y, $white, 'sans-serif', $text);
imagepng($createimg,$output,9);
  ?>

  <!--
  download code
  -->
<img src="<?php echo $output; ?>">
<br> <br>
<a href="<?php echo $output; ?>" class="drDownoadLink" download>Download My Internship Certificate</a>
<br><br>
<?php
}
}
?>
  </div>

  <div class="dr_footer">
    All Right Reserved By Developer TeamF5 &copy; <?php echo date('Y'); ?>
  </div>
</div>
</body>
</html>
