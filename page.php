<?php
/**
 * Plantilla para páginas estáticas.
 *
 * @package PQR_News
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	// Loop principal para páginas estáticas de WordPress.
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php // Imagen destacada de la página, si fue asignada. ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail( 'medium_large', array( 'class' => 'entry-thumbnail-image' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
