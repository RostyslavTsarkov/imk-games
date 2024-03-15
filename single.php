<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) :
        the_post(); ?>
        <div class="header__img">
            <?php if ($img = get_field('post_header_image')) : ?>
                <?php echo wp_get_attachment_image($img, false, false, array('class' => 'header__featured-img stretched-img')); ?>
            <?php endif; ?>
            <div class="img-mask-black-50"></div>
        </div>
        <div class="header__title">
            <div class="grid-container">
                <div class="grid-x align-bottom">
                    <h2 class="page-title entry__title"><?php the_title(); ?></h2>
                </div>
            </div>
        </div>

        <main class="main-content">
            <div class="grid-container">
                <div class="grid-x grid-margin-x row-gap-60">
                    <!-- BEGIN of post content -->
                    <div class="large-8 cell">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <p class="entry__meta">
                                <?php echo sprintf(__('Written by %s on %s', 'fxy'), get_the_author_posts_link(), get_the_time('F j, Y')); ?>
                            </p>
                            <div class="entry__content clearfix">
                                <?php the_content('', true); ?>
                            </div>
                            <?php if (!is_singular('testimonial')) : ?>
                                <h6 class="entry__cat"><?php _e('Posted Under: ', 'fxy'); ?><?php the_category(', '); ?></h6>
                            <?php endif; ?>
                        </article>
                    </div>
                    <!-- END of post content -->

                    <!-- BEGIN of sidebar -->
                    <div class="large-4 cell sidebar">
                        <?php get_sidebar('right'); ?>
                    </div>
                    <!-- END of sidebar -->
                </div>
            </div>
        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
