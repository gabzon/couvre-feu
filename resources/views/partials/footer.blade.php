<footer class="content-info navbar fixed-bottom">
	<div class="footer-panel text-center" style="display: none; width: 85%; height: 80px; color:black; padding-top:10px; margin: auto;"></div>
	<div class="container">
		@php(dynamic_sidebar('sidebar-footer'))
	</div>
</footer>

@php( $text_arabe = 'أكتوبر في باريس' )
<footer class="content-info navbar fixed-bottom footer-mobile">
	<div class="left-side">
		<a href="#" class="footer-text" id="footer-title-fr">{{ get_bloginfo('name', 'display') }}</a>
	</div>
	<div class="right-side">
		<a href="#" class="footer-text" id="footer-title-ar">{{ $text_arabe }}</a>
	</div>
</footer>
