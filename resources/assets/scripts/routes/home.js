import 'sticky-kit/dist/sticky-kit.js';
export default {
	init() {
		$('.1900 .sticky-top').css('display','none');
		//$('.1900 .cf-article').css('vertical-align','top');

		$('.know-more.francais').click(function(){
			$('.know-more.francais').css('display','none');
		});

		$('.know-more.anglais').click(function(){
			$('.know-more.anglais').css('display','none');
		});

		$('.know-more.arabe').click(function(){
			$('.know-more.arabe').css('display','none');
		});
		//document.getElementById("myTd").style.verticalAlign = "bottom";
		//document.getElementsByClassName(nom)

	},
	finalize() {
		// JavaScript to be fired on the home page, after the init JS
	},
};
