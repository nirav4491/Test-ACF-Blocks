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
$link_target = $cta['target'] ? $cta['target'] : '_self';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="banner" style="background:url(<?php echo esc_url( $bg_image[0] ); ?>) no-repeat center center">
		<div class="banner-content">
			<h2><?php echo esc_html( $title ); ?></h2>
			<p><?php echo esc_html( $sub_title );?></p>
			<div class="banner-cta">
				<a href="<?php echo esc_attr( $btn_link ); ?>" class="btn btn-banner-cta" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $btn_text ); ?></a>
			</div>
		</div>
    </div>
</div>