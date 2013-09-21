<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
<title></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="scripts/default2.css"/>
<link rel="stylesheet" type="text/css" href="scripts/drop2.css"/>
<link href="scripts/jquery-ui.css" rel="stylesheet" type="text/css"></link>
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>  
<?php include_once("checklog.php"); ?>

</head>
<body>
<?php include 'head.php'; ?>
<br><br><br>
<div id='all'>
<div id='body2'>
<?php include 'getname.php';?>
<h1> Purchase STAFF</h1>
<center><table border="1">
<tr>
<td>Research:</td>
</tr>
<tr>
<td><?php echo 'DR '.$aNam[rand(1, 1282)];?></td>
<td>(Junior researcher)</td>
<td>$30/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td><?php echo 'DR '.$aNam[rand(1, 1282)];?></td>
<td>(Senior researcher)</td>
<td>$100/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td>Containment:</td>
</tr>
<tr>
<td><?php echo 'Agent '.$aNam[rand(1, 1282)];?></td>
<td>(01)</td>
<td>$30/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td><?php echo 'Agent '.$aNam[rand(1, 1282)];?></td>
<td>(02)</td>
<td>$40/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td><?php echo 'Agent '.$aNam[rand(1, 1282)];?></td>
<td>(03)</td>
<td>$60/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td><?php echo 'Agent '.$aNam[rand(1, 1282)];?></td>
<td>(04)</td>
<td>$150/day.</td>
<td><button>buy</button>
</tr>
<tr>
<td>D-Class:</td>
</tr>
<tr>
<td>D-<?php echo rand(999, 9999);?></td>
<td>incurs a $50 procuring<br>fee</td>
<td>$5/day.</td>
<td><button>buy</button>
</tr>
</table></center>
<div id='aaa' style="float:right;height:100%;width:35%;padding-right:10px;"></div>
</div>
<div id='side'>
<!--SIDE HERE-->
<table border='1'>
<tr>
<?php
if(isset($_GET["exp"])){
	$ex=$_GET["exp"];
}else{
	$ex=0;
}
?>
<td>Researchers</td><td>0</td><td><button>expand</td></tr>
<td>Agents</td><td>0</td><td><button>expand</td></tr>
<td>D-class</td><td>0</td><td><button>expand</td></tr>
</table>
</div>
</div>
</body>
</html>