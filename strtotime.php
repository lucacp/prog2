<?php 
$test = date('Y-m-d');
echo $test;
$dat = new DateTime(date('Y-m-d'));
for ($i=0; $i < 120; $i++) {
	$dat->modify('+1day');
	echo "<br />".$dat->format('Y-m-d').' :'.$dat->format('w').' test: '.floor((strtotime($dat->format('Y-m-d'))-strtotime($test))/(128*27*25));
}
 ?>