<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
<title></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="start.css"/>
</head>
<body>
<div id='all'>
<div id='body'><img src='pics/logon.png' /><br><a href='403.php'>SCP</a>/<a href='403.php'>Management</a>/<b>Project Phoenix</b><div id='main'>
Dr <?php include 'getname.php'; echo $xNam;
?>,<br>
	<p>Welcome to the Project Phoenix intranet. Get yourself set up on the database and you should be able to manage everything through the new interface. Good luck!</p>
	<span id='sig'>- Agent [REDACTED]</span><br> <br> 
	
	P.S. Have a word with IT about all the firewall warnings that keep popping up.
	</div>
	<div id='sign'>
	<form action="signup2.php" id='signup' method="post"><br>Name:<br>
<input type="text" name="name"><br>
Password:<br>
<input type="password" name="p1"><input type="password" name="p2" ><br>
Contact email:<br>
<input type="text" name="email"><br>
<input type="submit" value="Submit"><br><br><a href='login.php'>login</a></form>
</div></div>
</body>
</html>