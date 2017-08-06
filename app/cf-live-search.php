<?php
/*
* This function helps
*/
function display_search_keywords($id){
    $tags = '';

    $posttags = get_the_tags($id);

    if ($posttags) {
        foreach($posttags as $tag) {
            $tags = $tags . ' ' . $tag->name;
        }
    }

    $tags = strtolower(get_the_title($id)) . strtolower($tags) . ' ' . get_post_meta( $id , 'article_year', true);

    if (get_post_format( $id ) === 'quote' ) {
        $tags = $tags . ' ' . get_post_field('post_content', $id);
    }
	if (get_post_format( $id ) === 'standard' ) {
		$tags = $tags . ' ' . get_post_field('post_content', $id);
	}
	if (get_post_format( $id ) === 'false' ) {
		$tags = $tags . ' ' . get_post_field('post_content', $id);
	}
	if (empty(get_post_format( $id ))) {
		$tags = $tags . ' ' . get_post_field('post_content', $id);
	}

    return strtolower($tags);
}

// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    ?>
    <script type="text/javascript">
    function fetch(){
        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'post',
            data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('#datafetch').html( data );
            }
        });

    }
    </script>

    <?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
        <div class="mt-1 pt-1" style="width:<?= get_post_meta(get_the_ID(),'width', true); ?>px; height:<?= get_post_meta(get_the_ID(),'height', true); ?>px; display:inline-block; overflow:scroll">
            <img src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>" alt="" class="img-fluid">
            <span class="invisible">
                <a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a>
            </span>
            <?php the_content(); ?>
        </div>
    <?php endwhile;
    wp_reset_postdata();
endif;

die();
}
