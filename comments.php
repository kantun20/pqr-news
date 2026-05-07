<?php
/**
 * Plantilla de comentarios del theme.
 *
 * @package PQR_News
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			/* translators: %s: number of comments. */
			printf(
				esc_html(
					_n(
						'Un comentario',
						'%s comentarios',
						get_comments_number(),
						'pqr-news'
					)
				),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>

		<?php // Lista de comentarios del post actual. ?>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="comment-navigation" aria-label="<?php esc_attr_e( 'Navegación de comentarios', 'pqr-news' ); ?>">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentarios anteriores', 'pqr-news' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Comentarios siguientes', 'pqr-news' ) ); ?></div>
				</div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Los comentarios están cerrados.', 'pqr-news' ); ?></p>
	<?php endif; ?>

	<?php // Formulario nativo de comentarios de WordPress. ?>
	<?php comment_form(); ?>
</section>
