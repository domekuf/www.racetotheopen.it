<?php
$nomecartella='./Menu';
$d = dir($nomecartella);
while (false !== ($entry = $d->read())) {
	if(!(strpos($entry,'.php') === false)){
	echo '<li><a class="red ajaxMenu" meth="GET" dest="siteContainer" href="/Menu/'.$entry.'">'.str_replace('.php','',$entry).'</a></li>';
	}
}
?>