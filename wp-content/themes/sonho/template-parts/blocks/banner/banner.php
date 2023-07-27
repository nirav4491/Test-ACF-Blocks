<?php
/**
 * Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$bg_image_id = get_field('background_image');
$bg_image    = wp_get_attachment_image_src( $bg_image_id, 'full' );
$title       = get_field('title') ? get_field('title') : 'Title';
$sub_title   = get_field('sub_title') ? get_field('sub_title') : 'Sub Title';
$cta         = get_field('call_to_action');
$btn_text    = ( ! empty( $cta['title'] ) ) ? $cta['title'] : 'Call To Action';
$btn_link    = ( ! empty( $cta['url'] ) ) ? $cta['url'] : '#';
$link_target = ( ! empty( $cta['target'] ) ) ? $cta['target'] : '_self';
$after_cta   = get_field( 'after_call_to_action_text' ) ? get_field( 'after_call_to_action_text' ) : '';
$bottom_text = get_field( 'banner_bottom_text' );
?>
<!-- Banner Section -->
<section class="banner" style="background-image: url(<?php echo esc_url( $bg_image[0] ); ?>)">
	<div class="container">
		<div class="row">

			<!-- Banner Text -->
			<div class="banner_text">

				<h1><?php echo esc_html( $title ); ?></h1>
				<p><?php echo esc_html( $sub_title );?></p>
				<div class="banner_button">
					<a class="btn" href="<?php echo esc_attr( $btn_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $btn_text ); ?></a>
					<a href="javascript:;"><?php echo esc_html( $after_cta ); ?></a>
				</div>


			</div>

		</div>
	</div>
	<?php
	if ( ! empty( $bottom_text ) ) {
		?>
		<div class="banner_bottom">
			<div class="container">
				<div class="row">
					<div class="banner_bottom_text">
						<?php
						foreach ( $bottom_text as $text ) {
							?>
							<!-- Banner Text Loop -->
							<div class="banner_box">
								<a href=""><?php echo esc_html( $text['text']); ?></a>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</section>
