function ajax_setup(){

$("a.ajaxMenu").click(
    function(event) {
        event.preventDefault();
		meth=$(this).attr('meth');
		container=$(this).attr('dest');
		document.getElementById(container).innerHTML = '<div class="row" style="text-align:center"><h2><img src="/img/palla.svg" class="fa-spin"/></h2></div>';
        href=($(this).attr('href'));
        $.ajax({
        xhr: function() {
        	var xhr = new window.XMLHttpRequest();
        	xhr.upload.addEventListener("progress", function(evt) {
            	if (evt.lengthComputable) {
                	var percentComplete = evt.loaded / evt.total;
        			console.log(percentComplete);
            	    //Do something with upload progress here
        	    }
		       }, false);
       		xhr.addEventListener("progress", function(evt) {
           		if (evt.lengthComputable) {
               		var percentComplete = evt.loaded / evt.total;
        			console.log(percentComplete);
               		//Do something with download progress
           		}
       		}, false);
       		return xhr;
    	},
		type: meth,
		url: href,
		data: '',//form.serialize(),//"Nome=Domenico&Cognome=Di+Iorio&DataNascita=26%2F04%2F1991&ComuneNascita=Castel+San+Giovanni&Sesso=M",
		dataType: "html",
		success: function(msg)
		{
			$('#'+container).html(msg);
		},
		error: function(msg)
		{
			console.log(msg);
			$('#'+container).html('<div class="row" style="text-align:center"><h2><i class="fa fa-frown-o fa-spin"></i> Oops!</h2><p> Qualcosa é andato storto e si chiama: '+msg.status+'! Ti dice qualcosa? </p></div>');
		}
		});
	});
}

$(document).ready(function() { 
	ajax_setup();
});