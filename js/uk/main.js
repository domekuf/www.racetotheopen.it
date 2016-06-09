/* DOCUMENT READY */
$(document).ready(function() {
		startFX();
});

function startFX(){
	$('.uk-fadeIn').fadeIn(5000, function(){
		
	});
}

function fillModalDoc(input){
	$('#pdf_modal_body').hide();
		$('#scheda_obj').attr('data', input);
		$('#scheda_embed').attr('src', input);
		$('#pdf_download').attr('href', input);
	$('#pdf_modal_loader').fadeIn(400,function(){
		$('#pdf_modal_loader').fadeOut(400);
	});
	$('#pdf_modal_body').fadeIn(400);
}