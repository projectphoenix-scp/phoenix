<?php
$sNam = file_get_contents("names.txt");
$aNam = explode(', ', $sNam);
$xNam=$aNam[rand(1, 1282)];
?>