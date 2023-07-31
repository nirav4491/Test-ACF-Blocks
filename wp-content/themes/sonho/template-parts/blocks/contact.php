<?php
/**
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title                    = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$description              = ( ! empty( get_field( 'description' ) ) ) ? get_field( 'description' ) : 'Description';
$contact_form             = get_field( 'contact_form' );
$contact_form_bottom_text = ( ! empty( get_field( 'contact_form_bottom_text' ) ) ) ? get_field( 'contact_form_bottom_text' ) : '';
?>

<!-- Contact Us Section -->
<section class="contact_section">
	<div class="container">
		<div class="row">

			<div class="contact_container">

				<div class="contact_text contact-box">
					<h2><?php echo esc_html( $title ); ?></h2>
					<p><?php echo esc_html( $description ); ?></p>
				</div>

				<?php 
				if ( ! empty( $contact_form ) ) {
					?>
					<div class="contact_form contact_box">
						<?php echo do_shortcode('[wpforms id="' . $contact_form . '"]'); ?>
						<p><?php echo esc_html( $contact_form_bottom_text ); ?></p>
					</div>
					<?php
				}
				?>
				

			</div>

		</div>
	</div>
</section>
