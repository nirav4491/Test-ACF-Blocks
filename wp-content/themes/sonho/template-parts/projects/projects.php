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
<section class="projects">
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
