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
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>
</head>
<!--<body>-->
<body onload="startTime()">
<?php include 'head.php'; ?>
<br><br><br>
<div id='all'>
<div id='body2'>

<div class="drop" id='big1'>
  <div id="droppable"><div id='bbgg'></div></div>
  <div onclick="window.location.href = 'assign.php?name=s173';" class='drag'  id='s173' style='width:120px; height:100px;'><br>SCP-173 Containment Cell.</div>
  <?php
 // echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='cell".$i."' style='width:40px; height:
  $get = mysql_query("SELECT * FROM bought WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $get )) 	 { 
			$cell = $info['cell'];
			$bcell = $info['bcell'];
			$cnt = $info['cnt'];
			$hall = $info['hall'];
						$lhall = $info['lhall'];
		}
	for ($i=0;$i<$cell;$i++){
		echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='cell".$i."' style='width:40px; height:40px;'>cell</div>";
	}
		for ($i=0;$i<$bcell;$i++){
		echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='bcell".$i."'  style='width:40px; height:80px;'>
		<div id='inner' style='visibility:hidden;'>dsfgsdfggfds</div>cell</div>";
	}
			for ($i=0;$i<$lhall;$i++){
		echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='lhall".$i."' style='width:20px; height:180px;'>h<br>a<br>l<br>l</div>";
	}
		for ($i=0;$i<$cnt;$i++){
		echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='cnt".$i."' style='width:120px; height:80px;'>CONTAINMENT</div>";
	}
		for ($i=0;$i<$hall;$i++){
		echo "<div onclick=\"window.location.href = 'assign.php?name='+this.id;\" class='drag' id='hall".$i."' style='width:180px; height:20px;'>hall</div>";
	}
  ?>
</div>
<?php
$check = mysql_query("SELECT * FROM building WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
			$nam1 = $info['name'];
			$ex1 = $info['x'];
			$wy1 = $info['y'];
		}
?>
<script>
var nam=deserialiseArray("<?php echo $nam1; ?>");
var i=nam.length;
var ex=deserialiseArray("<?php echo $ex1; ?>");
var wy=deserialiseArray("<?php echo $wy1; ?>");

function deserialiseArray(str) {
    var arr = [],
        items = str.split(","),
        item,
        i;
    for (i=0; i < items.length; i++) {
        item = items[i].split("-");
        arr[item[0]] = item[1];
    }
    return arr;
}

Array.prototype.contains = function(obj) {
    var i = this.length;
    while (i--) {
        if (this[i] == obj) {
            return i;
        }
    }
    return false;
}

for (var e=0;e<i;e++){
	var d = document.getElementById(nam[e]);
	d.style.position = "absolute";
	d.style.left = wy[e]+"px";
	d.style.top = ex[e]+"px";
	d.style.backgroundColor="silver";
	d.style.border="1px solid black";
	d.style.color="black";
}


</script>
<div id='aaa' style="float:right;height:100%;width:35%;padding-right:10px;">

</div>

</div>

<!--<div id='side'>
<?php 
if(isset($_GET["name"])){
$cNam = $_GET["name"];
$get = mysql_query("SELECT * FROM bld2 WHERE name = '$cNam' AND id=$id")or ($rname=''); 
	while($info = mysql_fetch_array( $get )) 	 { 
			$rname = $info['rname'];
			$dsc = $info['dsc'];
	}

} else {
//			echo "Select cell";
$cNam='';
	
}

if($cNam=='s173'){
	echo '<h1> SCP-173 Containment Cell</h1>';
		$img='173';
} else if(substr($cNam,0,4)=='hall'||substr($cNam,1,4)=='hall') {
	$img='hall';
		echo '<h1> Just a boring old hall</h1>';
		} else if(substr($cNam,0,4)=='cell'||(substr($cNam,1,4))=='cell') {
	$img='cell';
		echo '<h1> Empty cell</h1>';
	} else {
		$img='none';
echo '<h1>'.$cNam.'</h1>';
}
		?>-->
	<!--<input type="text" name="rname" id="rname" value="<?php echo $rname; ?>">
		 <textarea rows="4" name="desc" cols="38"> <?php echo $dsc; ?></textarea>-->

</div>
<div id='cam'><?php include 'cam.php' ?> </div><br>
</div>
</body>
</html>