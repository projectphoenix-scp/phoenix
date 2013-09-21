<?php 
 
  include_once("db.php"); 
 $conn = mysqli_connect("localhost","root","","main");
	$username = $_COOKIE['SCP-u']; 
	$pass = $_COOKIE['SCP-p']; 
$check = mysql_query("SELECT * FROM users WHERE name = '$username'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
		if ($pass != $info['password']) { 			
			header("Location: login.php"); 
		} else {
			$id = $info['id'];
		}
 	}
$check = mysql_query("SELECT * FROM stats WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
			$money = $info['money'];
 	}
 	 $check = mysql_query("SELECT * FROM bought WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 {
		$cell =	$info['cell'];
		$bcell= $info['bcell'];
		$cnt = 	$info['cnt'];
		$hall =	$info['hall'];
		$lhall=	$info['lhall'];
 	}
 //	echo $money;
// 	echo "<br>";
 	$buy=$_GET['buy'];
 	//add to db later
 	$a1=100;
 	$a2=200;
 	$a3=400;
 	$a4=50;
 	if($buy==1){
 		$cost=$a1;
 	} else  	if($buy==2){
 		$cost=$a2;
 	} else  	if($buy==3){
 		$cost=$a3;
 	} else  	if($buy==4){
 		$cost=$a4;
 		 	} else  	if($buy==5){
 		$cost=$a4;
 	} else {
 		//INVALID PURCHASE
 		header("Location: place.php");
 	}
 	if($money>=$cost){
 		$money-=$cost;
 	} else {
 		//NOT ENOUGH CASH
 		header("Location: place.php");
 	}
 mysqli_query($conn,"UPDATE stats SET money ='$money' WHERE id='$id'");
  	if($buy==1){
 		$cell++;
 	} else  	if($buy==2){
 		$bcell++;
 	} else  	if($buy==3){
 		$cnt++;
 	} else  	if($buy==4){
 		$hall++;
 		 	} else  	if($buy==5){
 		$lhall++;
 	} else {
 		//INVALID PURCHASE
 		header("Location: place.php");
 	}
mysqli_query($conn,"UPDATE bought SET cell ='$cell', bcell='$bcell',cnt='$cnt', hall='$hall', lhall='$lhall' WHERE id='$id'");
         header("Location: place.php");
/*
$id= $_POST['idd2'];
     $cell = $_POST['cell'];
     $bcell = $_POST['bcell'];
     $cnt = $_POST['cnt'];
 	 $hall = $_POST['hall'];
 	 $lhall = $_POST['lhall'];
 	// echo $cell;
 //	 echo $nam.$ex;
     //$sql = "UPDATE building SET name = '$nam', x='$ex',y='$wy' WHERE id=$id";
    mysqli_query($conn,"UPDATE bought SET cell ='$cell', bcell='$bcell',cnt='$cnt', hall='$hall', lhall='$lhall' WHERE id='$id'");
         header("Location: place.php");*/
?>

