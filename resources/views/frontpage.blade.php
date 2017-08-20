{{--
Template Name: Front page
--}}

@extends('layouts.couvrefeu')
@section('content')
	@while(have_posts()) @php(the_post())
		@include('partials.content-page')
	@endwhile
	@php
	$args = [
		'post_type'         => 'post',
		'posts_per_page'    => -1,
		'meta_key'          => 'article_year',
		'orderby'           => 'meta_value',
		'order'             => 'ASC'
	];
	$query = new WP_Query( $args );
	$current_year = '0';
	$year_block_state = 'start';
	$current_year_color = '';
	$cpt = 0;
	@endphp

	@if ( $query->have_posts() )
		<div class="mt-5 articles">
			@while ($query->have_posts())
				@php( $query->the_post() )
				@php( $year = get_post_meta(get_the_ID(),'article_year', true ) )

				@if ( $current_year < $year )
					{{-- display:flex; flex-wrap:wrap; align-items: center; --}}
					@if ($year_block_state === 'start')
						<div class="year-block mt-4 {{$year}}" style="display:block;">
							@include( 'partials.sticky_year' )
							@include('partials.article')
							@php( $year_block_state = 'inside' )
						@else
						</div>
						<div class="year-block mt-4 {{$year}}" style="display:block;">
							@include( 'partials.sticky_year' )
							@include('partials.article')
						@endif
						@php( $current_year = $year )
					@elseif ($current_year === $year)
						@include('partials.article')
					@endif
					@php(++$cpt)
				@endwhile
			</div>
			<div id="noResultId" style="position:relative; font-size:1.75rem; font-family:SuisseIntl;">
				{{-- transform: rotate(90deg); --}}
				<div class="bg-info" style="display:block;">
					<div style="position: fixed; transform: rotate(90deg); transform-origin:right top; top:34%; right:10px;">Aucun document</div>
					<div style="position: fixed; transform: rotate(90deg); transform-origin:right top; top:75%; right:10px;">No documents found</div>
					<div style="position: fixed; transform: rotate(90deg); transform-origin:right top; bottom:-30px ;right:10px;">لا توجد وثائق</div>
				</div>
			</div>
			@php(wp_reset_postdata())
		@else

		@endif

		<!-- The Modal -->
		<div id="myModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content" style="color:white">
				<span class="modal-close">
					<img src="@asset('images/croix.svg')" width="35">
				</span>
				@include('partials.events')
			</div>
		</div>

		<script type="text/javascript">
		// http://mobifreaks.com/coding/html5-data-attributes-search-using-jquery
		jQuery(document).ready(function() {
			$('#noResultId').hide();
			//$('input#search-input:focus').css('background-image','none');

			$('#search-input').on( "keyup", function() {
				var arabic = /[\u0600-\u06FF]/;
				// get the value from text field
				var input = $(this).val().trim().toLowerCase();

				if (arabic.test(input)) {
					$('#search-input').css('text-align','center');
				}else {
					$('#search-input').css('text-align','center');
				}

				// check wheather the matching element exists
				// by default every list element will be shown
				$(".articles div.cf-article").show();
				// Non related element will be hidden after input
				//$(".articles div.cf-article").not("[data-label*="+ input.toLowerCase() +"]").hide();
				$(".articles div.cf-article").not("[data-label*=\""+ input +"\"]").hide();

				//hide years without visible articles
				$('.year-block').show();
				input && $('.year-block:not(:has(.cf-article:visible))').hide();

				var resultat = $('.year-block:visible').length;
				if (resultat == 0) {
					$('#noResultId').show();
				}else {
					$('#noResultId').hide();
				}
				// For Search Variable, total number of lists and number of matched elements

				var matched = $(".articles div.cf-article[data-label*=\""+ input +"\"]").length;

				const websiteUrl = window.location.href;
				if (websiteUrl == 'http://localhost/couvre-feu/') {
					//alert(websiteUrl);
					let imageUrl = websiteUrl + 'wp-content/themes/couvrefeu2/dist/images/loupe.svg';
				}else {
					let imageUrl = websiteUrl + 'wp-content/themes/couvre-feu-test/dist/images/loupe.svg';
				}

				if(input.length > 0){
					$('.input').show();
					//console.log(total);
					//$(".articles div.cf-article").not("[data-label*="+ input.toLowerCase() +"]").parent().css('display','none');
					$('.input').html('Searched for "' + input + '" (' + matched + ' Matched out of ' + total + ' )');
				} else {
					$('.input').hide();
					$(".articles div.cf-article").show();
					$('#search-input').css('background-image', 'url(' + imageUrl + ')');
				}

				$(window).click(function(){
					alert('hello');
				});

			});

			//https://www.w3schools.com/css/css3_animations.asp

			var currentTime = new Date();
			var year = currentTime.getFullYear()
			var distance = jQuery('.' + year).offset().top;
			var $window = jQuery(window);

			jQuery('.2017').hover(function(){
				jQuery('.2017').addClass('last-year');
				jQuery('body').addClass('last-year');
				jQuery('#title-bottom').css('color',"white");
				jQuery('#title-top').css('color',"white");
				jQuery('.form-inline').css('color',"white");
				jQuery('.sticky-top h5').css('color','white');
				jQuery('input#search-input').addClass('change-color');
			}, function(){
				jQuery('.2017').removeClass('last-year');
				jQuery('body').removeClass('last-year');
				jQuery('#title-bottom').css('color',"black");
				jQuery('#title-top').css('color',"black");
				jQuery('.form-inline').css('color',"black");
				jQuery('.sticky-top h5').css('color','black');
				jQuery('input#search-input').removeClass('change-color');
			});

			$window.scroll(function() {
				if ( $window.scrollTop() >= distance ) {
					console.log(distance);
					//jQuery('.2017').addClass('last-year');


				}else {
					//jQuery('.2017').removeClass('last-year');

				}
			});
		});

		</script>
	@endsection
