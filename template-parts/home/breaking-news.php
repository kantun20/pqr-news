<?php
/**
 * Componente de noticia urgente para la portada.
 *
 * @package PQR_News
 */

$pqr_news_breaking_query = new WP_Query(
	array(
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>

<section class="home-section breaking-news" aria-label="<?php esc_attr_e( 'Última noticia', 'pqr-news' ); ?>">
	<h2 class="home-section-title"><?php esc_html_e( 'Última noticia', 'pqr-news' ); ?></h2>

	<?php if ( $pqr_news_breaking_query->have_posts() ) : ?>
		<?php
		while ( $pqr_news_breaking_query->have_posts() ) :
			$pqr_news_breaking_query->the_post();
			?>
			<p class="breaking-news-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</p>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No hay noticias disponibles por el momento.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</section>

<?php
wp_reset_postdata();
