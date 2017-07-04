<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')

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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
</body>
</html>
