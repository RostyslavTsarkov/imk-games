<?php

// Testimonial Slider Shortcode
add_shortcode('testimonial-slider', function () {
    ob_start();
    ?>
    <script type="text/javascript">

        jQuery(document).on('ready', function() {
            var $homeSlider = jQuery('#testimonial-slider');
            if (typeof jQuery('body').slick === 'function') {
                $homeSlider.slick({
                    cssEase: 'ease',
                    fade: true,  // Cause trouble if used slidesToShow: more than one
                    // arrows: false,
                    dots: false,
                    infinite: true,
                    speed: 500,
                    autoplay: true,
                    pauseOnHover: true,
                    autoplaySpeed: 5000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    rows: 0, // Prevent generating extra markup
                    slide: '.slick-slide', // Cause trouble with responsive settings
                });
            }
        });
    </script>

    <?php
    if ($testimonials = get_field('home_featured_testimonials')) : ?>
        <div id="testimonial-slider" class="slick-slider home-slider">
            <?php if ($border = get_field('testimonial_slider_border_image')) : ?>
                <?php echo wp_get_attachment_image($border, false, false, array('class' => 'testimonial-slide__border-img')); ?>
            <?php endif; ?>
            <?php if ($substrate = get_field('testimonial_slider_substrate')) : ?>
                <?php echo wp_get_attachment_image($substrate, false, false, array('class' => 'testimonial-slide__substrate')); ?>
            <?php endif; ?>
            <?php foreach ($testimonials as $post) :
                setup_postdata($post); ?>
                <?php if ($avatar = get_attached_img_url($post->ID, 'full_hd')) : ?>
                    <?php echo wp_get_attachment_image(attachment_url_to_postid($avatar), false, false, array('class' => 'testimonial-slide__avatar')); ?>
                <?php endif; ?>
                <div class="slick-slide home-slide">
<!--                    <div class="home-slide__inner"</div>-->
                    <div class="grid-container home-slide__caption">
                        <div class="grid-x grid-margin-x">
                            <div class="cell">
                                <h3><?php echo get_the_title($post->ID); ?></h3>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if ($link = get_field('home_testimonials_archive_link')) : ?>
                <a class="testimonial-slide__button button" href="<?php echo esc_url($link['url']); ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
        </div><!-- END of  #home-slider-->
        <?php wp_reset_postdata();
    endif;
    wp_reset_query();

    return ob_get_clean();
});
