<?php

$source = "jiKnp4bqpmA";
$target = "Ian Leckey!";


function fitness($source, $target) {
	
	$fitval = 0;
	foreach  (range(0, strlen($source)) as $i ) {
		$fitval .= pow(ord($target[$i]) - ord($source[$i]),2);
	}

	return $fitval;

}


function mutate($source) {
	
	$charpos = rand(0, strlen($source) - 1);
	
	$parts = str_split($source);
	
	$parts[$charpos] = chr(ord($parts[$charpos]) + rand(-1,1));
	return '' . join($parts);
}


$fitval = fitness($source, $target);
$i=0;
while(true) {
	$i++;
	$m = mutate($source);
	$fitval_m = fitness($m, $target);
	if( $fitval_m < $fitval) {
		$fitval = $fitval_m;
		$source = $m;
		echo "<br />" . $i . "- ".$m . "<br />";
		if($fitval == 0){
			break;
		}
	}
}


?>