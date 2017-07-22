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
		//url:"http://localhost/couvre-feu/wp-json/wp/v2/posts?per_page=100&order=asc&filter[meta_key]=article_year&filter[meta_value]=1967",
		url:"http://localhost/couvre-feu/wp-json/wp/v2/posts?_embedded&filter[meta_key]=article_year&filter[orderby]=meta_value&order=asc",
		// params: {
		// 	per_page: 100,
		// 	order: 'asc',
		// 	'filter[meta_key]': 'article_year',
		// 	'filter[orderby]': 'meta_value',
		// },
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

{{-- 'post_type'         => 'post',
'posts_per_page'    => -1,
'meta_key'          => 'article_year',
'orderby'           => 'meta_value',
'order'             => 'ASC' --}}
