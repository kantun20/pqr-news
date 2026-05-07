<?php
/**
 * Componente de noticias recientes.
 *
 * @package PQR_News
 */

$pqr_news_latest_query = new WP_Query(
	array(
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>

<section class="home-section latest-news" aria-labelledby="latest-news-title">
	<h2 id="latest-news-title" class="home-section-title"><?php esc_html_e( 'Últimas noticias', 'pqr-news' ); ?></h2>

	<?php if ( $pqr_news_latest_query->have_posts() ) : ?>
		<div class="posts-grid">
			<?php
			while ( $pqr_news_latest_query->have_posts() ) :
				$pqr_news_latest_query->the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'No hay noticias recientes para mostrar.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</section>

<?php
wp_reset_postdata();
