<?php
function santasend(){
	$namelist=explode(",", $_GET['namelist']);
	$emaillist=explode(",", $_GET['emaillist']);
	$nameemail=array();
	foreach($namelist as $idx=>$name){
		$nameemail[$name]=$emaillist[$idx];
	}	

	$matches=array();

	shuffle($namelist);
	$matches[$namelist[count($namelist)-1]]=array("name"=>$namelist[0], "email"=>$nameemail[$namelist[0]]);
	for($i=0; $i<count($namelist)-1;$i++){
		$matches[$namelist[$i]]=array("target"=>$namelist[$i+1], "email"=>$nameemail[$namelist[$i]]);
	}

	foreach($matches as $name=>$targetobj){
		$targetname=$targetobj['target'];
		$subject="Your Gift Target - Secret Santa Buddy!";
		$body="Hi $name, you're going to be gifting $targetname! Enjoy your christmas!!!";
	}
}
?>