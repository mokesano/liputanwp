<?php 
if ( ! function_exists( 'setup' ) ) :
    function setup() {
        load_theme_textdomain( 'web' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 288,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'brand-title', 'brand-description' ),
        ) );
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'image_640_360', 640, 360, array( 'center', 'center' ));
        add_image_size( 'image_200_116', 200, 116, array( 'center', 'center' ));
        add_image_size( 'image_300_168', 300, 168, array( 'center', 'center' ));
        add_image_size( 'image_60_60', 60, 60, array( 'center', 'center' ));
        add_image_size( 'image_383_288', 383, 288, array( 'center', 'center' ));
        add_image_size( 'image_255_143', 255, 143, array( 'center', 'center' ));
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style', ) );
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat', ) );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'setup' );
?>