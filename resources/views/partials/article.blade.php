
@php( $search_tags = display_search_keywords( get_the_ID() ) )
@php( $styles = 'vertical-align:middle; overflow:hidden;')

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

<div data-legend="{{ $legend }}" data-arabe="{{ $legend_arabe }}" data-english="{{ $legend_english }}" class="pt-1 cf-article {{ $display_legend }}" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} {{ $styles }}">
	<div style="max-width:100%; max-height:100%; overflow:scroll; padding-right:20px;">
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
			<img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" alt="" class="img-fluid">
			@php(the_content())
		@endif
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	$('.cf-image').hover(
		function(){
			var title = $(this).attr("data-legend");
			var english = $(this).attr("data-english");
			var arabe = $(this).attr("data-arabe");
			title = '<div style="align-self:flex-end;"><p style = "background-color: rgba(255, 255, 255, 0.7); padding: 0 10px; border-radius:5px; font-family:SuisseIntl-Mono; font-size:0.9rem;"> ' + title  + '<br>' + english + '<br><span style="font-family:SuisseIntl">' + arabe +' </span></p></div>';
			$(".footer-panel").css({
				"display"			: "flex",
				"justify-content"	: "center"
			});
			$(".footer-panel").html(title).slideDown(0);
		}, function(){ $(".footer-panel").slideUp(0);
	});

	$("[data-fancybox]").fancybox({
		loop     : true,
		infobar : true,
		buttons : ['close'],
		animationDuration: 0,
	});
});
</script>
