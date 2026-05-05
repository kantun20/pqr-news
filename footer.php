<?php
/**
 * Pie de página del theme PQR News.
 *
 * @package PQR_News
 */
?>

	<footer id="colophon" class="site-footer">
		<?php // Texto básico de copyright del sitio. ?>
		<p>
			&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</p>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
