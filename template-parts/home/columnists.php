<?php
/**
 * Componente básico de autores para la portada.
 *
 * @package PQR_News
 */

$pqr_news_authors = get_users(
	array(
		'who'     => 'authors',
		'number'  => 4,
		'orderby' => 'post_count',
		'order'   => 'DESC',
	)
);
?>

<section class="home-section columnists" aria-labelledby="columnists-title">
	<h2 id="columnists-title" class="home-section-title"><?php esc_html_e( 'Columnistas', 'pqr-news' ); ?></h2>

	<?php if ( $pqr_news_authors ) : ?>
		<div class="columnists-grid">
			<?php foreach ( $pqr_news_authors as $pqr_news_author ) : ?>
				<article class="columnist-card">
					<h3 class="columnist-name">
						<a href="<?php echo esc_url( get_author_posts_url( $pqr_news_author->ID ) ); ?>">
							<?php echo esc_html( $pqr_news_author->display_name ); ?>
						</a>
					</h3>
				</article>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'No hay columnistas para mostrar todavía.', 'pqr-news' ); ?></p>
	<?php endif; ?>
</section>
