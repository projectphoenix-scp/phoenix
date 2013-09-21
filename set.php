<?php 
 
 // include_once("db.php"); 
 $conn = mysqli_connect("localhost","root","","main");

$nam= $_POST['nam'];
     $ex = $_POST['ex'];
     $wy = $_POST['wy'];
 	 $id = $_POST['idd'];
 //	 echo $nam.$ex;
     //$sql = "UPDATE building SET name = '$nam', x='$ex',y='$wy' WHERE id=$id";
    mysqli_query($conn,"UPDATE building SET name ='$nam', x='$ex',y='$wy' WHERE id='$id'");
         header("Location: place.php");
?>

