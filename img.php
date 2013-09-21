<?php
// $img='hall'; 
//$img='hall';
 list($width, $height, $type, $attr) = getimagesize("pics/".$img.".jpg"); 
 ?>
<img src='pics/<?php echo $img ?>.jpg' /><!--<img src='pics/<?php echo $img ?>.jpg' /><div id='static' style='opacity:0.1;overflow:hidden;position:relative;bottom:<?php echo $height; ?>;width:<?php echo $width; ?>;height:<?php echo $height; ?>;'><img src='pics/static.png' /></div>-->