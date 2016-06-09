<?php
$io = 'domenicodiiorio6@hotmail.it';
include('mail.php');


$ret=sendMail($io
	,'Mail test'.$id_utente
	,$io
	,'Ricevi questa mail a conferma dell\'iscrizione a Race to the Open, se non l\'hai
	ancora fasdasdasatto, clicca qui per pagare e completare l\'iscrizione: '.$nome_sito);
	
echo("Risultato : $ret")
?>