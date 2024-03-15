<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<!--START Home featured image-->
<?php if (get_post_thumbnail_id()) : ?>
    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full_hd', false, array('class' => 'home__featured-img stretched-img')); ?>
<?php endif; ?>
<!--END Home featured image-->

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
    <div class="grid-container">

        <!-- BEGIN of tabs layout for small -->
        <div class="hide-for-large show-for-small">
            <a class="button tabs-dropdown" type="button" data-toggle="small-tabs">
                <span></span>
                <i class="fa-solid fa-angle-down"></i>
            </a>
            <div class="dropdown-pane" id="small-tabs" data-dropdown data-auto-focus="true">
                <ul class="" data-tabs id="top-tabs">
                    <?php foreach ($top_tabs as $i => $tab) :
                        if ($i == 0) : ?>
                            <li class="tabs-title is-active">
                                <a class="tabs-title-link" href="#panel<?php echo $i?>h" aria-selected="true">
                        <?php else : ?>
                             <li class="tabs-title">
                                <a class="tabs-title-link" href="#panel<?php echo $i?>h">
                        <?php endif; ?>
                        <?php echo $tab['title']; ?>
                                </a>
                             </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- END of tabs layout for large -->

        <!-- BEGIN of tabs layout for large -->
        <div class="show-for-large">
            <ul class="tabs" data-tabs id="top-tabs">
                <?php foreach ($top_tabs as $i => $tab) :
                    if ($i == 0) : ?>
                        <li class="tabs-title is-active">
                            <a href="#panel<?php echo $i?>h" aria-selected="true">
                    <?php else : ?>
                        <li class="tabs-title">
                            <a href="#panel<?php echo $i?>h">
                    <?php endif; ?>
                                <?php echo $tab['title']; ?>
                            </a>
                        </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- END of tabs layout for large -->

        <div class="tabs-content rel-content" data-tabs-content="top-tabs">
            <?php foreach ($top_tabs as $i => $tab) :
                if ($i == 0) : ?>
                    <div class="tabs-panel is-active"
                <?php else : ?>
                    <div class="tabs-panel"
                <?php endif; ?>
                    id="panel<?php echo $i?>h">
                    <div class="grid-x row-gap-60">
                        <div class="cell large-8">
                            <div class="grid-x tabs-panel__main-content">
                                <div class="cell large-6 main-content__text rel-content">
                                    <?php echo $tab['main_content']; ?>
                                </div>
                                <div class="cell large-9">
                                    <a class="button large alt expanded"
                                       href="<?php echo $tab['link']['url']; ?>">
                                        <?php echo $tab['link']['title']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cell large-4 tabs-panel__side-content rel-content">
                            <div class="grid-x">
                                <div class="cell large-offset-4 large-8">
                                    <?php echo $tab['side_content']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
            <div class="cell large-3">
                <ul class="tabs vertical" data-responsive-accordion-tabs="accordion large-tabs" id="side-nav-tabs">
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
            <div class="cell large-offset-1 large-8">
                <div class="tabs-content vertical" data-tabs-content="side-nav-tabs">
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
                <div class="cell text-center">
                    <h3 class="accordion-section__title">
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
                        <a href="#" class="accordion-title text-uppercase"><?php echo $item['title']; ?></a>
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
                <div class="responsive-embed custom rel-content">
                    <?php if ($cover = get_field('home_video_cover')) : ?>
                        <?php echo wp_get_attachment_image($cover, false, false, array('class' => 'cover stretched-img', 'id' => 'video-cover')); ?>
                    <?php endif; ?>
                    <video id="player" width="1440" height="850"
                           src="<?php echo $video; ?>"
                           frameborder="0"
                           allowfullscreen
                           preload="none"
                           muted="muted"
                           <?php if ($placeholder = get_field('home_video_placeholder')) : ?>
                               poster="<?php echo $placeholder; ?>"
                           <?php endif; ?>>
                    </video>
                    <?php if ($button = get_field('home_video_play_button')) : ?>
                        <button class="play-button" id="video-play">
                            <?php echo wp_get_attachment_image($button, false, false, array('class' => '')); ?>
                        </button>
                    <?php endif; ?>
                </div>
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

<!-- BEGIN of tables section -->
<section class="tables-section" id="tables">
    <?php if ($bg_img = get_field('home_plans_background_image')) : ?>
        <?php echo wp_get_attachment_image($bg_img, false, false, array('class' => 'tables__bg-img')); ?>
    <?php endif; ?>

    <!-- BEGIN of order table for large -->
    <div class="show-for-large">
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
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php foreach ($plans as $i => $plan) :
                                        $bg_color = $i != count($plans) - 1 ? 'default' : 'special' ?>
                                        <th class="plan-cell text-uppercase <?php echo $bg_color; ?>"><?php echo get_the_title($plan->ID); ?></th>
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
                                        foreach ($plans as $i => $plan) :
                                            $plan_features = get_the_terms($plan->ID, 'plan-feature');
                                            $plan_features_ids = array_column($plan_features, 'term_id');
                                            $bg_color = $i != count($plans) - 1 ? 'default' : 'special' ?>
                                        <td class="plan-cell text-center <?php echo $bg_color; ?>">
                                            <?php if (in_array($choosed_feature, $plan_features_ids)) : ?>
                                                <span class="fa-solid fa-check"></span>
                                            <?php else : ?>
                                                <span><?php _e('-', 'fwp')?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                             <?php endif; ?>
                            <tfoot>
                                <td></td>
                                <?php foreach ($plans as $i => $plan) :
                                    $bg_color = $i != count($plans) - 1 ? 'default' : 'special' ?>
                                    <?php if ($link = get_field('plan_order_link', $plan)) : ?>
                                        <td class="plan-cell text-uppercase text-center <?php echo $bg_color; ?>">
                                            <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                        </td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tfoot>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END of order table for large -->

    <!-- BEGIN of order table for small -->
    <div class="hide-for-large show-for-small">
        <div class="grid-container">
            <div class="grid-x row-gap-30">

                    <?php if ($plans = get_field('home_plans')) :
                        $plans_amount = count($plans);
                        $args = array(
                            'taxonomy' => 'plan-feature',
                            'fields' => 'ids',
                        );
                        $all_plan_features = get_terms($args); ?>

                        <?php foreach ($plans as $i => $plan) :
                            $bg_color = $i != count($plans) - 1 ? 'default' : 'special' ?>

                            <table class="order-table cell">
                                <thead>
                                    <tr>
                                        <th class="plan-cell text-uppercase text-center <?php echo $bg_color ?>">
                                            <?php echo get_the_title($plan->ID); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <?php if ($choosed_plan_features = get_field('home_plan_features')) : ?>
                                    <tbody>
                                        <?php foreach ($choosed_plan_features as $choosed_feature) : ?>
                                            <tr>
                                                <td class="grid-x align-justify"><?php echo get_term($choosed_feature)->name; ?>
                                                <?php $plan_features = get_the_terms($plan->ID, 'plan-feature');
                                                    $plan_features_ids = array_column($plan_features, 'term_id'); ?>
                                                        <?php if (in_array($choosed_feature, $plan_features_ids)) : ?>
                                                            <span class="fa-solid fa-check"></span>
                                                        <?php else : ?>
                                                            <span style="padding-right: 10px;"><?php _e('-', 'fwp')?></span>
                                                        <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                <?php endif; ?>
                                <tfoot>
                                    <tr>
                                        <?php if ($link = get_field('plan_order_link', $plan)) : ?>
                                            <td class="plan-cell text-uppercase text-center <?php echo $bg_color ?>">
                                                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php endforeach; ?>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- END of order table for small -->

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="show-for-large">
                    <?php echo do_shortcode('[table id=2/]') ?>
                </div>

                <div class="hide-for-large show-for-small">
                    <?php echo do_shortcode('[table id=3/]') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END of tables section -->

<!-- BEGIN of blog section -->
<section class="blog-section rel-content" id="blog">
    <div class="grid-container">
        <div class="grid-x rel-content">
            <?php if ($section_decor = get_field('home_blog_left_decoration')) : ?>
                <?php echo wp_get_attachment_image($section_decor, false, false, array('class' => 'blog-section__side-decor left')); ?>
            <?php endif; ?>
            <?php if ($section_decor = get_field('home_blog_right_decoration')) : ?>
                <?php echo wp_get_attachment_image($section_decor, false, false, array('class' => 'blog-section__side-decor right')); ?>
            <?php endif; ?>
            <?php if ($title = get_field('home_blog_title')) : ?>
                <div class="cell text-center rel-content">
                    <?php if ($title_decor = get_field('home_blog_title_decoration')) : ?>
                        <?php echo wp_get_attachment_image($title_decor, false, false, array('class' => 'blog-section__title-decor left')); ?>
                    <?php endif; ?>
                    <h3 class="blog-section__title"><?php echo $title; ?></h3>
                    <?php if ($title_decor) : ?>
                        <?php echo wp_get_attachment_image($title_decor, false, false, array('class' => 'blog-section__title-decor right')); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($posts = get_field('home_blog_featured_posts')) : ?>
                <div class="cell">
                    <div class="post-list grid-x row-gap-90 row-gap-25-medium column-gap-90 large-up-2 medium-up-1 medium-offset-1 medium-10 align-center"
                     <?php foreach ($posts as $post) {
                            setup_postdata($post);
                            get_template_part('parts/loop', 'home-post');
                     }
                     wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
            <?php if ($link = get_field('home_blog_link')) : ?>
                <div class="cell medium-offset-1 medium-10">
                    <div class="grid-x align-center">
                        <a class="button large expanded" href="<?php echo $link['url']; ?>">
                            <?php echo $link['title']; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($section_decor = get_field('home_blog_bottom_decoration')) : ?>
        <?php echo wp_get_attachment_image($section_decor, false, false, array('class' => 'blog-section__bottom-decor')); ?>
    <?php endif; ?>
</section>
<!-- END of blog section -->

<!-- BEGIN of contacts section -->
<section class="contacts-section rel-content" id="contacts">
    <?php if ($section_decor = get_field('home_contact_left_decoration')) : ?>
        <?php echo wp_get_attachment_image($section_decor, false, false, array('class' => 'contacts-section__side-decor left')); ?>
    <?php endif; ?>
    <?php if ($section_decor = get_field('home_contact_right_decoration')) : ?>
        <?php echo wp_get_attachment_image($section_decor, false, false, array('class' => 'contacts-section__side-decor right')); ?>
    <?php endif; ?>
    <?php if ($bg_img = get_field('home_contact_background_image')) : ?>
        <?php echo wp_get_attachment_image($bg_img, false, false, array('class' => 'contacts-section__img stretched-img')); ?>
    <?php endif; ?>
    <div class="grid-container rel-content">
        <div class="contact-form">
            <?php if ($title = get_field('home_contact_title')) : ?>
                <div class="cell xxxlarge-4 large-6">
                    <h2 class="contacts-section__title text-center"><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>
            <?php if ($gf_id = get_field('home_contact_form')) : ?>
                <div class="cell xxxlarge-4 large-6">
                    <?php gravity_form($gf_id['fields'][0]->formId, false, false, false, '', true, 1); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END of contacts section -->

<?php get_footer(); ?>
