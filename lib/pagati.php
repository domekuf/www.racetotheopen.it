<?php

function carica_file($path){
	$p=$path;
	$f=fopen($p,'r');
	$ret=fread($f,filesize($p));
	fclose($f);
	return $ret;
}


$users='[';
$nomecartella='./iscritti';
$nomecartella_2='./pagatipost';
$d = dir($nomecartella);
while (false !== ($entry = $d->read())) {

	if(!(strpos($entry,'.usk') === false)){
		$found = false;
		$d_2 = dir($nomecartella_2);	
		while (false !== ($entry_2 = $d_2->read())) {	
			if(!(strpos($entry_2,'.usk') === false)){
				if(str_replace('ok-','',$entry_2)==$entry){
					$found = true;
//echo '<input type="checkbox" value="'.str_replace('ok-','',$entry_2).'"> <a href="#">'.str_replace('ok-','',$entry_2).'</a></input><br/>';
$jsonUsr = carica_file($nomecartella.'/'.$entry);
$users .= ','.$jsonUsr;
$usr = json_decode($jsonUsr);
if($usr!=null){
	if(strlen($usr->iEmail) > 3){
		$ausrs[$usr->iEmail] = $usr;
		$ausrs[$usr->iEmail]->Pagato = 'Y';
		$ausrs[$usr->iEmail]->idUSK = $entry;
	}
}

				}
			}
		}
		if(false == $d_2->read() && !$found){
//echo '<input checked type="checkbox" value="'.str_replace('ok-','',$entry).'"> <a href="#">'.str_replace('ok-','',$entry).'</a></input><br/>';
$jsonUsr = carica_file($nomecartella.'/'.$entry);
$users .= ','.$jsonUsr;
$usr = json_decode($jsonUsr);
if($usr!=null){
	if(strlen($usr->iEmail) > 3){
		$ausrs[$usr->iEmail] = $usr;
		$ausrs[$usr->iEmail]->idUSK = $entry;
	}
}
//$ausrs[$usr['iEmail']] = $usr;
		}
	}
}

foreach($ausrs as $u){
	//echo '<input '.($u->Pagato=='Y'?'':'checked').' type="checkbox" value="'.$u->iEmail.'"> <a href="#">'.$u->iEmail.'</a></input><br/>';
	echo 
	'<tr> 
		<th scope="row"><input '.($u->Pagato=='Y'?'':'checked').' type="checkbox" name="'.$u->idUSK.'" value="'.$u->iEmail.'"/></th> 
		<td>'.$u->iNome.'</td> 
		<td>'.$u->iCognome.'</td> 
		<td>'.$u->iEmail.'</td> 
		<td>'.$u->idUSK.'</td> 

	</tr> ';
}

$users.=']';
$users = str_replace('[,', '[', $users);

echo '<textarea style="display:none" id="users">'.json_encode($ausrs).'</textarea>';






?>