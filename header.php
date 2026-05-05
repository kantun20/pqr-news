<?php
/**
 * Cabecera del theme PQR News.
 *
 * @package PQR_News
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<?php // Nombre del sitio con enlace a la portada. ?>
		<p class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		</p>

		<?php // Menú principal registrado en functions.php. ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menú principal', 'pqr-news' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	</header>
