<?php 
 
 // include_once("db.php"); 
 $conn = mysqli_connect("localhost","root","","main");

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
         header("Location: place.php");
?>

