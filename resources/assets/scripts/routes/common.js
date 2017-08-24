import 'sticky-kit/dist/sticky-kit.js';

//import browsers from './components/browsers';

export default {
	init() {
		// JavaScript to be fired on all pages
		//jQuery(".sticky-kit").stick_in_parent();

		//https://www.w3schools.com/howto/howto_css_modals.asp
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("title-top");
		var btnbm = document.getElementById("title-bottom");
		var btnMobileFrancais = document.getElementById("footer-title-fr");
		var btnMobileArabe = document.getElementById("footer-title-ar");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("modal-close")[0];

		// When the user clicks on the button, open the modal
		btn.onclick = function() {
			modal.style.display = "block";
		}

		btnbm.onclick = function() {
			modal.style.display = "block";
		}

		btnMobileFrancais.onclick = function(){
			modal.style.display = "block";
		}

		btnMobileArabe.onclick = function(){
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

		// Internet Explorer 6-11
		var isIE = /*@cc_on!@*/false || !!document.documentMode;

		// Edge 20+
		var isEdge = !isIE && !!window.StyleMedia;
		// // Chrome 1+
		//var isChrome = !!window.chrome && !!window.chrome.webstore;

		if (isIE || isEdge ) {
			$('#ie-message').show();
		}

	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
