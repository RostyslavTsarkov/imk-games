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
        <div id="testimonial-slider" class="slick-slider home-slider testimonial-slider">
            <?php if ($border = get_field('testimonial_slider_border_image')) : ?>
                <?php echo wp_get_attachment_image($border, false, false, array('class' => 'testimonial-slider__border-img')); ?>
            <?php endif; ?>
            <?php if ($substrate = get_field('testimonial_slider_substrate')) : ?>
                <?php echo wp_get_attachment_image($substrate, false, false, array('class' => 'testimonial-slider__substrate')); ?>
            <?php endif; ?>
            <?php foreach ($testimonials as $post) :
                setup_postdata($post); ?>
                <div class="slick-slide home-slide">
                    <?php if ($avatar = get_post_thumbnail_id($post->ID)) : ?>
                        <?php echo wp_get_attachment_image($avatar, 'medium', false, array('class' => 'testimonial-slider__avatar')); ?>
                    <?php endif; ?>
                    <div class="home-slide__inner">
                        <div class="grid-container home-slide__caption">
                            <div class="grid-x grid-margin-x">
                                <div class="cell text-center">
                                    <div class="grid-y row-gap-60 row-gap-25-medium align-justify align-middle">
                                        <h3>
                                            <?php echo get_the_title($post->ID); ?>
                                        </h3>
                                        <div class="testimonial-slider__decor"></div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            wp_reset_postdata();
            if ($link = get_field('home_testimonials_archive_link')) : ?>
                <a class="testimonial-slider__button button"
                   href="<?php echo esc_url($link['url']); ?>">
                    <?php echo $link['title']; ?>
                </a>
            <?php endif; ?>
        </div><!-- END of  #testimonial-slider-->
        <?php
    endif;

    return ob_get_clean();
});
