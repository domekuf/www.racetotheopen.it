<?php

$nomecartella='./Doc';

$d = dir($nomecartella);

while (false !== ($entry = $d->read())) {
	if(!(strpos($entry,'.pdf') === false)){
	
	echo '<li><a onclick="fillModalDoc(\'Doc/'.$entry.'\')" data-toggle="modal" data-target="#doc-modal" href="#">'.str_replace('.pdf','',$entry).'</a></li>';
	
	}
}

?>