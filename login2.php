<?php 
 
  include_once("db.php"); 
  session_start();

     $uname = $_POST['name'];
     $pass = $_POST['p1'];
 
 $pwd=md5("bacon".$pass);
     $sql = "SELECT count(*) FROM users WHERE(
     name='".$uname."' and  password='".$pwd."')";
 
      $qury = mysql_query($sql);
 
      $result = mysql_fetch_array($qury);
 
      if($result[0]>0)
      {
        echo "Successful Login!";
         $hour = time() + 3600; 

setcookie("SCP-u", $_POST['name'], $hour); 
setcookie("SCP-p", $pwd, $hour);	

       header("Location: index.php");
      }
      else
      {
        header("Location: login.php");
      }
?>