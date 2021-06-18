<?php
define( 'THIM_DIR_CHILD', trailingslashit( get_stylesheet_directory() ) );
function thim_child_enqueue_styles() {

	wp_enqueue_style( 'thim-parent-style', get_template_directory_uri() . '/style.css', array(), THIM_THEME_VERSION  );
	wp_enqueue_style( 'custom_style', get_stylesheet_directory_uri() . '/thimpress_custom/custom_style.css', array(), THIM_THEME_VERSION  );
    wp_enqueue_script( 'custom-script.js', get_stylesheet_directory_uri() .'/thimpress_custom/script.js', array('jquery'),THIM_THEME_VERSION );
}

add_action( 'wp_enqueue_scripts', 'thim_child_enqueue_styles', 1000 );

if (!is_account_page()){
require_once THIM_DIR_CHILD . '/thimpress_custom/thimpress_custom.php';
}