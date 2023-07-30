<?php
/**
 * Projects Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title             = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$subtitle          = ( ! empty( get_field( 'sub_title' ) ) ) ? get_field( 'sub_title' ) : 'Sub Title';
$projects_per_page = ( ! empty( get_field( 'projects_per_page' ) ) ) ? get_field( 'projects_per_page' ) : '6';
$project_category  = ( ! empty( get_field( 'project_category' ) ) ) ? get_field( 'project_category' ) : array();
$call_to_action    = ( ! empty( get_field( 'call_to_action' ) ) ) ? get_field( 'call_to_action' ) : '';
$args = array(
	'post_type'      => 'project',
	'post_status'    => 'publish',
	'posts_per_page' => $projects_per_page,
	'orderby'       => 'date',
	'order'         => 'DESC',
);
if( ! empty( $project_category ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'project_category',
			'field'    => 'term_id',
			'terms'    => $project_category,
		)
	);
}
$projects = get_posts( $args );
?>
<!-- Banner Section -->
<section class="projects" style="display:none;">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h6><?php echo esc_html( $title );?></h6>
				<h2><?php echo esc_html( $subtitle ); ?></h2>
				<?php
				if ( ! empty( $projects ) ) {
					?>
					<div class="project-list">
						<?php
						foreach( $projects as $project ) {
							$project_title = $project->post_title;
							$project_cat   = get_the_terms( $project->ID, 'project_category' );
							$image_id  = get_post_thumbnail_id( $project->ID );
							$image_arr = wp_get_attachment_image_src( $image_id, 'full' );
							$image     = $image_arr[0];
							?>
							<div class="project-img">
								<img src="<?php echo esc_url( $image ); ?>"alt="Project Img">
							</div>
							<div class="project-details">
								<h3><?php echo esc_html( $project_title ); ?></h3>
								<div class="project-cat-list">
									<?php
									foreach( $project_cat as $category ) {
										$cat_link = get_term_link( $category, 'project_category' )
										?>
										<a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $category->name ); ?></a>
										<?php
									}
									?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div>
						<?php
						$btn_text   = ( ! empty( $call_to_action['title'] ) ) ? $call_to_action['title'] : 'Call To Action';
						$btn_link   = ( ! empty( $call_to_action['url'] ) ) ? $call_to_action['url'] : '#';
						$btn_target = ( ! empty( $call_to_action['target'] ) ) ? $call_to_action['target'] : '_self';
						?>
						<a class="btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_text ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<!-- Project Section -->
	<section class="project_section">
		<div class="container">
			<div class="row">

				<div class="site_content">
					<h4 class="sub_title">Projetos</h4>
					<h2 class="title">Cases</h2>
				</div>
				
				<div class="project_details">
					
					<div class="details_row">

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_1.jpg" alt="project_img_1" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>Flightless</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">Media</a>
								</div>

							</div>
						</div>

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_2.jpg" alt="project_img_2" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>Grow</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">Interactive customer experience</a>
								</div>

							</div>
						</div>

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_3.jpg" alt="project_img_3" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>ScanCode</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">Interactive customer experience</a>
								</div>

							</div>
						</div>

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_4.jpg" alt="project_img_4" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>Fiwy - Branding e Web Design</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">No-code web apps</a>
								</div>

							</div>
						</div>

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_5.jpg" alt="project_img_5" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>MKTG Specs</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">Media</a>
									<a href="#">Advertising</a>
									<a href="#">Marketing</a>
								</div>

							</div>
						</div>

						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="/wp-content/themes/sonho/assets/images/project/project_image_6.jpg" alt="project_img_6" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3>Mundi Web Guy - Branding & Web Design</h3>

								<!-- Details Tag -->
								<div class="box_tag">
									<a href="#">Audio production for web</a>
								</div>

							</div>
						</div>

					</div>

					<a class="btn" href="javascript:;">
						<span class="text">Nosso portfólio e estudos de caso</span>
						<span class="svg_icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="21" height="14" viewBox="0 0 21 14" fill="none">
								<path d="M13.5135 13.4865L12.2618 12.3514L17.1807 7.81082H0V6.1892H17.1807L12.2618 1.64865L13.5135 0.513519L20.5405 7.00001L13.5135 13.4865Z" fill="white"/>
							</svg>
						</span>
					</a>
				</div>

			</div>
		</div>
	</section>

	<!-- About Us Section -->
	<section class="about_section">
		<div class="container">
			<div class="row">

				<div class="site_content">
					<h4 class="sub_title">Manifesto</h4>
					<h2 class="title">A missão da nossa agência digital</h2>
				</div>

				<div class="about_us_content_row">

					<!-- About Us Image -->
					<div class="about_us_image">
						<div class="img_box">
							<img src="/wp-content/themes/sonho/assets/images/about_us/earth.png" alt="earth_img" />
						</div>
					</div>

					<!-- About Us Content -->
					<div class="about_us_content">
						<p>Sonho é uma agência digital de alto padrão afiliada à BDA, criada para impulsionar a sua presença online e alavancar o seu negócio. Já colaboramos com mais de 50 países. Nossa equipe de especialistas é especializada no desenvolvimento de websites e nas mais recentes estratégias de marketing digital para ampliar a sua presença na internet e atrair o seu público-alvo. Trabalhamos com agências de marketing e criativas como parceiros de longo prazo para ajudá-las a se concentrar em suas principais tarefas.</p>
						<a href="#" class="btn">Saiba mais</a>

						<!-- About Us Author -->
						<div class="about_us_author">
							<h4 class="sub_title">Nossa equipe:</h4>
							<div class="img_box">
								<img src="/wp-content/themes/sonho/assets/images/about_us/about_us_author.png" alt="author_img" />
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- Contact Us Section -->
	<section class="contact_section">
		<div class="container">
			<div class="row">

				<div class="contact_container">

					<div class="contact_text contact-box">
						<h2>Conte-nos sobre seu projeto</h2>
						<p>Por favor, deixe seu endereço de e-mail e nossos gerentes entrarão em contato com você em breve.</p>
					</div>

					<div class="contact_form contact_box">
						<form action="" method="">

							<div class="form_row">
								<input type="email" placeholder="Seu e-mail" />
							</div>

							<div class="form_row form_btn">
								<button type="submit">Enviar</button>
							</div>

						</form>
						<p>Ao clicar no botão, você concorda com a Política de Privacidade.</p>
					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- Client Section -->
	<section class="client_section">
		<div class="container">
			<div class="row">

				<div class="site_content">
					<h4 class="sub_title">Clientes</h4>
					<h2 class="title">Parceiros</h2>
				</div>

				<!-- Client Logo -->
				<div class="client_logo_content">

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/European_Bank.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/CA_logo.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/small_giants.png" alt="client_logo_1" />
					</div>
					
					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/Juul_logo.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/privatundervisningen.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/parachute_logo.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/Capital_logo.png" alt="client_logo_1" />
					</div>

					<div class="client_logo_box">
						<img src="/wp-content/themes/sonho/assets/images/client_logo/Synlighet_logo.png" alt="client_logo_1" />
					</div>

				</div>

			</div>
		</div>
	</section>
	<section class="testimonial_section">
		<div class="container">
			<div class="row">

				<div class="site_content">

					<div class="content_box">
						<h4 class="sub_title">Avaliações</h4>
						<h2 class="title">O que dizem nossos clientes</h2>
					</div>

					<div class="content_arrow">
						<a href="#" class="arrow_btn prev">
							<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path class="circle" d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5Z" fill="#030303"/>
								<path d="M14.527 16.2163L13.7447 15.5068L16.819 12.669H6.08105V11.6555H16.819L13.7447 8.81761L14.527 8.10815L18.9189 12.1622L14.527 16.2163Z" fill="white"/>
							</svg>
						</a>
						<a href="#" class="arrow_btn next">
							<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path class="circle" d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5Z" fill="#030303"/>
								<path d="M14.527 16.2163L13.7447 15.5068L16.819 12.669H6.08105V11.6555H16.819L13.7447 8.81761L14.527 8.10815L18.9189 12.1622L14.527 16.2163Z" fill="white"/>
							</svg>
						</a>
					</div>
				</div>

				<div class="testimonial_slider">

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>Trabalho concluído como prometido! </h3>
								<p>Trabalho concluído como prometido! Além disso, eles me ajudaram a entender o mais claramente possível quais tarefas eram necessárias, o que foi muito útil. Obrigado!!!</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/jill_feeler.png" alt="jill_feeler" />
								</div>

								<div class="details_text">
									<p>Jill Feeler</p>
								</div>

							</div>

						</div>

					</div>

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>All members of the team communicated quickly and clearly...</h3>
								<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/christine_grene.png" alt="christine_grene" />
								</div>

								<div class="details_text">
									<p>Christine Green</p>
								</div>

							</div>

						</div>

					</div>

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>Trabalho concluído como prometido! </h3>
								<p>Trabalho concluído como prometido! Além disso, eles me ajudaram a entender o mais claramente possível quais tarefas eram necessárias, o que foi muito útil. Obrigado!!!</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/jill_feeler.png" alt="jill_feeler" />
								</div>

								<div class="details_text">
									<p>Jill Feeler</p>
								</div>

							</div>

						</div>

					</div>

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>All members of the team communicated quickly and clearly...</h3>
								<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/christine_grene.png" alt="christine_grene" />
								</div>

								<div class="details_text">
									<p>Christine Green</p>
								</div>

							</div>

						</div>

					</div>

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>Trabalho concluído como prometido! </h3>
								<p>Trabalho concluído como prometido! Além disso, eles me ajudaram a entender o mais claramente possível quais tarefas eram necessárias, o que foi muito útil. Obrigado!!!</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/jill_feeler.png" alt="jill_feeler" />
								</div>

								<div class="details_text">
									<p>Jill Feeler</p>
								</div>

							</div>

						</div>

					</div>

					<!-- loop -->
					<div class="item">

						<div class="testimonial_box">
							
							<div class="box_content">
								<h3>All members of the team communicated quickly and clearly...</h3>
								<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
							</div>

							<div class="testimonial_details">

								<div class="details_img">
									<img src="/wp-content/themes/sonho/assets/images/testimonail/christine_grene.png" alt="christine_grene" />
								</div>

								<div class="details_text">
									<p>Christine Green</p>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- Faq Section -->
	<script src="/wp-content/themes/sonho/js/faq.js"></script>
	<section class="faq_section">
		<div class="container">
			<div class="row">

				<div class="content_box">
					<h4 class="sub_title">Benefícios</h4>
					<h2 class="title">Melhores práticas de web design e desenvolvimento</h2>
					<a href="#" class="btn">Discutir projeto</a>
				</div>

				<div class="content_faq">
					
					<!-- loop -->
					<div class="faq_box">

						<a href="#faq_1">
							<span class="faq_text">1. Consultoria e estratégia digital</span>
							<span class="faq_svg">
								<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M-1.61732e-06 18.5C-2.51054e-06 8.28274 8.28273 2.51054e-06 18.5 1.61732e-06C28.7173 7.24099e-07 37 8.28273 37 18.5C37 28.7173 28.7173 37 18.5 37C8.28273 37 -7.24099e-07 28.7173 -1.61732e-06 18.5Z" fill="#030303"/>
									<path d="M24.6663 15.8333L17.9997 22.5L11.333 15.8333L12.5163 14.65L17.9997 20.1333L23.483 14.65L24.6663 15.8333Z" fill="white"/>
								</svg>
							</span>
						</a>

						<div class="faq_content">
							<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
							<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
						</div>

					</div>

					<!-- loop -->
					<div class="faq_box">

						<a href="#faq_1">
							<span class="faq_text">2. Web design moderno</span>
							<span class="faq_svg">
								<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M-1.61732e-06 18.5C-2.51054e-06 8.28274 8.28273 2.51054e-06 18.5 1.61732e-06C28.7173 7.24099e-07 37 8.28273 37 18.5C37 28.7173 28.7173 37 18.5 37C8.28273 37 -7.24099e-07 28.7173 -1.61732e-06 18.5Z" fill="#030303"/>
									<path d="M24.6663 15.8333L17.9997 22.5L11.333 15.8333L12.5163 14.65L17.9997 20.1333L23.483 14.65L24.6663 15.8333Z" fill="white"/>
								</svg>
							</span>
						</a>

						<div class="faq_content">
							<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
						</div>

					</div>

					<!-- loop -->
					<div class="faq_box">

						<a href="#faq_1">
							<span class="faq_text">3. Desenvolvimento Web de ponta</span>
							<span class="faq_svg">
								<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M-1.61732e-06 18.5C-2.51054e-06 8.28274 8.28273 2.51054e-06 18.5 1.61732e-06C28.7173 7.24099e-07 37 8.28273 37 18.5C37 28.7173 28.7173 37 18.5 37C8.28273 37 -7.24099e-07 28.7173 -1.61732e-06 18.5Z" fill="#030303"/>
									<path d="M24.6663 15.8333L17.9997 22.5L11.333 15.8333L12.5163 14.65L17.9997 20.1333L23.483 14.65L24.6663 15.8333Z" fill="white"/>
								</svg>
							</span>
						</a>

						<div class="faq_content">
							<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
						</div>

					</div>

					<!-- loop -->
					<div class="faq_box">

						<a href="#faq_1">
							<span class="faq_text">4. Suporte contínuo</span>
							<span class="faq_svg">
								<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M-1.61732e-06 18.5C-2.51054e-06 8.28274 8.28273 2.51054e-06 18.5 1.61732e-06C28.7173 7.24099e-07 37 8.28273 37 18.5C37 28.7173 28.7173 37 18.5 37C8.28273 37 -7.24099e-07 28.7173 -1.61732e-06 18.5Z" fill="#030303"/>
									<path d="M24.6663 15.8333L17.9997 22.5L11.333 15.8333L12.5163 14.65L17.9997 20.1333L23.483 14.65L24.6663 15.8333Z" fill="white"/>
								</svg>
							</span>
						</a>

						<div class="faq_content">
							<p>Todos os membros da equipe comunicaram de forma rápida e clara. Foi ótimo trabalhar com eles e eles completaram meu projeto rapidamente. Eu os contratarei novamente quando necessário.</p>
						</div>

					</div>

				</div>

				<a href="#" class="btn mobile_btn">Discutir projeto</a>

			</div>
		</div>
	</section>

	