<?php
/**
 * Archive
 *
 * Standard loop for the archive page
 */
get_header(); ?>

<div class="header__img">
    <?php if ($img = get_field('archive_featured_image', 'options')) : ?>
        <?php echo wp_get_attachment_image($img, false, false, array('class' => 'header__featured-img stretched-img')); ?>
    <?php endif; ?>
    <div class="img-mask-black-50"></div>
</div>
<div class="header__title">
    <div class="grid-container">
        <div class="grid-x align-bottom">
            <h2 class="page-title page-title--category"><?php echo get_the_archive_title(); ?></h2>
        </div>
    </div>
</div>

<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-margin-x row-gap-60 posts-list">
            <!-- BEGIN of Archive Content -->
            <div class="large-8 cell">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <?php get_template_part('parts/loop', 'post'); // Post item?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- BEGIN of pagination -->
                <?php foundation_pagination(); ?>
                <!-- END of pagination -->
            </div>
            <!-- END of Archive Content -->
            <!-- BEGIN of Sidebar -->
            <div class="large-4 cell sidebar">
                <?php get_sidebar('right'); ?>
            </div>
            <!-- END of Sidebar -->
        </div>
    </div>
</main>


<?php get_footer(); ?>
