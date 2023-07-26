<?php
/**
 * Service Block Template.
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

$service_image_id    = get_field( 'service_image' );
$service_image_arr   = wp_get_attachment_image_src( $service_image_id, 'full' );
$service_image       = $service_image_arr[0];
$service_title       = get_field( 'service_title' );
$service_heading     = get_field( 'heading' );
$service_description = get_field( 'description' );
$services            = get_field( 'services' );
?>
<!-- Banner Section -->
<section class="services">
	<div class="container">
		<div class="row">
			<div class="services_left">
				<img src="<?php echo esc_url( $service_image ); ?>" alt="service image">
			</div>
			<div class="services_right">
				<h6><?php echo esc_html( $service_title ); ?></h6>
				<h3><?php echo esc_html( $service_heading ); ?></h3>
				<p><?php echo esc_html( $service_description ); ?></p>
				<div class="service_list">
					<?php
					foreach ( $services as $service ) {
						$service_text    = ( ! empty( $service['service']['title'] ) ) ?  $service['service']['title'] : 'Call To Action';
						$service_link    = ( ! empty( $service['service']['url'] ) ) ? $service['service']['url'] : '#';
						$link_target     = ( ! empty( $service['service']['target'] ) ) ? $service['service']['target'] : '_self';
						?>
						<a class="btn" href="<?php echo esc_attr( $service_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $service_text ); ?></a>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
