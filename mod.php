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
<br><br><br>
<?php include 'head.php'; ?>

<body>
 <div id="srt2" style='width:800px;height:600px;'>
 
 											<!-- 		ASSIGN -->
 
 <div class="drop" id='big1'>
  <div id="droppable"><div id='bbgg'></div></div>
  <div class='drag' id='s173' style='width:120px; height:100px;'><br>SCP-173 Containment Cell.</div>
  <?php
  $get = mysql_query("SELECT * FROM bought WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $get )) 	 { 
			$cell = $info['cell'];
			$bcell = $info['bcell'];
			$cnt = $info['cnt'];
			$hall = $info['hall'];
						$lhall = $info['lhall'];
		}
	for ($i=0;$i<$cell;$i++){
		echo "<div class='drag' id='cell".$i."' style='width:40px; height:40px;'>cell</div>";
	}
		for ($i=0;$i<$lhall;$i++){
		echo "<div class='drag' id='lhall".$i."' style='width:20px; height:180px;'>h<br>a<br>l<br>l</div>";
	}
		for ($i=0;$i<$bcell;$i++){
		echo "<div class='drag' id='bcell".$i."' style='width:40px; height:80px;'>cell</div>";
	}
		for ($i=0;$i<$cnt;$i++){
		echo "<div class='drag' id='cnt".$i."' style='width:120px; height:80px;'>CONTAINMENT</div>";
	}
		for ($i=0;$i<$hall;$i++){
		echo "<div class='drag' id='hall".$i."' style='width:180px; height:20px;'>hall</div>";
	}
	
	$check = mysql_query("SELECT * FROM building WHERE id = '$id'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check )) 	 { 
			$nam1 = $info['name'];
			$ex1 = $info['x'];
			$wy1 = $info['y'];
		}
  ?>
</div>
<script>
var nam=deserialiseArray("<?php echo $nam1; ?>");
var i=nam.length;
var ex=deserialiseArray("<?php echo $ex1; ?>");
var wy=deserialiseArray("<?php echo $wy1; ?>");

function serialiseArray(arr) {
    var workingArray = [],
        i;
    for (i=0; i < arr.length; i++)
       if (typeof arr[i] != "undefined")
           workingArray.push(i + "-" + arr[i]);
    return workingArray.join(",");
}

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
//		d.prepend($('#big1'))
	d.style.position = "absolute";
	d.style.left = wy[e]+"px";
	d.style.top = ex[e]+"px";
	d.style.backgroundColor="silver";
	d.style.border="1px solid black";
	d.style.color="black";
	d.style.visibility="visible";
}
$('.drop').droppable({
    tolerance: 'fit'
});

$('.drag').draggable({
    revert: 'invalid',
        grid: [ 5,5 ],
    stop: function(){
        $(this).draggable('option','revert','invalid');
    }
});

$('.drag').droppable({
    greedy: true,
    tolerance: 'touch',
    
    drop: function(event,ui){
        ui.draggable.draggable('option','revert',true);

    }
    
    
});
$('#droppable').droppable({
  drop: function(event, ui) {
    var pos = ui.draggable.position();
    //CHANGE COLOR WHEN PLACED
//    ui.draggable.detach();
    ui.draggable.css('background-color', 'silver');
    ui.draggable.css('border', '1px solid black');
    ui.draggable.css('color', 'black');
    if(nam.contains(ui.draggable.attr("id"))!=false){
    	var x=nam.contains(ui.draggable.attr("id"));
    	nam[x]=ui.draggable.attr("id");
    	ex[x]=pos.top;
    	wy[x]=pos.left;
    	i=i-1
    } else {
    nam[i]=ui.draggable.attr("id");
    ex[i]=pos.top;
    wy[i]=pos.left;
    }
    var tb='';
    

//UPDATE TEXT BOXES
var on = document.getElementById("nam");
on.value = serialiseArray(nam);
var tw = document.getElementById("ex");
tw.value = serialiseArray(ex);
var th = document.getElementById("wy");
th.value = serialiseArray(wy);
var id = document.getElementById("idd");
id.value = "<?php echo $id; ?>";
         i = i+1;
  }
  
});

</script>
<br><br>
</div>
 
 											 <!-- 		/ASSIGN -->
  
 </div>
<ul id="sortable">
 <!-- <li class="ui-state-default" style='width:800px;height:600px;'>1</li>-->
  <li class="ui-state-default" style='width:480px;height:300px;'><form action="set.php" name='set' id='set' method="post">
<input type="submit" value="update">
<input type="submit" onclick="document.getElementById('wy').value = '';document.getElementById('ex').value = '';document.getElementById('nam').value = '';" value="Clear"><br>
<input type="hidden" name="nam" id="nam">
<br><input type="hidden" name="ex" id="ex">
<input type="hidden" name="wy" id="wy">
<input type="hidden" name="idd" id="idd">
</form>
		<div class='drag' onclick="window.location.href = 'set3.php?buy=1'; " id='cellx' style='width:40px; height:40px;'>cell<br>$100</div><br>
		<div class='drag' onclick="window.location.href = 'set3.php?buy=2'; " id='bcellx' style='width:40px; height:80px;'>cell<br>$200</div><br>
		<div class='drag' onclick="window.location.href = 'set3.php?buy=3'; " id='cntx' style='width:120px; height:80px;'><br>CONTAINMENT<br>$400</div><br>
		<div class='drag' onclick="window.location.href = 'set3.php?buy=4'; " id='hallx' style='width:180px; height:20px;	'>hall - $50</div>
		<button onclick="window.location.href = 'set3.php?buy=5'; ">l-hall</button>


<!--<form action="set2.php" name='set2' id='set2' method="post">
cell<input type="text" name="cell" id="cell" value="<?php echo $cell; ?>"><button onclick="document.getElementById('cell').value=parseInt(document.getElementById('cell').value)+1;">+</button><br>
<input type="hidden" name="idd2" id="idd2" value="<?php echo $id; ?>">
bcell<input type="text" name="bcell" id="bcell" value="<?php echo $bcell; ?>"><button onclick="document.getElementById('bcell').value=parseInt(document.getElementById('bcell').value)+1;">+</button><br>
cnt<input type="text" name="cnt" id="cnt" value="<?php echo $cnt; ?>"><button onclick="document.getElementById('cnt').value=parseInt(document.getElementById('cnt').value)+1;">+</button><br>
hall<input type="text" name="hall" id="hall" value="<?php echo $hall; ?>"><button onclick="document.getElementById('hall').value=parseInt(document.getElementById('hall').value)+1;">+</button><br>
lhall<input type="text" name="lhall" id="lhall" value="<?php echo $lhall; ?>"><button onclick="document.getElementById('lhall').value=parseInt(document.getElementById('lhall').value)+1;">+</button><br>

<input type="submit" value="update">
</forum>
<input type="hidden" name="nam" id="nam">
<br><input type="hidden" name="ex" id="ex">
<input type="hidden" name="wy" id="wy">
<input type="hidden" name="idd" id="idd">-->

</div>
</li>
  <li class="ui-state-default" style='width:480px;height:292px;'>3</li>
</ul>
 
 
</body>
</html>