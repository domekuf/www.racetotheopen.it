function sendAjaxForm(id_form, id_output, callback){

var form=$('form#'+id_form)[0];
//var form_toserialize=$('form#'+id_form);
var formData = new FormData(form);
//console.log(form_toserialize.serialize())
cfUrl=$('form#'+id_form).attr('action');
$.ajax({
		type: "POST",
		url: cfUrl,
		//data: form.serialize(),
		data: formData,
		//dataType: "html",
		success: function(msg)
		{
			//var xml = msg,
			//xmlDoc = $.parseXML( xml ),
			//$xml = $( xmlDoc ),
			//$string = $xml.find( "string" );
			//$('#'+id_output).val(msg);
			//$('#'+id_output).text(msg);
			callback(id_output,msg);
		},
		error: function()
		{
			alert("Chiamata fallita, si prega di riprovare...");
		},
		cache: false,
		contentType: false,
		processData: false
    });
}
function sendAjaxFormGet(id_form, id_output, callback){

var form=$('form#'+id_form)[0];
console.log(form);
var formData = new FormData(form);
console.log(formData);
cfUrl=$('form#'+id_form).attr('action');
console.log(cfUrl);
$.ajax({
		type: "POST",
		url: cfUrl,
		data: formData,
		success: function(msg)
		{
			//var xml = msg,
			//xmlDoc = $.parseXML( xml ),
			//$xml = $( xmlDoc ),
			//$string = $xml.find( "string" );
			//$('#'+id_output).val(msg);
			//$('#'+id_output).text(msg);
			callback(id_output,msg);
		},
		error: function()
		{
			alert("Chiamata fallita, si prega di riprovare...");
		},
		cache: false,
		contentType: false,
		processData: false
    });
}
$(document).ready(function() {
	$('.ajaxForm').on('submit',function(event){
		event.preventDefault();
		//window[$(this).data('callback')]('asd','asd');
		sendAjaxForm($(this).attr('id'),$(this).data('output'),window[$(this).data('callback')]);
	})
});