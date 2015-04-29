


<?php
	$qoute_file = fopen("resources/qoutes.txt", "r");
	$qoutes =Array(0);
	#echo "<!----\n";				#debugging
	while(!feof($qoute_file)){
		$qoutes[]= fgets($qoute_file);	
				
	}
	if(gettype($qoutes[0]) !== "string"){
		$i = count($qoutes)-1;
		$qoutes[0] = $qoutes[$i];
		unset($qoutes[$i]);
	}
	#var_dump($qoutes);				#debugging
	#echo "----->";					#debugging
?>