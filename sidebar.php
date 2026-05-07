<?php
/**
 * Sidebar principal del theme.
 *
 * @package PQR_News
 */

// No muestra el contenedor si no hay widgets activos.
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Sidebar principal', 'pqr-news' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
