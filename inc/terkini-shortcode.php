<?php 
add_shortcode( 'terkini', 'terkini_shortcode' );
function terkini_shortcode( $atts ) {
	global $post;
	$slug = $atts["category"];
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	if($slug == ""){
		$argsterkini = array(
			'post_type' => 'post',
			'post_status' => 'publish',
            'paged' => $paged
		);
	}else{
		$argsterkini = array(
			'category_name' => $slug,
			'post_type' => 'post',
			'post_status' => 'publish',
            'paged' => $paged
		);
	}

	$konten = "";
	$no = 1;
	$my_trending = new WP_Query( $argsterkini );
	if ( $my_trending->have_posts() ):
		$konten .= '<div class="latest-area">';
		while ( $my_trending->have_posts() ) {
			$my_trending->the_post();
			$num = $no++;
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				if($num == 1){
					$konten .= '<div class="widget headline"><div class="headline-big"><div class="headline-box"><div class="headline-image media-image">' . customthumbnail($post->ID, "image_640_360") . '</div> <div class="headline-text"> <div class="headline-time">' . timeago() . '</div> <h3 class="headline-title"> <a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a></h3></div></div></div></div>';
				}else{
					$konten .= '<div class="article-item table"><div class="article-text"><div class="article-time">';
					if(!empty(labelcategory())):
					$konten .= '<span class="article-category">' . labelcategory() . '</span>';
					endif;
					$konten .= timeago() . '</div><h3 class="article-title"><a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a></h3></div><div class="article-image media-image">' . customthumbnail($post->ID, "thumbnail") . '</div></div>';
				}
			}elseif (wp_is_mobile()) {
				if($num == 1){
					$konten .= '<div class="widget headline"><div class="headline-big"><div class="headline-box"><div class="headline-image media-image">' . customthumbnail($post->ID, "image_640_360") . '</div> <div class="headline-text"> <div class="headline-time">' . timeago() . '</div> <h3 class="headline-title"> <a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a></h3></div></div></div></div>';
				}else{
					$konten .= '<div class="article-item table"><div class="article-text"><div class="article-time">';
					if(!empty(labelcategory())):
					$konten .= '<span class="article-category">' . labelcategory() . '</span>';
					endif;
					$konten .= timeago() . '</div><h3 class="article-title"><a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a></h3></div><div class="article-image media-image">' . customthumbnail($post->ID, "thumbnail") . '</div></div>';
				}
			}else{
				$konten .= '<div class="article-item table"><div class="article-image media-image">' . customthumbnail($post->ID, "image_200_116") . '</div><div class="article-text"><div class="article-time">';
				if(!empty(labelcategory())):
				$konten .= '<span class="article-category">' . labelcategory() . '</span>';
				endif;
				$konten .= timeago() . '</div><h3 class="article-title"><a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a></h3><div class="summary">' . get_excerpt(100) . '</div></div></div>';
			}
		}
		$konten .= '</div>';
		$konten .= '<div class="info"><button id="trigger1" class="trigger">Lihat Lainnya <i class="icon icon-arrow-right"></i></button>
		<div id="spinnerpost" class="loading"><img src="' . get_stylesheet_directory_uri() . '/assets/img/loadingbox.gif' . '" width="32" height="32" alt="Loading"></div><div class="no-more"><i class="tag-snippet__topic-icon i-checklist icon-nomore"></i> Sudah ditampilkan semua</div></div>';
        $total_pages = $my_trending->max_num_pages;
        if ($total_pages > 1){
            $current_page = max(1, get_query_var('paged'));
			$konten .= '<div class="pagination">';
			$konten .= get_next_posts_link('"Lihat Lainnya <i class="icon icon-arrow-right"></i>', $my_trending->max_num_pages );
			$konten .= '</div>';
        }
	endif;
	wp_reset_postdata();
	return $konten;
}
?>