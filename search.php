<?php
/**
 * Plantilla para resultados de búsqueda.
 *
 * @package PQR_News
 */

get_header();
?>

<div class="site-layout">
	<main id="primary" class="site-main content-area">
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf(
					esc_html__( 'Resultados de búsqueda para: %s', 'pqr-news' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<?php
			// Muestra cada resultado usando la tarjeta compartida de noticias.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			?>

			<?php
			// Paginación numerada para páginas de resultados.
			the_posts_pagination(
				array(
					'prev_text' => esc_html__( 'Anterior', 'pqr-news' ),
					'next_text' => esc_html__( 'Siguiente', 'pqr-news' ),
				)
			);
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No se encontraron resultados.', 'pqr-news' ); ?></p>
		<?php endif; ?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
