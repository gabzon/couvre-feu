<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
{{--
-- https://stackoverflow.com/questions/28411499/html-css-disable-scrolling-on-body
-- the scroll="no" removes the scrollbar on Internet Explorer
--}}
<body @php(body_class()) scroll="no">
	@php(do_action('get_header'))
	@include('partials.header')
	@include('partials.header_footer')
	<div class="wrap" role="document">
		<div class="content">
			<main class="main">
				@yield('content')
			</main>
		</div>
	</div>

	@php(do_action('get_footer'))
	@include('partials.footer')
	@php(wp_footer())

	{{-- https://stackoverflow.com/questions/14544816/detect-internet-explorer-and-display-a-message --}}
	<script type="text/javascript">
	if ($.browser.msie) {
		alert('Ce site n\'est pas compatible avec Internet Explorer, veuillez utiliser Chrome');
	}
	</script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
</body>
</html>
