<?php
function losowanie($od,$do,$ile){
	$tab_los=array();
	$numbers = range($od, $do);
	srand((float)microtime() * 1000000);
	shuffle($numbers);
	$i=0;
	foreach ($numbers as $number) {
		$tab_los[]=$number;
		if($i==$ile-1) break;
			$i++;
	}
	return $tab_los;
}
?>