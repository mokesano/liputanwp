<?php 
require 'inc/index.php';
require 'widget/index.php';

function labelcategory(){
    $category = get_the_category();
    $useCatLink = true;
    // If post has a category assigned.
    if ($category){
        $category_display = '';
        $category_link = '';
        if ( class_exists('WPSEO_Primary_Term') ){
        // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );
        if (is_wp_error($term)) { 
            // Default to first category (not Yoast) if an error is returned
            $category_display = $category[0]->name;
            $category_link = get_category_link( $category[0]->term_id );
        } else { 
            // Yoast Primary category
            $category_display = $term->name;
            $category_link = get_category_link( $term->term_id );
        }
    } 
    else {
        // Default, display the first category in WP's list of assigned categories
        $category_display = $category[0]->name;
        $category_link = get_category_link( $category[0]->term_id );
    }
    // Display category
    if ( !empty($category_display) ){
        if ( $useCatLink == true && !empty($category_link) ){
            $code = htmlspecialchars($category_display);
        } else {
            $code = htmlspecialchars($category_display);
        }
    	return $code;
    }
    
    }
}
function linkcategory(){
    $category = get_the_category();
    $useCatLink = true;
    // If post has a category assigned.
    if ($category){
        $category_display = '';
        $category_link = '';
        if ( class_exists('WPSEO_Primary_Term') ){
        // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );
        if (is_wp_error($term)) { 
            // Default to first category (not Yoast) if an error is returned
            $category_display = $category[0]->name;
            $category_link = get_category_link( $category[0]->term_id );
        } else { 
            // Yoast Primary category
            $category_display = $term->name;
            $category_link = get_category_link( $term->term_id );
        }
    } 
    else {
        // Default, display the first category in WP's list of assigned categories
        $category_display = $category[0]->name;
        $category_link = get_category_link( $category[0]->term_id );
    }
    // Display category
    if ( !empty($category_display) ){
        if ( $useCatLink == true && !empty($category_link) ){
            $code = $category_link;
        } else {
            $code = $category_link;
        }
    	return $code;
    }

    }
}

function slugcategory(){
    $category = get_the_category();
    $useCatLink = true;
    // If post has a category assigned.
    if ($category){
        $category_display = '';
        $category_link = '';
        if ( class_exists('WPSEO_Primary_Term') ){
        // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );
        if (is_wp_error($term)) { 
            // Default to first category (not Yoast) if an error is returned
            $category_display = $category[0]->name;
            $category_link = $category[0]->slug;
        } else { 
            // Yoast Primary category
            $category_display = $term->name;
            $category_link = $term->slug;
        }
    } 
    else {
        // Default, display the first category in WP's list of assigned categories
        $category_display = $category[0]->name;
        $category_link = $category[0]->slug;
    }
    // Display category
    if ( !empty($category_display) ){
        if ( $useCatLink == true && !empty($category_link) ){
            $code = $category_link;
        } else {
            $code = $category_link;
        }
        return $code;
    }

    }
}
function get_excerpt( $count ) {
$permalink = get_permalink($post->ID);
$excerpt = get_the_content();
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $count);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = '<p>'.$excerpt.'...</p>';
return $excerpt;
}


