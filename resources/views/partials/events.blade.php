@php
// WP_Query arguments
$args_fr = [
	'post_type' => ['event'],
	'category_name' => 'francais'
];

$args_en = [
	'post_type' => ['event'],
	'category_name' => 'anglais'
];

$args_ar = [
	'post_type' => ['event'],
	'category_name' => 'arabe'
];
// The Query
$query_fr = new WP_Query( $args_fr );
$query_en = new WP_Query( $args_en );
$query_ar = new WP_Query( $args_ar );
$i=0;
$j=0;
$k=0;
@endphp

<div class="row">
	<div class="col">
		<h3>À venir</h3>
		<br>
		@if ( $query_fr->have_posts() )
			<div id="accordion" role="tablist" aria-multiselectable="true">
				@while ($query_fr->have_posts())
					@php($query_fr->the_post())
					<div role="tab" id="heading-{{ $i }}">
						<a data-toggle="collapse" class="cf-font-big cf-white cf-event-title" data-parent="#accordion" href="#collapse-{{ $i }}"  aria-controls="collapseOne">
							<h3>@php(the_title())</h3>
							<span style="font-size:1rem;">@php(the_excerpt())</span>
						</a>
					</div>
					<div id="collapse-{{ $i }}" class="collapse cf-font-small" role="tabpanel" aria-labelledby="heading-{{ $i }}">
						@php(the_content())
					</div>
					@php(++$i)
					<br>
				@endwhile
			</div>
		@else
			<h3>Il n'y a pas d'evenements</h3>
		@endif
		{{-- Restore original Post Data --}}
		@php(wp_reset_postdata())
	</div>
	<div class="col">
		<h3>Comming soon</h3>
		<br>
		@if ( $query_en->have_posts() )
			<div id="accordion" role="tablist" aria-multiselectable="true">
				@while ($query_en->have_posts())
					@php($query_en->the_post())
					<div role="tab" id="heading-{{ $i }}">
						<a data-toggle="collapse" class="cf-font-big cf-white cf-event-title" data-parent="#accordion" href="#collapse-{{ $i }}"  aria-controls="collapseOne">
							<h3>@php(the_title())</h3>
							<span style="font-size:1rem;">@php(the_excerpt())</span>
						</a>
					</div>
					<div id="collapse-{{ $i }}" class="collapse cf-font-small" role="tabpanel" aria-labelledby="heading-{{ $i }}">
						@php(the_content())
					</div>
					@php(++$j)
					<br>
				@endwhile
			</div>
		@else
			<h3>There are no events</h3>
		@endif
		{{-- Restore original Post Data --}}
		@php(wp_reset_postdata())
	</div>
	<div class="col">
		<h3>Salamelecum</h3>
		<br>
		@if ( $query_ar->have_posts() )
			<div id="accordion" role="tablist" aria-multiselectable="true">
				@while ($query_ar->have_posts())
					@php($query_ar->the_post())
					<div role="tab" id="heading-{{ $k }}">
						<a data-toggle="collapse" class="cf-font-big cf-white cf-event-title" data-parent="#accordion" href="#collapse-{{ $k }}"  aria-controls="collapseOne">
							<h3>@php(the_title())</h3>
							<span style="font-size:1rem;">@php(the_excerpt())</span>
						</a>
					</div>
					<div id="collapse-{{ $k }}" class="collapse cf-font-small" role="tabpanel" aria-labelledby="heading-{{ $k }}">
						@php(the_content())
					</div>
					@php(++$k)
					<br>
				@endwhile
			</div>
		@else
			<h3>asdflkjasdléfkj</h3>
		@endif
		{{-- Restore original Post Data --}}
		@php(wp_reset_postdata())
	</div>
</div>
