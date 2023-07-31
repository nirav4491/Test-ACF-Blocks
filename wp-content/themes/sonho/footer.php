<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sonho
 */
$email = get_field( 'footer_email', 'option' );
?>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image          = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				?>
				<!-- Footer Logo -->
				<div class="footer_logo">
					<a href="/">
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="logo" />
					</a>
				</div>

				<!-- Footer Nav -->
				<div class="footer_navs">

					<!-- Box One -->
					<div class="nav_box">
						<h5><?php echo esc_html( 'Email' ); ?></h5>
						<ul>
							<li>
								<a href="mailto:<?php echo esc_url( $email ); ?>"><?php echo esc_html( $email ); ?></a>
							</li>
						</ul>
					</div>

					<!-- Box Two -->
					<div class="nav_box">
						<h5><?php echo esc_html( 'Home' ); ?></h5>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu-1',
							)
						);
						?>
					</div>

					<!-- Box Three -->
					<div class="nav_box">
						<h5><?php echo esc_html( 'Branding E Design' ); ?></h5>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'footer-menu-2',
							)
						);
						?>
					</div>

					<!-- Box Four -->
					<div class="nav_box two_box">
						<h5><?php echo esc_html( 'Desenvolvimento de websites' ); ?></h5>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-4',
								'menu_id'        => 'footer-menu-3',
							)
						);
						?>
					</div>

					<!-- Box Five -->
					<div class="nav_box mobile_menu">
						<h5><?php echo esc_html( 'Informações legais' ); ?></h5>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-5',
								'menu_id'        => 'footer-menu-4',
							)
						);
						?>
					</div>

				</div>

			</div>
		</div>

		<section class="copyright">
			<div class="container">
				<div class="row">
					<div class="nav_box">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-5',
								'menu_id'        => 'footer-menu-4',
							)
						);
						?>
					</div>
				</div>
			</div>
		</section>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
