
@php( $search_tags = display_search_keywords( get_the_ID() ) )

@if (get_post_meta(get_the_ID(),'cf_legend',true))
	@php( $legend = get_post_meta(get_the_ID(),'cf_legend',true) )
@endif

@if (get_post_format( $p->ID ) === 'image')
	<div data-title="{{ $legend }}" class="pt-1 cf-article cf-image" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} overflow:scroll">
		{{-- <a href="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" data-fancybox>
			<img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" alt="" class="img-fluid">
		</a> --}}
		@php(the_title())
		@php(the_content())
	</div>
@elseif ( get_post_format( get_the_ID() ) === 'gallery' )
	<div data-title="{{ $legend }}" class="pt-1 cf-article cf-image" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} overflow:scroll">
		@php(the_title())
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
		{{-- @php(the_content()) --}}
	</div>
@else

	<div class="p-1 cf-article" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} overflow:scroll">
		@php(the_title())
		@php( the_content() )
	</div>
@endif


<script type="text/javascript">
jQuery(document).ready(function() {
	$('.cf-image').hover(
		function(){
			var title = $(this).attr("data-title");
			title = '<div style="align-self:flex-end;">' + title + '</div>';
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
