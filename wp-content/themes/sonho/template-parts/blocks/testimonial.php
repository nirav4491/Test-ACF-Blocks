<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title        = ( ! empty( get_field( 'title' ) ))? get_field( 'title' ) : 'Title';
$subtitle     = ( ! empty( get_field( 'sub_title' ) ) ) ? get_field( 'sub_title' ) : 'Sub Title';
$testimonials = get_field( 'testinmonials' );
?>
<section class="testimonial_section">
    <div class="container">
        <div class="row">

            <div class="site_content">

                <div class="content_box">
                    <h4 class="sub_title"><?php echo esc_html( $subtitle ); ?></h4>
                    <h2 class="title"><?php echo esc_html( $title ); ?></h2>
                </div>

                <div class="content_arrow">
                    <a href="#" class="arrow_btn prev">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="circle" d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5Z" fill="#030303"/>
                            <path d="M14.527 16.2163L13.7447 15.5068L16.819 12.669H6.08105V11.6555H16.819L13.7447 8.81761L14.527 8.10815L18.9189 12.1622L14.527 16.2163Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="#" class="arrow_btn next">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="circle" d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5Z" fill="#030303"/>
                            <path d="M14.527 16.2163L13.7447 15.5068L16.819 12.669H6.08105V11.6555H16.819L13.7447 8.81761L14.527 8.10815L18.9189 12.1622L14.527 16.2163Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php
            if ( ! empty( $testimonials ) ) {
                ?>
                <div class="testimonial_slider">
                    <?php
                    foreach ( $testimonials as $testimonial ) {
                        $title            = $testimonial['title'];
                        $description      = $testimonial['description'];
                        $author_image_id  = $testimonial['author_image'];
                        $author_image_arr = wp_get_attachment_image_src( $author_image_id, 'full' );
                        $author_image     = ( ! empty( $author_image_arr ) ) ? $author_image_arr[0] : get_template_directory_uri() . '/assets/images/default_avtar.jpg';
                        $author_name      = $testimonial['author_name'];
                        ?>
                        <!-- loop -->
                        <div class="item">

                            <div class="testimonial_box">
                                
                                <div class="box_content">
                                    <h3><?php echo esc_html( $title ); ?></h3>
                                    <p><?php echo esc_html( $description ); ?></p>
                                </div>

                                <div class="testimonial_details">

                                    <div class="details_img">
                                        <img src="<?php echo esc_url( $author_image ); ?>" alt="jill_feeler" />
                                    </div>

                                    <div class="details_text">
                                        <p><?php echo esc_html( $author_name ); ?></p>
                                    </div>

                                </div>

                            </div>
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