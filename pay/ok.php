

<?php
echo(serialize($_GET));
echo(serialize($_POST));

include('../mail.php');

$mail_cliente ='info@uskidsgolfitaly.it';
$postmaster = 'postmaster@racetotheopen.it';

$pagante = $_POST['payer_email'];

$pagante_get = $_GET['payer_email'];

$io ='dome.diiorio@icloud.com';
$filo = 'filvianelli@gmail.com';

//Store transaction information from PayPal
$item_number = $_GET['item_number']; 
$item_number_2 = $_POST['item_number']; 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$payment_gross = $_POST['mc_gross'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];
$productPrice=50;

//$myfile = fopen("../iscritti/".$item_number, "r") or die("Unable to open file!");
//$jstr = fread($myfile,filesize("../iscritti/".$item_number));
//fclose($myfile);
//$jobj = json_decode($jstr);
//echo($jstr);
////$jobj['Pagato']='Y';
//
//echo(json_encode($jobj));
$id_utente=$item_number;


$newfile = fopen('../pagati/ok-'.$id_utente, "a");//r+ era a
fwrite($newfile, 'OK', 1024);
fclose($newfile);

$id_utente=$item_number_2;


$newfile_2 = fopen('../pagatipost/ok-'.$id_utente, "a");//r+ era a
fwrite($newfile_2, 'OK', 1024);
fclose($newfile_2);

$ret=sendMail($io
	,'Registrazione ID: '.$item_number
	,$io
	,'Notifica immediata: '.$myfile.'---POST---'.serialize($_POST).'---GET----'.serialize($_GET));

if(!(int) $payment_gross < $productPrice){
    //Insert tansaction data into the database

$testo='<span style="color:red" >Grazie per esserti iscritto</span>.<br/>
La tua registrazione è ora completa, GET READY FOR THE TEE OFF!!<br/> 
"Race to the Italian Open” : Totale pagato €50. Totale dovuto €0,00';
$ret=sendMail($postmaster,'Pagamento effettuato',$pagante_get,$testo);
$ret=sendMail($postmaster,'Pagamento effettuato -',$pagante,$testo);

// $ret=sendMail($io
// 	,'Registrazione ID: '.$item_number
// 	,$io
// 	,'Ricevi questa mail a conferma del pagamento effettuato. ID: '.$txn_id);
// 
// $ret=sendMail($io
// 	,'Nuova Registrazione ID: '.$id_utente
// 	,$io
// 	,'Nuova Iscrizione ricevuta: <br/>'.
// 	'<br/>ID: '.$id_utente.
// 	'<br/>Nome: '.$_POST['iNome'].
// 	'<br/>Cognome: '.$_POST['iCognome'].
// 	'<br/>Cellulare: '.$_POST['iCellulare'].
// 	'<br/>Data di Nascita: '.$_POST['iDataNascita'].
// 	'<br/>Email: '.$_POST['iEmail']);

}else{


}

?>

