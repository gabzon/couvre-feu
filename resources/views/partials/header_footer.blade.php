<span id="website-title">
	<a class="text-header couvrefeu-text" href="{{ home_url('/') }}" style="transform:rotate(90deg); position:fixed; top:100px; left:-72px;">
		{{ get_bloginfo('name', 'display') }}
	</a>
</span>

@php( $text_arabe = 'أكتوبر في باريس' )
<span id="website-footer">
    <a class="footer-text couvrefeu-text" style="position:fixed; bottom: 120px; left:-57px; font-size:28px; color:black;" href="{{ home_url('/') }}">
			{{ $text_arabe }}
		</a>
</span>
