<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data1";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['dr-generate'])){
 $city = $_POST['City'];
 //echo $city;
$sql = "SELECT NAME,WORKSHOP,EMAILID,LOCATION FROM table2 where LOCATION='$city' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["NAME"]. " Email ID: " .$row["EMAILID"]. " Workshop: " .$row["WORKSHOP"]. "<br>"."<hr/>";
    }
} else {
    echo "0 results";
}
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<body>
<form method="post">
  <label for="">City name: </label>
  <input type="text" name="City" value="">
  <input type="submit" class="btn btn-primary col-sm-6" value="Create" name="dr-generate">
</form>
<!--
Download button for the certficate details if location is given
-->
<img src="<?php echo $output; ?>">
<br> <br>
<a href="<?php echo $output; ?>" class="drDownoadLink" download>Download Deails</a>
<br><br>
</body>
</html>
