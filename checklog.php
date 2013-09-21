<?php
include_once("db.php"); 
 if(isset($_COOKIE['SCP-u'])) { 
	$username = $_COOKIE['SCP-u']; 
	$pass = $_COOKIE['SCP-p']; 
	$check = mysql_query("SELECT * FROM users WHERE name = '$username'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
		if ($pass != $info['password']) { 			
			header("Location: login.php"); 
		} else {
			$id = $info['id'];
						$debug = $info['debug'];
		}
 	}
 } else {
 	header("Location: signup.php"); 
 }
 
 $getstat = mysql_query("SELECT * FROM stats WHERE id = '$id'")or die(mysql_error()); 
	while($st = mysql_fetch_array( $getstat )) 	 { 
		$cash=$st['money'];
	}
 ?>