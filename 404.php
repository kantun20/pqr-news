<?php
/**
 * Plantilla para páginas no encontradas.
 *
 * @package PQR_News
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Página no encontrada', 'pqr-news' ); ?></h1>
		</header>

		<div class="page-content">
			<?php // Mensaje breve para orientar al visitante. ?>
			<p><?php esc_html_e( 'El contenido que buscas no existe o fue movido.', 'pqr-news' ); ?></p>

			<p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php esc_html_e( 'Volver al inicio', 'pqr-news' ); ?>
				</a>
			</p>

			<?php // Buscador para intentar encontrar otra noticia o página. ?>
			<?php get_search_form(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
