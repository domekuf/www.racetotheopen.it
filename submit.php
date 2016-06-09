<?php
$mail_cliente ='info@uskidsgolfitaly.it';
$postmaster = 'postmaster@racetotheopen.it';
$io ='dome.diiorio@icloud.com';//filvianelli@gmail.com
$filo = 'filvianelli@gmail.com';
function file_list($d,$x){ 
       foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f; 
       return $l; 
} 

$lista_utenti = file_list('iscritti/', ".usk");

$i=0;

foreach($lista_utenti as $u){
	$i++;

}

if($i<124){//massimo numero di iscritti

$id_utente='uskids'.$i.'.usk';
$nome_sito ='//www.racetotheopen.it/pay.php?id_utente='.$id_utente;

$utente = json_encode($_POST);

$newfile = fopen('iscritti/'.$id_utente, "a");//r+ era a
fwrite($newfile, $utente, 1024);
fclose($newfile);
//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Production PayPal API URL https://api-3t.sandbox.paypal.com/nvp
//$paypal_url = 'https://api-3t.sandbox.paypal.com/nvp'; //Production PayPal API URL https://api-3t.sandbox.paypal.com/nvp
$paypal_id = 'domenicodiiorio6-facilitator@hotmail.it'; //Business Email
$paypal_id = 'info@uskidsgolfitaly.it'; //Business Email
echo('<h1>Registrazione Effettuata </h1><h2>ID: '.$id_utente.'</h2>');

?>

<?php
include('mail.php');

$testo='
<img src="http://www.racetotheopen.it/img/banner.jpg" width=100% style ="width:100%"/><br/> 
Congratulazioni la tua richiesta di iscrizione al Race to the Italian Open &egrave;
stata ricevuta, per completarla effettua il pagamento cliccando il seguente 
link'.$nome_sito.'
<br/>Qualora tu abbia già effettuato il pagamento 
dovresti aver ricevuto una mail di conferma.<br/>';

$ret=sendMail($mail_cliente
	,'Nuova Registrazione ID: '.$id_utente
	,$mail_cliente
	,'Nuova Iscrizione ricevuta: <br/>'.
	'<br/>ID: '.$id_utente.
	'<br/>Nome: '.$_POST['iNome'].
	'<br/>Cognome: '.$_POST['iCognome'].
	'<br/>Cellulare: '.$_POST['iCellulare'].
	'<br/>Data di Nascita: '.$_POST['iDataNascita'].
	'<br/>Email: '.$_POST['iEmail']);

$ret=sendMail($postmaster
	,'Registrazione race to the open id: '.$id_utente
	,$_POST['iEmail']
	,$testo.
	'<br/>ID: '.$id_utente.
	'<br/>Nome: '.$_POST['iNome'].
	'<br/>Cognome: '.$_POST['iCognome'].
	'<br/>Cellulare: '.$_POST['iCellulare'].
	'<br/>Data di Nascita: '.$_POST['iDataNascita'].
	'<br/>Email: '.$_POST['iEmail'].' <br/>Se non l\'hai
	ancora fatto, clicca qui per pagare e completare l\'iscrizione: '.$nome_sito);

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

// $ret=sendMail($filo
// 	,'Nuova Registrazione ID: '.$id_utente
// 	,$filo
// 	,'Nuova Iscrizione ricevuta: <br/>'.
// 	'<br/>ID: '.$id_utente.
// 	'<br/>Nome: '.$_POST['iNome'].
// 	'<br/>Cognome: '.$_POST['iCognome'].
// 	'<br/>Cellulare: '.$_POST['iCellulare'].
// 	'<br/>Data di Nascita: '.$_POST['iDataNascita'].
// 	'<br/>Email: '.$_POST['iEmail']);


	
echo('<h3> Controlla la tua mail : '.$_POST['iEmail'].'</h3>');
echo("<span> Verifica anche nella posta indesiderata, o utilizza questo link per pagare in un secondo momento:<br/>
<a href='$nome_sito'>$nome_sito</a><br/>
Ti ricordiamo che l'iscrizione non é completa fino al momento del pagamento.
 </span>");
?>

<form action="<?php echo $paypal_url; ?>" method="post">
	
		<input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
		<input type="hidden" name="user" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $id_utente; ?>">
        <input type="hidden" name="item_number" value="<?php echo $id_utente ?>">
        <input type="hidden" name="amount" value="50">
        <input type="hidden" name="currency_code" value="EUR">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://www.racetotheopen.it/pay/ko.php'>
        <input type='hidden' name='return' value='http://www.racetotheopen.it'>
        <input type='hidden' name='notify_url' value='http://www.racetotheopen.it/pay/ok.php'>
        <!-- Display the payment button. -->
        <hr>
        <h2>Paga Subito con PayPal</h2>
        <!-- 
<input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/it_IT/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" >
 -->
    
        <button class="btn btn-danger" type="submit"><i class="fa fa-4x fa-paypal"></i></button>
    
</form>

<?php
}else{
	echo('<h1>Le Iscrizioni Online sono chiuse: </h1><h2>contattare: '.$mail_cliente.'</h2>');
}
?>
