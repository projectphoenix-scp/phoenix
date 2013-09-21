<link rel="stylesheet" type="text/css" href="cam.css"/>
<?php
// $img='hall'; 
 list($width, $height, $type, $attr) = getimagesize("pics/".$img.".jpg"); 
 if($width>='450'){
 	$width=$width/2;
 	$height=$height/2;
 }
 ?>
<!--<img style='position:absolute;top:8px;' id='asd' src='pics/<?php echo $img; ?>.jpg' />-->
<div><div id='cam2' style='position:relative;top:26px;z-index:100;'>Live feed of <?php echo $img; ?>[REDACTED]</div><div id='time' style='position:relative;top:0px;left:<?php echo $width-70; ?>px;z-index:100;'>00:00x</div><canvas ></canvas></div>
<script>
var context = document.querySelector('canvas').getContext('2d');
context.canvas.width = <?php echo $width; ?>;
context.canvas.height = <?php echo $height; ?>;
var imageData = context.createImageData(context.canvas.width, context.canvas.height);
var imageObj = new Image();

      imageObj.onload = function() {
        
        (function loop() {
    
    for (var i = 0, n = imageData.data.length; i < n; i++)
        imageData.data[i] = Math.floor(Math.random() * 150);
    
    context.putImageData(imageData, 0, 0);
    context.globalAlpha = 0.6;
        context.drawImage(imageObj, 0, 0);
    webkitRequestAnimationFrame(loop);
})();
      };
      imageObj.src = 'pics/<?php echo $img;?>.jpg';
</script>
<script>
function startTime()
{
var today=new Date();
var y=today.getUTCFullYear();
var m=today.getUTCDate();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('time').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>