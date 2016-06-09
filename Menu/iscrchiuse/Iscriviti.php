<div class="row">
	<h1>
		Iscriviti
	</h1>
	<hr>
	<form method="POST" id="reg-form" class="ajaxForm" data-toggle="validator" action="/submit.php" data-callback="functest" data-output="siteContainer">
	<div class="form-group row has-feedback">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<input type="text" name="iNome" class="form-control input-lg" id="iNome" placeholder="Nome del Giocatore" required>
		</div>
	</div>
	<div class="form-group row has-feedback">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<input type="text" name="iCognome" class="form-control input-lg" id="iCognome" placeholder="Cognome del Giocatore" required>
		</div>
	</div>
	<div class="form-group has-feedback row">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<input type="text" name="iDataNascita" class="form-control input-lg datepicker" id="iDataNascita" placeholder="Data Nascita Giocatore">
			<input type="hidden" name="iDataNascitaTrue" id="iDataNascitaTrue"/>
			<input type="hidden" name="Pagato" value="N" id="Pagato"/>
		</div>
	</div>
	<div class="form-group row has-feedback">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<input type="email" name="iEmail" class="form-control input-lg" id="iEmail" placeholder="Email del Genitore" required>
		</div>
	</div>
	<div class="form-group row has-feedback">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<input type="tel" name="iCellulare" class="form-control input-lg" id="iCellulare" placeholder="Cellulare del Genitore" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-danger">
				Invia i dati
			</button>
		</div>
	</div>
	</form>
	<h3 id="err" class="text-center">
		
	</h3>
</div>
<script>
function functest(id,msg){
	$('#'+id).html(msg);
}
$('#reg-form').validator();
$(document).ready(function() {
		$('.datepicker').datepicker({
			format: "dd/mm/yyyy",
			language: "it"
		}).on('changeDate', function(e){
			$('#iDataNascitaTrue').val(e.format('yyyymmdd'))
		});
});
</script>
<script src="js/uk/ajaxForm.js"></script>