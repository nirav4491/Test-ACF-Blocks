<?php
/**
 * Client Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title    = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$subtitle = ( ! empty( get_field( 'sub_title' ) ) ) ? get_field( 'sub_title' ) : 'Sub Title';
$clients  = get_field( 'clients' );
?>
<!-- Client Section -->
<section class="client_section">
	<div class="container">
		<div class="row">

			<div class="site_content">
				<h4 class="sub_title"><?php echo esc_html( $subtitle ); ?></h4>
				<h2 class="title"><?php echo esc_html( $title ); ?></h2>
			</div>
			<?php
			if ( ! empty( $clients ) ) {
				?>
				<!-- Client Logo -->
				<div class="client_logo_content">
					<?php
					foreach ( $clients as $client ) {
						$client_image_id  = $client['image'];
						$client_image_arr = wp_get_attachment_image_src( $client_image_id, 'full' );
						$client_image     = $client_image_arr[0];
						?>
						<div class="client_logo_box">
							<img src="<?php echo esc_url( $client_image ); ?>" alt="client_logo_1" />
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>