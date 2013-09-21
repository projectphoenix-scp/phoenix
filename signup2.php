<?php include_once("db.php"); ?>
 
<?php
           $user = $_POST['name'];
           $pass1 = $_POST['p1'];
           $pass2 = $_POST['p2'];
           $email = $_POST['email'];
           
           
           //PASSWORD
           if($pass1!=$pass2){ //match?
           		die("passwords do not match");
           }
           if(strlen($pass1)<5){ //long enough?
           	die("password too short");
           	}
           $pass=md5("bacon".$pass1); //hash.
           	
           	//EMAIL
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //valid?
			$email2=$email;
		} else {
			die("email is invalid");
		}
		$res2=mysql_query("SELECT 1 FROM users WHERE `email` = '$email'"); //in use?
			if(mysql_num_rows($res2) > 0){
				die("email taken");
				}
				
		//USERNAME
			$res=mysql_query("SELECT 1 FROM users WHERE `name` = '$user'"); //in use?
			if(mysql_num_rows($res) > 0){
				die("username taken");
				}
							
          $sql = "INSERT into users (name,email,password)values('$user','$email','$pass')";
           $qury = mysql_query($sql);
           
	$check = mysql_query("SELECT * FROM users WHERE name = '$user'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
		$id = $info['id'];
	}
           $sql = "INSERT into stats (id)values('$id')";
           $qury = mysql_query($sql);
 
       header( 'Location: index.php' ) ;
?>