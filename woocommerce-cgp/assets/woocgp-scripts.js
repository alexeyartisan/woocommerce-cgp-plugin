var mouseX = 0;
var mouseY = 0;
var popupCounter = 0;

function setCookie(name, value) {
    var expires = "";
	var date = new Date();
	var midnight = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 23, 59, 59);
	expires = "; expires=" + midnight.toGMTString();

    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

jQuery(function($){
	
	$(document).ready(function() {

		if ( $('input#discount_type').val() == 'returning_discount' && !getCookie('woocgp_alert_shown')) {
			setCookie('woocgp_alert_shown', 1);
			$('#woocgp-alert').fadeIn(200);
		}

		$('#woocgp-alert-close').click(function() {
			$('#woocgp-alert').fadeOut(200);
		});

		document.addEventListener("mousemove", function(e) {
		    mouseX = e.clientX;
		    mouseY = e.clientY;
		    document.getElementById("coordinates").innerHTML = "<br />X: " + e.clientX + "px<br />Y: " + e.clientY + "px";
		});

		$(document).mouseleave(function () {
		    if (mouseY < 100) {
		        if (popupCounter < 1) {
		        	if ( $('input#discount_type').val() == 'leaving_discount' ) {
		        		$('#woocgp-alert').fadeIn(200);
		        	}
		            
		        }
		        popupCounter ++;
		    }
		});

	});

});