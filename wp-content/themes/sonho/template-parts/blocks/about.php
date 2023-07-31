<?php
/**
 * About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title             = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$subtitle          = ( ! empty( get_field( 'sub_title' ) ) ) ? get_field( 'sub_title' ) : 'Sub Title';
$description       = ( ! empty( get_field( 'description' ) ) ) ? get_field( 'description' ) : 'Description';
$image_id          = get_field( 'image' );
$image_arr         = wp_get_attachment_image_src( $image_id, 'full' );
$image             = ( ! empty( $image_arr ) ) ? $image_arr[0] : get_template_directory_uri() . '/assets/images/default.png';
$call_to_action    = ( ! empty( get_field( 'call_to_action' ) ) ) ? get_field( 'call_to_action' ) : array();
$btn_text          = ( ! empty( $call_to_action['title'] ) ) ? $call_to_action['title'] : 'Call To Action';
$btn_link          = ( ! empty( $call_to_action['url'] ) ) ? $call_to_action['url'] : '#';
$btn_target        = ( ! empty( $call_to_action['target'] ) ) ? $call_to_action['target'] : '_self';
$our_team_title    = ( ! empty( get_field( 'our_team_title' ) ) ) ? get_field( 'our_team_title' ) : 'Our Team';
$our_team          = get_field( 'our_team' );
?>
<!-- About Us Section -->
<section class="about_section">
	<div class="container">
		<div class="row">

			<div class="site_content">
				<h4 class="sub_title"><?php echo esc_html( $subtitle ); ?></h4>
				<h2 class="title"><?php echo esc_html( $title ); ?></h2>
			</div>

			<div class="about_us_content_row">

				<!-- About Us Image -->
				<div class="about_us_image">
					<div class="img_box">
						<img src="<?php echo esc_url( $image ); ?>" alt="earth_img" />
					</div>
				</div>

				<!-- About Us Content -->
				<div class="about_us_content">
					<p><?php echo esc_html( $description ); ?></p>
					<a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="btn"><?php echo esc_html( $btn_text ); ?></a>
					<?php
					if ( ! empty( $our_team ) ) {
						?>
						<!-- About Us Author -->
						<div class="about_us_author">
							<h4 class="sub_title"><?php echo esc_html( $our_team_title . ':' ); ?></h4>
							<div class="img_box">
								<?php
								foreach ( $our_team as $key => $team ) {
									$member_img_id  = $team['member'];
									$member_img_arr = wp_get_attachment_image_src( $member_img_id, 'full' );
									$member_img     = $member_img_arr[0];
									$zindex         = 99 - $key;
									?>
									<img src="<?php echo esc_url( $member_img ); ?>" alt="author_img" style="z-index:<?php echo esc_attr( $zindex ); ?>;margin-left:-20px;" />
									<?php
								}
								?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
