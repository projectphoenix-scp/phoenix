<?php 
 
  include_once("db.php"); 
 $conn = mysqli_connect("localhost","root","","main");
	$username = $_COOKIE['SCP-u']; 
	$pass = $_COOKIE['SCP-p']; 
$check = mysql_query("SELECT * FROM users WHERE name = '$username'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
			$id = $info['id'];
 	}
  mysqli_query($conn,"UPDATE stats SET money ='10000' WHERE id='$id'");
  mysqli_query($conn,"UPDATE bought SET cell ='0', bcell='0',cnt='0', hall='0', lhall='0' WHERE id='13'");
         header("Location: place.php");
?>

