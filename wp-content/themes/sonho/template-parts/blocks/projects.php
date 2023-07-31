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
	'order'         => 'ASC',
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
<!-- Project Section -->
<section class="project_section">
	<div class="container">
		<div class="row">
			<div class="site_content">
				<h4 class="sub_title"><?php echo esc_html( $title );?></h4>
				<h2 class="title"><?php echo esc_html( $subtitle ); ?></h2>
			</div>
			<?php
			if ( ! empty( $projects ) ) {
				?>
				<div class="project_details">
					
					<div class="details_row">
					<?php
					foreach( $projects as $project ) {
						$project_title = $project->post_title;
						$project_cat   = get_the_terms( $project->ID, 'project_category' );
						$image_id  = get_post_thumbnail_id( $project->ID );
						$image_arr = wp_get_attachment_image_src( $image_id, 'full' );
						$image     = ( ! empty( $image_arr ) ) ? $image_arr[0] : get_template_directory_uri() . '/assets/images/default.png';
						?>
						<!-- Box Loop -->
						<div class="details_box">
							<!-- Details Image -->
							<div class="box_img">
								<img src="<?php echo esc_url( $image ); ?>" alt="project_img_1" />
							</div>
							<!-- Details Content -->
							<div class="box_content">
								<h3><?php echo esc_html( $project_title ); ?></h3>

								<!-- Details Tag -->
								<div class="box_tag">
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
						</div>
						<?php
					}
					?>
					</div>

					<?php
					$btn_text   = ( ! empty( $call_to_action['title'] ) ) ? $call_to_action['title'] : 'Call To Action';
					$btn_link   = ( ! empty( $call_to_action['url'] ) ) ? $call_to_action['url'] : '#';
					$btn_target = ( ! empty( $call_to_action['target'] ) ) ? $call_to_action['target'] : '_self';
					?>
					<a class="btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
						<span class="text"><?php echo esc_html( $btn_text ); ?></span>
						<span class="svg_icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="21" height="14" viewBox="0 0 21 14" fill="none">
								<path d="M13.5135 13.4865L12.2618 12.3514L17.1807 7.81082H0V6.1892H17.1807L12.2618 1.64865L13.5135 0.513519L20.5405 7.00001L13.5135 13.4865Z" fill="white"/>
							</svg>
						</span>
					</a>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
