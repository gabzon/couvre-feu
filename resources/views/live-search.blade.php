{{--
Template Name: Live Search
--}}

@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
		{{-- @include('partials.page-header') --}}
		@include('partials.content-page')
		<div class="searchbox mt-5 pt-5" >
			<input type="search" name="search" id="search" placeholder="enter any value">
		</div>
		<div class="output mt-5"></div>


	@endwhile

	<script type="text/javascript">
		console.log('Hello Console');
		jQuery.ajax({
			url:"http://localhost/couvre-feu/wp-json/wp/v2/posts",
			success: function ( posts ){
				var output 	= '<ul class="search-results">';
				jQuery.each(posts,function( key, val){
					output = output + '<li>' + val.title.rendered + '</li>';
				});
				var output = output + '</ul>';
				jQuery('.output').html(output)
			}
		});
	</script>
@endsection
