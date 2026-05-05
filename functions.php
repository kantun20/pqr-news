<?php
/**
 * PQR News theme functions.
 *
 * @package PQR_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pqr_news_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'pqr-news' ),
		)
	);
}
add_action( 'after_setup_theme', 'pqr_news_setup' );

function pqr_news_scripts() {
	wp_enqueue_style( 'pqr-news-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'pqr_news_scripts' );
