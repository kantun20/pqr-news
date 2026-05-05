<?php
/**
 * Funciones básicas del theme PQR News.
 *
 * @package PQR_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configura los soportes básicos del theme clásico.
 */
function pqr_news_setup() {
	// Permite que WordPress gestione la etiqueta <title>.
	add_theme_support( 'title-tag' );

	// Activa enlaces RSS automáticos en el <head>.
	add_theme_support( 'automatic-feed-links' );

	// Habilita imágenes destacadas para entradas de noticias.
	add_theme_support( 'post-thumbnails' );

	// Usa marcado HTML5 en formularios, comentarios, galerías y assets.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Registra una ubicación de menú principal.
	register_nav_menus(
		array(
			'primary' => __( 'Menú principal', 'pqr-news' ),
		)
	);
}
add_action( 'after_setup_theme', 'pqr_news_setup' );

/**
 * Carga las hojas de estilo del theme.
 */
function pqr_news_scripts() {
	wp_enqueue_style( 'pqr-news-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style(
		'pqr-news-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'pqr-news-style' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'pqr_news_scripts' );
