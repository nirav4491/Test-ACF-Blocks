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

?>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">

				<!-- Footer Logo -->
				<div class="footer_logo">
					<a href="/">
						<img src="/wp-content/uploads/2023/07/sonho.svg" alt="logo" />
					</a>
				</div>

				<!-- Footer Nav -->
				<div class="footer_navs">

					<!-- Box One -->
					<div class="nav_box">
						<h5>Email</h5>
						<ul>
							<li>
								<a href="mailto:xxx@example.com">xxx@example.com</a>
							</li>
						</ul>
					</div>

					<!-- Box Two -->
					<div class="nav_box">
						<h5>Home</h5>
						<ul>
							<li>
								<a href="#">Projetos</a>
							</li>
							<li>
								<a href="#">Sobre</a>
							</li>
							<li>
								<a href="#">Contacto</a>
							</li>
						</ul>
					</div>

					<!-- Box Three -->
					<div class="nav_box">
						<h5>Branding E Design</h5>
						<ul>
							<li>
								<a href="#">Design de UI/UX</a>
							</li>
							<li>
								<a href="#">Design de Web</a>
							</li>
							<li>
								<a href="#">Branding e Conceitos</a>
							</li>
							<li>
								<a href="#">Auditoria Do Projecto</a>
							</li>
						</ul>
					</div>

					<!-- Box Four -->
					<div class="nav_box two_box">
						<h5>Desenvolvimento de websites</h5>
						<ul>
							<li>
								<a href="#">WordPress</a>
							</li>

							<li>
								<a href="#">Laravel</a>
							</li>

							<li>
								<a href="#">Woocommerce</a>
							</li>

							<li>
								<a href="#">Shopify</a>
							</li>

							<li>
								<a href="#">Webflow</a>
							</li>
						</ul>
					</div>

					<!-- Box Five -->
					<div class="nav_box mobile_menu">
						<h5>Informações legais</h5>
						<ul>
							<li>
								<a href="#">Política de Privacidade</a>
							</li>

							<li>
								<a href="#">Termos e Condições</a>
							</li>
						</ul>
					</div>

				</div>

			</div>
		</div>

		<section class="copyright">
			<div class="container">
				<div class="row">

					<a href="#">Política de Privacidade</a>
					<a href="#">Termos e Condições</a>

				</div>
			</div>
		</section>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
