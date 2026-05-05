<?php
/**
 * Plantilla principal del theme.
 *
 * WordPress usa este archivo como respaldo para mostrar listados,
 * archivos y contenido cuando no existe una plantilla más específica.
 *
 * @package PQR_News
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php
		// Recorre las entradas disponibles en la consulta actual.
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
				</header>

				<div class="entry-content">
					<?php // Muestra un resumen para listados de noticias. ?>
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php // Navegación básica entre páginas de entradas. ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_sidebar();
get_footer();
