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
 * Registra soportes básicos de un theme clásico.
 */
function pqr_news_setup() {
	// Permite que WordPress gestione la etiqueta <title>.
	add_theme_support( 'title-tag' );

	// Activa enlaces RSS automáticos en el <head>.
	add_theme_support( 'automatic-feed-links' );

	// Habilita imágenes destacadas para entradas de noticias.
	add_theme_support( 'post-thumbnails' );

	// Registra una ubicación de menú principal.
	register_nav_menus(
		array(
			'primary' => __( 'Menú principal', 'pqr-news' ),
		)
	);
}
add_action( 'after_setup_theme', 'pqr_news_setup' );

/**
 * Carga la hoja de estilos principal del theme.
 */
function pqr_news_scripts() {
	wp_enqueue_style( 'pqr-news-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'pqr_news_scripts' );
