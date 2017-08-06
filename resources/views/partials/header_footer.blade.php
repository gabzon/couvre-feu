@php($style = 'position:fixed; z-index:3; line-height:28px;')
@php( $text_arabe = 'أكتوبر في باريس' )

<a href="#" class="side-text" id="title-top" style="{{$style}} left: -53px; top:110px;">
	{{ get_bloginfo('name', 'display') }}
</a>

<a href="#" class="side-text" id="title-bottom" style="{{$style}} left:-42px; bottom:100px;">{{ $text_arabe }}</a>
