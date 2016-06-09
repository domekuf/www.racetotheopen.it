<?php
$mail_cliente ='info@uskidsgolfitaly.it';

$io ='dome.diiorio@icloud.com';//filvianelli@gmail.com
$filo = 'filvianelli@gmail.com';
$nome_sito ='www.racetotheopen.it/pay.php';
function file_list($d,$x){ 
       foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f; 
       return $l; 
} 

$lista_utenti = file_list('pagati/', ".usk");

$i=0;

foreach($lista_utenti as $u){
	$i++;

}

if($i<124){//massimo numero di iscritti

$id_utente=$_GET['id_utente'];
//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Production PayPal API URL https://api-3t.sandbox.paypal.com/nvp
//$paypal_url = 'https://api-3t.sandbox.paypal.com/nvp'; //Production PayPal API URL https://api-3t.sandbox.paypal.com/nvp
$paypal_id = 'domenicodiiorio6-facilitator@hotmail.it'; //Business Email
$paypal_id = 'info@uskidsgolfitaly.it'; //Business Email


?>


<form  action="<?php echo $paypal_url; ?>" method="post">
	
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
        <input type='hidden' name='return' value='http://www.racetotheopen.it/pay/ok.php?item_name=<?php echo $id_utente; ?>'>
        <input type='hidden' name='notify_url' value='http://www.racetotheopen.it/pay/ok.php'>
        <!-- Display the payment button. -->
        <hr>
        <h2>Paga Subito con PayPal</h2>
        <!-- 
<input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/it_IT/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" >
 -->
    
        <button class="btn btn-danger" type="submit">Vai Al Pagamento!</button>
    
</form>
<?php
}else{
	echo('<h1>Le Iscrizioni Online sono chiuse: </h1><h2>contattare: '.$mail_cliente.'</h2>');
}
?>
