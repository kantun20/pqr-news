<?php
/**
 * Template part para mostrar una tarjeta de noticia.
 *
 * @package PQR_News
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php // Imagen destacada enlazada a la noticia. ?>
		<div class="entry-thumbnail">
			<a class="entry-thumbnail-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
				<?php the_post_thumbnail( 'medium_large', array( 'class' => 'entry-thumbnail-image' ) ); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<?php // Metadatos básicos para un listado de noticias. ?>
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
