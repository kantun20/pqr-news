<?php
/**
 * Componente hero de portada.
 *
 * @package PQR_News
 */

$pqr_news_hero_query = new WP_Query(
	array(
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => false,
		'no_found_rows'       => true,
	)
);
?>

<section class="home-section home-hero" aria-label="<?php esc_attr_e( 'Noticia principal', 'pqr-news' ); ?>">
	<?php if ( $pqr_news_hero_query->have_posts() ) : ?>
		<?php
		while ( $pqr_news_hero_query->have_posts() ) :
			$pqr_news_hero_query->the_post();
			?>
			<article id="hero-post-<?php the_ID(); ?>" <?php post_class( 'hero-post' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail hero-post-thumbnail">
						<a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
							<?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail-image' ) ); ?>
						</a>
					</div>
				<?php endif; ?>

				<div class="hero-post-content">
					<h1 class="hero-post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>

					<div class="entry-meta post-meta">
						<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
						<span class="byline">
							<?php esc_html_e( 'por', 'pqr-news' ); ?>
							<?php echo esc_html( get_the_author() ); ?>
						</span>
					</div>

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No hay noticias para destacar todavía.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</section>

<?php
wp_reset_postdata();
