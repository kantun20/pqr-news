<?php
/**
 * Bloque de portada para una categoría configurable.
 *
 * @package PQR_News
 */

$pqr_news_category_slug = isset( $args['category_slug'] ) ? sanitize_title( $args['category_slug'] ) : '';
$pqr_news_category      = $pqr_news_category_slug ? get_category_by_slug( $pqr_news_category_slug ) : false;

if ( ! $pqr_news_category ) {
	return;
}

$pqr_news_category_query = new WP_Query(
	array(
		'category_name'       => $pqr_news_category_slug,
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>

<section class="home-section category-block category-block-<?php echo esc_attr( $pqr_news_category_slug ); ?>" aria-labelledby="category-block-<?php echo esc_attr( $pqr_news_category_slug ); ?>">
	<header class="home-section-header">
		<h2 id="category-block-<?php echo esc_attr( $pqr_news_category_slug ); ?>" class="home-section-title">
			<?php echo esc_html( $pqr_news_category->name ); ?>
		</h2>
	</header>

	<?php if ( $pqr_news_category_query->have_posts() ) : ?>
		<div class="posts-grid">
			<?php
			while ( $pqr_news_category_query->have_posts() ) :
				$pqr_news_category_query->the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'Esta sección todavía no tiene noticias publicadas.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</section>

<?php
wp_reset_postdata();
