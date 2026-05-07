<?php
/**
 * Portada editorial del theme PQR News.
 *
 * @package PQR_News
 */

get_header();

/**
 * Configuración temporal de secciones por slug de categoría.
 *
 * Cambia estos slugs por categorías reales del sitio desde WordPress.
 */
$pqr_news_home_sections = array(
	'politica',
	'economia',
	'cultura',
);
?>

<main id="primary" class="site-main front-page-main">
	<?php
	get_template_part( 'template-parts/home/breaking-news' );
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/latest-news' );

	foreach ( $pqr_news_home_sections as $pqr_news_category_slug ) :
		get_template_part(
			'template-parts/home/category-block',
			null,
			array(
				'category_slug' => $pqr_news_category_slug,
			)
		);
	endforeach;

	get_template_part( 'template-parts/home/columnists' );
	?>
</main>

<?php
get_footer();
