<?php

/**
 * FAQ's Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title          = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$subtitle       = ( ! empty( get_field( 'sub_title' ) ) ) ? get_field( 'sub_title' ) : 'Sub Title';
$call_to_action = ( ! empty( get_field( 'call_to_action' ) ) ) ? get_field( 'call_to_action' ) : array();
$btn_text       = ( ! empty( $call_to_action['title'] ) ) ? $call_to_action['title'] : 'Call To Action';
$btn_link       = ( ! empty( $call_to_action['url'] ) ) ? $call_to_action['url'] : '#';
$btn_target     = ( ! empty( $call_to_action['target'] ) ) ? $call_to_action['target'] : '_self';
$faqs           = get_field( 'faqs' );
?>
<!-- Faq Section -->
<section class="faq_section">
	<div class="container">
		<div class="row">

			<div class="content_box">
				<h4 class="sub_title"><?php echo esc_html( $subtitle ); ?></h4>
				<h2 class="title"><?php echo esc_html( $title ); ?></h2>
				<a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="btn"><?php echo esc_html( $btn_text ); ?></a>
			</div>
			<?php
			if ( ! empty( $faqs ) ) {
				?>
				<div class="content_faq">
					<?php
					foreach ( $faqs as $key => $faq ) {
						$num = $key + 1;
						$question = $faq['question'];
						$answer   = $faq['answer'];
						?>
						<!-- loop -->
						<div class="faq_box">

							<a href="#faq_<?php echo $key; ?>">
								<span class="faq_text"><?php echo esc_html( $num . '. ' . $question ); ?></span>
								<span class="faq_svg">
									<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M-1.61732e-06 18.5C-2.51054e-06 8.28274 8.28273 2.51054e-06 18.5 1.61732e-06C28.7173 7.24099e-07 37 8.28273 37 18.5C37 28.7173 28.7173 37 18.5 37C8.28273 37 -7.24099e-07 28.7173 -1.61732e-06 18.5Z" fill="#030303"/>
										<path d="M24.6663 15.8333L17.9997 22.5L11.333 15.8333L12.5163 14.65L17.9997 20.1333L23.483 14.65L24.6663 15.8333Z" fill="white"/>
									</svg>
								</span>
							</a>

							<div class="faq_content">
								<?php echo wp_kses_post( $answer ); ?>
							</div>

						</div>
						<?php
					}
					?>
				</div>
				<?php
				}
			?>
			
			<a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>"  class="btn mobile_btn"><?php echo esc_html( $btn_text ); ?></a>

		</div>
	</div>
</section>