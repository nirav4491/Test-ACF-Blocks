<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sonho
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sonho' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<!-- Header Left Part -->
				<div class="header_left_part">
					<!-- Header Logo -->
					<div class="header_logo">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$sonho_description = get_bloginfo( 'description', 'display' );
						if ( $sonho_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $sonho_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div>
					<!--Header Navigation -->
					<nav id="site-navigation" class="header_nav main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.66667 20H28.3333C29.25 20 30 19.25 30 18.3333C30 17.4167 29.25 16.6667 28.3333 16.6667H1.66667C0.75 16.6667 0 17.4167 0 18.3333C0 19.25 0.75 20 1.66667 20ZM1.66667 11.6667H28.3333C29.25 11.6667 30 10.9167 30 10C30 9.08333 29.25 8.33333 28.3333 8.33333H1.66667C0.75 8.33333 0 9.08333 0 10C0 10.9167 0.75 11.6667 1.66667 11.6667ZM0 1.66667C0 2.58333 0.75 3.33333 1.66667 3.33333H28.3333C29.25 3.33333 30 2.58333 30 1.66667C30 0.75 29.25 0 28.3333 0H1.66667C0.75 0 0 0.75 0 1.66667Z" fill="#030303"/>
							</svg>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav>
				</div>
				<!-- Header Right Part -->
				<div class="header_right_part">
					<!-- Header Language Selector -->
					<div class="header_lang_selector">
						<?php echo do_shortcode( '[weglot_switcher]' ); ?>
						<!-- <div class="lang_selector">
							<img src="/wp-content/themes/sonho/assets/images/en.png" alt="en" />
							<span class="lang_text"><span class="text">EN</span>
								<span class="svg_icon">
									<svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.825 0.158008L5 3.97467L1.175 0.158007L4.37114e-07 1.33301L5 6.33301L10 1.33301L8.825 0.158008Z" fill="#030303"/>
									</svg>
								</span>
							</span>
						</div> -->

					</div>

					<!-- header Button -->
					<div class="header_button">
						<a href="#" class="btn">Contrate-nos</a>
					</div>
				</div>
			</div>
		</div>
	</header>
