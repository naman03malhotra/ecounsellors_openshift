<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">.
 *
 * @package Stag_Customizer
 * @subpackage Ink
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-layout="<?php echo esc_attr( stag_site_layout() ); ?>">

<nav class="site-nav" role="complementary">
	<div class="site-nav--scrollable-container">
		<i class="fa fa-times close-nav"></i>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="navigation main-navigation site-nav__section" role="navigation">
			<h4 class="widgettitle"><?php _e( 'Menu', 'stag' ); ?></h4>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'primary-menu', 'container' => false, 'fallback_cb' => false ) ); ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-drawer' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-drawer' ); ?>
		<?php endif; ?>
	</div>
</nav>
<div class="site-nav-overlay"></div>

<div id="page" class="hfeed site">

	<div id="content" class="site-content">

		<header id="masthead" class="site-header">

			<div class="site-branding">
				<?php if ( stag_get_logo()->has_logo() ) : ?>
					<a class="custom-logo" title="<?php esc_attr_e( 'Home', 'stag' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>

				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>

			<a href="#" id="site-navigation-toggle" class="site-navigation-toggle"><i class="fa fa-navicon"></i></a>

			<?php if ( ! is_author() && ( is_archive() || is_search() ) ) : ?>
			<div class="archive-header">
				<h3 class="archive-header__title"><?php echo stag_archive_title(); ?></h3>
			</div>
			<?php endif; ?>

		</header><!-- #masthead -->
