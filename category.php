<?php
/**
 * Category
 *
 * Standard loop for the category page
 */
get_header(); ?>

<div class="header__img">
    <?php if ($img = get_field('category_featured_image', 'options')) : ?>
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
        <div class="grid-x grid-margin-x">
            <!-- BEGIN Category Content -->
            <div class="large-8 medium-8 small-12 cell posts-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?><!-- BEGIN of Post -->
                        <?php get_template_part('parts/loop', 'post'); // Post item?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- BEGIN of pagination -->
                <?php foundation_pagination(); ?>
                <!-- END of pagination -->
            </div>
            <!-- END Category Content -->
            <!-- BEGIN of Sidebar -->
            <div class="large-4 medium-4 small-12 cell sidebar">
                <?php get_sidebar('right'); ?>
            </div>
            <!-- END of Sidebar -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
