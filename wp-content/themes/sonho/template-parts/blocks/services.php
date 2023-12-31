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
$service_image       = ( ! empty( $service_image_arr ) ) ? $service_image_arr[0] : get_template_directory_uri() . '/assets/images/default.png';
$service_title       = get_field( 'service_title' );
$service_heading     = get_field( 'heading' );
$service_description = get_field( 'description' );
$services            = get_field( 'services' );
?>
<!-- Services Section -->
<section class="service_section">
	<div class="container">
		<div class="row">

			<!-- Service Image -->
			<div class="service_image">
				<img src="<?php echo esc_url( $service_image ); ?>" alt="service_img" />
			</div>

			<!-- Service Details -->
			<div class="service_details">
				<h4 class="sub_title"><?php echo esc_html( $service_title ); ?></h4>
				<h2 class="title"><?php echo esc_html( $service_heading ); ?></h2>
				<p class="content"><?php echo esc_html( $service_description ); ?></p>
				<div class="details_box">
					<?php
					foreach ( $services as $service ) {
						$service_text    = ( ! empty( $service['service']['title'] ) ) ?  $service['service']['title'] : 'Call To Action';
						$service_link    = ( ! empty( $service['service']['url'] ) ) ? $service['service']['url'] : '#';
						$link_target     = ( ! empty( $service['service']['target'] ) ) ? $service['service']['target'] : '_self';
						?>
						<!-- loop -->
						<div class="box_row">
							<a href="<?php echo esc_attr( $service_link ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<span class="box_text"><?php echo esc_html( $service_text ); ?></span>
								<span class="box_icon">
									<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path class="circle" d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5Z" fill="#030303"/>
										<path d="M14.527 16.2163L13.7447 15.5068L16.819 12.669H6.08105V11.6555H16.819L13.7447 8.81761L14.527 8.10815L18.9189 12.1622L14.527 16.2163Z" fill="white"/>
									</svg>
								</span>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>

		</div>
	</div>
</section>
