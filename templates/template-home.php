<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<!--HOME PAGE SLIDER-->
<?php if (shortcode_exists('slider')) : ?>
<section class="hero-section">
    <?php echo do_shortcode('[slider]'); ?>
</section>
<?php endif; ?>
<!--END of HOME PAGE SLIDER-->

<!-- BEGIN of tabs section -->
<?php if ($top_tabs = get_field('home_top_tabs')) : ?>
<section class="tabs-section" id="tabs">
    <div class="grid-container full">
        <div class="grid-x">
            <ul class="tabs" data-tabs id="top-tabs">
                <?php foreach ($top_tabs as $i => $tab) :
                    if ($i == 0) : ?>
                        <li class="tabs-title is-active">
                            <a href="#panel<?php echo $i?>h" aria-selected="true">
                    <?php else : ?>
                        <li class="tabs-title">
                            <a href="#panel<?php echo $i?>h"">
                    <?php endif; ?>
                            <?php echo $tab['title']; ?>
                            </a>
                        </li>
                <?php endforeach; ?>
            </ul>
            <div class="tabs-content" data-tabs-content="top-tabs">
                <?php foreach ($top_tabs as $i => $tab) :
                    if ($i == 0) : ?>
                        <div class="tabs-panel is-active"
                    <?php else : ?>
                        <div class="tabs-panel"
                    <?php endif; ?>
                        id="panel<?php echo $i?>h">
                            <div class="grid-x">
                                <div class="cell medium-8">
                                    <?php echo $tab['main_content']; ?>
                                    <a class="button expanded"
                                        href="<?php echo $tab['link']['url']; ?>">
                                        <?php echo $tab['link']['title']; ?>
                                    </a>
                                </div>
                                <div class="cell medium-4">
                                    <?php echo $tab['side_content']; ?>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of tabs section -->

<!-- BEGIN of side-nav section -->
<?php if ($side_tabs = get_field('home_side_tabs')) : ?>
<section class="side-nav-section" id="side-nav">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell medium-3">
                <ul class="vertical tabs" data-tabs id="example-tabs">
                    <?php foreach ($side_tabs as $i => $tab) :
                        if ($i == 0) : ?>
                            <li class="tabs-title is-active">
                            <a href="#panel<?php echo $i?>v" aria-selected="true">
                        <?php else : ?>
                            <li class="tabs-title">
                            <a href="#panel<?php echo $i?>v">
                        <?php endif; ?>
                        <?php echo $tab['title']; ?>
                        </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="cell medium-9">
                <div class="tabs-content vertical" data-tabs-content="example-tabs">
                    <?php foreach ($side_tabs as $i => $tab) :
                        if ($i == 0) : ?>
                            <div class="tabs-panel is-active"
                        <?php else : ?>
                            <div class="tabs-panel"
                        <?php endif; ?>
                        id="panel<?php echo $i?>v">
                            <?php echo $tab['content']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of side-nav section -->

<!-- BEGIN of accordion section -->
<?php if ($accordion = get_field('home_faq_accordion')) : ?>
<section class="accordion-section" id="accordion">
    <div class="grid-container">
        <div class="grid-x">
            <?php if ($title = get_field('home_faq_title')) : ?>
                <div class="cell">
                    <h3 class="">
                        <?php echo $title; ?>
                    </h3>
                </div>
            <?php endif; ?>
            <ul class="accordion" data-accordion>
                <?php foreach ($accordion as $i => $item) :
                    if ($i == 0) : ?>
                        <li class="accordion-item is-active" data-accordion-item>
                    <?php else : ?>
                        <li class="accordion-item" data-accordion-item>
                    <?php endif; ?>
                        <a href="#" class="accordion-title"><?php echo $item['title']; ?></a>
                        <div class="accordion-content" data-tab-content>
                            <?php echo $item['content']; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of accordion section -->

<!-- BEGIN of video section -->
<?php if ($video = get_field('home_video_file')) : ?>
<section class="video-section" id="video">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <embed class="responsive-embed widescreen">
                    <iframe width="1440" height="890" src="<?php echo $video; ?>"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </embed>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of video section -->

<!-- BEGIN of slider section -->
<?php if (shortcode_exists('testimonial-slider')) : ?>
<section class="slider-section" id="slider">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php echo do_shortcode('[testimonial-slider]'); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of slider section -->

<!-- BEGIN of order table section -->
<section class="order-table-section" id="tables">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php if ($plans = get_field('home_plans')) :
                    $plans_amount = count($plans);
                    $args = array(
                        'taxonomy' => 'plan-feature',
                        'fields' => 'ids',
                    );
                    $all_plan_features = get_terms($args); ?>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <?php foreach ($plans as $plan) : ?>
                                <th><?php echo get_the_title($plan->ID); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                     <?php if ($choosed_plan_features = get_field('home_plan_features')) : ?>
                        <tbody>
                            <?php
                            foreach ($choosed_plan_features as $choosed_feature) : ?>
                            <tr>
                                <td><?php echo get_term($choosed_feature)->name; ?></td>
                                <?php
                                foreach ($plans as $plan) :
                                    $plan_features = get_the_terms($plan->ID, 'plan-feature');
                                    $plan_features_ids = array_column($plan_features, 'term_id');?>
                                <td>
                                    <?php if (in_array($choosed_feature, $plan_features_ids)) : ?>
                                        <span class="fa-solid fa-check"></span>
                                    <?php else : ?>
                                        <span class="fa-solid fa-minus"></span>
                                    <?php endif; ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                     <?php endif; ?>
                    <tfoot>
                        <tr>
                            <td></td>
                            <?php foreach ($plans as $plan) : ?>
                                <?php if ($link = get_field('plan_order_link', $plan)) : ?>
                                    <td><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </tfoot>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END of order table section -->

<!-- BEGIN of projects table section -->
<?php if (shortcode_exists('table')) : ?>
<section class="projects-table-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php do_shortcode('[table id=2 responsive="collapse" /]') ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of projects table section -->

<!-- BEGIN of blog section -->
<section class="blog-section" id="blog">
    <div class="grid-container">
        <div class="grid-x">
            <?php if ($title = get_field('home_blog_title')) : ?>
                <div class="cell">
                    <h3><?php echo $title; ?></h3>
                </div>
            <?php endif; ?>
            <?php if ($posts = get_field('home_blog_featured_posts')) : ?>
                <div class="cell">
                     <?php foreach ($posts as $post) {
                            setup_postdata($post);
                            get_template_part('parts/loop', 'home-post');
                     }
                     wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
            <?php if ($link = get_field('home_blog_link')) : ?>
                <div class="cell">
                    <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END of blog section -->

<!-- BEGIN of contacts section -->
<section class="contacts-section" id="contacts">
    <div class="grid-container">
        <div class="grid-x">

        </div>
    </div>
</section>
<!-- END of contacts section -->

<?php get_footer(); ?>
