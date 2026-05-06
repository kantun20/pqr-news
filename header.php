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
		<div class="site-branding">
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
				</a>
			</p>

			<?php // Descripción corta configurada en Ajustes > Generales. ?>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			<?php endif; ?>
		</div>

		<?php // Menú principal con fallback básico al inicio. ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menú principal', 'pqr-news' ); ?>">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
			<?php else : ?>
				<ul id="primary-menu" class="menu">
					<li>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo esc_html__( 'Inicio', 'pqr-news' ); ?>
						</a>
					</li>
				</ul>
			<?php endif; ?>
		</nav>
	</header>
