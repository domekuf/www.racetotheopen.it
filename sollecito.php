<?php
include('mail.php');
foreach($_POST as $usr => $k){
	$nome_sito ='//www.racetotheopen.it/pay.php?id_utente='.str_replace('_', '.', $usr);
	$testo='
<img src="http://www.racetotheopen.it/img/banner.jpg" width=100% style ="width:100%"/><br/> 
Ciao, ti ricordiamo che l\'iscrizione al Race to the Italian Open &eacute; completa solo quando effettuerai il pagamento.
Per pagare subito con PayPal utilizza il seguente link:
link'.$nome_sito.'
<br/>Qualora tu abbia già effettuato il pagamento 
dovresti aver ricevuto una mail di conferma.<br/>';

$ret=sendMail('info@uskidsgolfitaly.it'
	,'Promemoria iscrizione Race to the Italian Open '
	,$k
	,$testo);

$ret=sendMail('info@uskidsgolfitaly.it'
	,'Promemoria iscrizione Race to the Italian Open '
	,'spammamme@gmail.com'
	,$testo);

	echo 'Mail mandata a: '.$k.'<br/>';

}
?>