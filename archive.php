<?php
/**
 * Plantilla para archivos de categorías, etiquetas, autor y fechas.
 *
 * @package PQR_News
 */

get_header();
?>

<div class="site-layout">
	<main id="primary" class="site-main content-area">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header>

			<?php
			// Reutiliza la tarjeta de noticia compartida.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			?>

			<?php
			// Paginación numerada para páginas del archivo.
			the_posts_pagination(
				array(
					'prev_text' => esc_html__( 'Anterior', 'pqr-news' ),
					'next_text' => esc_html__( 'Siguiente', 'pqr-news' ),
				)
			);
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No se encontraron noticias.', 'pqr-news' ); ?></p>
		<?php endif; ?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
