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
		// Loop principal: muestra las entradas de la consulta actual.
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>

					<?php // Metadatos básicos para un listado de noticias. ?>
					<div class="entry-meta">
						<span class="posted-on">
							<?php echo esc_html( get_the_date() ); ?>
						</span>
						<span class="byline">
							<?php esc_html_e( 'por', 'pqr-news' ); ?>
							<?php echo esc_html( get_the_author() ); ?>
						</span>
					</div>
				</header>

				<div class="entry-content">
					<?php // Extracto de la noticia. ?>
					<?php the_excerpt(); ?>
				</div>

				<footer class="entry-footer">
					<a class="read-more" href="<?php the_permalink(); ?>">
						<?php esc_html_e( 'Leer más', 'pqr-news' ); ?>
					</a>
				</footer>
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
