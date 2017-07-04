@php( $text_arabe = 'أكتوبر في باريس' )
<span id="website-footer">
    <a class="footer-text couvrefeu-text" style="position:fixed; bottom: 120px; left:-57px; font-size:28px; color:black;" href="{{ home_url('/') }}">
			{{ $text_arabe }}
		</a>
</span>

<footer class="content-info navbar fixed-bottom">
    <div class="footer-panel text-center" style="display: none; width: 100%; height: 80px; color:black; padding-top:10px;"></div>
    <div class="container">
        @php(dynamic_sidebar('sidebar-footer'))
    </div>
</footer>
