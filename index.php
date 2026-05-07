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

<div class="site-layout">
	<main id="primary" class="site-main content-area">
		<?php if ( have_posts() ) : ?>
			<?php
			$post_counter = 0;

			// Loop principal: respeta la consulta principal para no romper paginación futura.
			while ( have_posts() ) :
				the_post();

				if ( 0 === $post_counter ) :
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<?php // Imagen principal de la noticia destacada. ?>
							<div class="entry-thumbnail featured-post-thumbnail">
								<a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
									<?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail-image' ) ); ?>
								</a>
							</div>
						<?php endif; ?>

						<div class="featured-post-content">
							<header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>

								<?php // Metadatos básicos de la noticia destacada. ?>
								<div class="entry-meta post-meta">
									<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
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

							<div class="entry-content">
								<?php the_excerpt(); ?>
							</div>

							<footer class="entry-footer">
								<a class="read-more" href="<?php the_permalink(); ?>">
									<?php esc_html_e( 'Leer más', 'pqr-news' ); ?>
								</a>
							</footer>
						</div>
					</article>
				<?php else : ?>
					<?php if ( 1 === $post_counter ) : ?>
						<div class="posts-grid">
					<?php endif; ?>
					<?php get_template_part( 'template-parts/content' ); ?>
				<?php endif; ?>
				<?php
				$post_counter++;
			endwhile;

			if ( 1 < $post_counter ) :
				?>
				</div>
			<?php endif; ?>

			<?php
			// Paginación numerada para listados de noticias.
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
