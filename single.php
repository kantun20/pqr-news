<?php
/**
 * Plantilla para mostrar una noticia individual.
 *
 * @package PQR_News
 */

get_header();
?>

<div class="site-layout">
	<main id="primary" class="site-main content-area">
		<?php
		// Loop principal para la noticia individual.
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<?php // Metadatos básicos de la noticia. ?>
					<div class="entry-meta post-meta">
						<span class="posted-on">
							<?php echo esc_html( get_the_date() ); ?>
						</span>
						<span class="byline">
							<?php esc_html_e( 'por', 'pqr-news' ); ?>
							<?php echo esc_html( get_the_author() ); ?>
						</span>
						<span class="post-categories">
							<?php echo wp_kses_post( get_the_category_list( esc_html__( ', ', 'pqr-news' ) ) ); ?>
						</span>
						<?php if ( get_the_tag_list() ) : ?>
							<span class="post-tags">
								<?php echo wp_kses_post( get_the_tag_list( '', esc_html__( ', ', 'pqr-news' ) ) ); ?>
							</span>
						<?php endif; ?>
					</div>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<?php // Imagen destacada de la noticia. ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail( 'medium_large', array( 'class' => 'entry-thumbnail-image' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>

			<?php
			// Carga comentarios solo si están abiertos o ya existen comentarios.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php
			// Navegación básica entre noticias.
			the_post_navigation(
				array(
					'prev_text' => esc_html__( 'Noticia anterior', 'pqr-news' ),
					'next_text' => esc_html__( 'Siguiente noticia', 'pqr-news' ),
				)
			);
			?>
		<?php endwhile; ?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
