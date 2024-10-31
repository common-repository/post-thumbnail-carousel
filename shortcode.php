<?php

/**
 * plugin SHortcode 
 */

function ptc_shortcode_generator( $attrs ) {


	$markup = '<div class="ptc_carousel">';

	$posts = null; 
	$posts = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page'=> 3
	) );

	if ($posts->have_posts()) {
		while($posts->have_posts()){
			$posts->the_post();

			$markup .= '<div class="ptc_single_caorusel"><img src=" '.get_the_post_thumbnail_url().' "></div>';

		}
	}

	$markup .= '</div>';

	return $markup;
}
add_shortcode( 'ptc_shortcode', 'ptc_shortcode_generator' );
