
@php( $search_tags = display_search_keywords( get_the_ID() ) )
@php( $styles = 'vertical-align:middle; overflow:auto;')

@if (get_post_meta(get_the_ID(),'cf_legend',true))
	@php( $legend = get_post_meta(get_the_ID(),'cf_legend',true) )
@endif
@if (get_post_meta(get_the_ID(),'cf_legende_en_arabe',true))
	@php( $legend_arabe = get_post_meta(get_the_ID(),'cf_legende_en_arabe',true) )
@endif

@if (get_post_meta(get_the_ID(),'cf_legende_english',true))
	@php( $legend_english = get_post_meta(get_the_ID(),'cf_legende_english',true) )
@endif

@if (get_post_format( $p->ID ) === 'image' || get_post_format( get_the_ID() ) === 'gallery' || get_post_format( get_the_ID() ) === 'quote')
	@php($display_legend = 'cf-image')
@endif

@if (in_category('top'))
	@php($styles = 'vertical-align:top; overflow:auto;')
@endif

<div data-legend="{{ $legend }}" data-arabe="{{ $legend_arabe }}" data-english="{{ $legend_english }}" class="cf-article {{ $display_legend }}" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} {{ $styles }}" data-toggle="pasmodal" data-target="#mobile-article-{{ get_the_ID() }}" >

	@if (get_post_format( $p->ID ) === 'image')
		<img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" alt="" class="img-fluid">
		@php(the_content())
	@elseif ( get_post_format( get_the_ID() ) === 'gallery' )
		<a href="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" data-fancybox="images-preview-{{the_ID()}}">
			<img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" alt="" class="img-fluid">
		</a>
		<div style="display: none;">
			@if ( get_post_gallery() )
				@php( $gallery = get_post_gallery( get_the_ID(), false ) )
				@php( $ids = explode( ",", $gallery['ids'] ))

				@foreach ( $ids as $id )
					<a href="{{ wp_get_attachment_image_url($id, 'full') }}" data-fancybox="images-preview-{{ the_ID() }}">
						<img src="{{ wp_get_attachment_image_url($id, 'full') }}" class="img-fluid" alt="Gallery image" />
					</a>
				@endforeach
			@endif
		</div>
	@else
		{{-- <div style="max-width:100%; max-height:100%; overflow:scroll; padding-right:20px;"> --}}
		{{-- <img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" alt="" class="img-fluid"> --}}
		@php(the_content())
		{{-- </div> --}}
	@endif

	<!-- Modal -->
	<div class="modal fade hidden-md-up" id="mobile-article-{{get_the_ID()}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: transparent;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><img src="@asset('images/croix.svg')" width="35"></span>
					</button>
				</div>
				<div class="modal-body">
					{{ $legend }}
					<br><br>
					{{ $legend_english }}
					<br><br>
					{{ $legend_arabe }}
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	$('.cf-image').hover(
		function(){
			var french = $(this).attr("data-legend");
			var english = $(this).attr("data-english");
			var arabe = $(this).attr("data-arabe");
			var output = '<div style="align-self:flex-end;" class="hidden-md-down">';
			output += '<p style = "background-color: rgba(255, 255, 255, 0.7); padding: 0 10px; border-radius:5px; font-family:SuisseIntl-Mono; font-size:0.9rem;">';
			output += french + '<br>' + english + '<br><span style="font-family:SuisseIntl">' + arabe +' </span>';
			output += '</p>';
			output += '</div>';

			$(".footer-panel").css({
				"display"			: "flex",
				"justify-content"	: "center"
			});

			if(!!('ontouchstart' in window)){

			}else{
				$(".footer-panel").html(output).slideDown(0);
			}

		}, function(){ $(".footer-panel").slideUp(0);
	});

	$('.cf-image').click(function(){
		if ($(window).width() < 1030) {
			var getter = $(this).data("toggle");
			$(this).attr("data-toggle","modal");
		}
	});

	$("[data-fancybox]").fancybox({
		loop     : true,
		infobar : true,
		buttons : ['close'],
		animationDuration: 0,
	});
});
</script>
