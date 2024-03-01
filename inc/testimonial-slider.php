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
            <?php foreach ($testimonials as $post) :
                setup_postdata($post); ?>
                <div class="slick-slide home-slide">
                    <div class="testimonial-slide__avatar"
                        <?php if ($img = get_attached_img_url($post->ID, 'full_hd')) {
                            bg($img);
                        } ?>>
                    </div>
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
        </div><!-- END of  #home-slider-->
        <?php wp_reset_postdata();
    endif;
    wp_reset_query();

    return ob_get_clean();
});
