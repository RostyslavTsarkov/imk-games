<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<!--HOME PAGE SLIDER-->
<?php if (get_posts(array('post_type' => 'slider'))) : ?>
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
                    <?php $is_first_tab = true; ?>
                    <?php foreach ($top_tabs as $i => $tab) : ?>
                        <?php if ($title = $tab['title']) : ?>
                            <li class="tabs-title
                                <?php if ($is_first_tab) {
                                    $is_first_tab = false;
                                    echo 'is-active';
                                } else {
                                    echo '';
                                } ?>">
                                <a class="tabs-title-link" href="#panel<?php echo $i?>h" <?php echo ($i == 0) ? 'aria-selected="true"' : ''; ?>>
                                    <?php echo $title; ?>
                                </a>
                             </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- END of tabs layout for small -->

        <!-- BEGIN of tabs layout for large -->
        <div class="show-for-large">
            <ul class="tabs" data-tabs id="top-tabs">
                <?php $is_first_tab = true; ?>
                <?php foreach ($top_tabs as $i => $tab) : ?>
                    <?php if ($title = $tab['title']) : ?>
                        <li class="tabs-title
                            <?php if ($is_first_tab) {
                                $is_first_tab = false;
                                echo 'is-active';
                            } else {
                                echo '';
                            } ?>">
                            <a class="tabs-title-link" href="#panel<?php echo $i?>h" <?php echo ($i == 0) ? 'aria-selected="true"' : ''; ?>>
                                <?php echo $title; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- END of tabs layout for large -->

        <div class="tabs-content rel-content" data-tabs-content="top-tabs">
            <?php $is_first_panel = true; ?>
            <?php foreach ($top_tabs as $i => $tab) :
                if ($tab['title'] != '') : ?>
                <div class="tabs-panel
                    <?php if ($is_first_panel) {
                        $is_first_panel = false;
                        echo 'is-active';
                    } else {
                        echo '';
                    } ?>"
                     id="panel<?php echo $i?>h">
                    <div class="grid-x row-gap-60">
                        <div class="cell large-8">
                            <?php if ($contant = $tab['main_content']) : ?>
                                <div class="grid-x tabs-panel__main-content">
                                    <div class="cell large-6 main-content__text rel-content">
                                        <?php echo $contant; ?>
                                    </div>
                                    <?php if ($link = $tab['link']) : ?>
                                        <div class="cell large-9">
                                            <a class="button large alt expanded"
                                               href="<?php echo $link['url']; ?>">
                                                <?php echo $link['title']; ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="cell large-4 tabs-panel__side-content rel-content">
                            <?php if ($contant = $tab['side_content']) : ?>
                                <div class="grid-x">
                                    <div class="cell large-offset-4 large-8">
                                        <?php echo $tab['side_content']; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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
                    <?php $is_first_tab = true; ?>
                    <?php foreach ($side_tabs as $i => $tab) : ?>
                        <?php if ($title = $tab['title']) : ?>
                            <li class="tabs-title
                                <?php if ($is_first_tab) {
                                    echo 'is-active';
                                } else {
                                    echo '';
                                } ?>">
                                    <a href="#panel<?php echo $i?>v"
                                    <?php if ($is_first_tab) {
                                        $is_first_tab = false;
                                        echo 'aria-selected="true"';
                                    } else {
                                        echo '';
                                    } ?>>
                                        <?php echo $title; ?>
                                    </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="cell large-offset-1 large-8">
                <div class="tabs-content vertical" data-tabs-content="side-nav-tabs">
                    <?php $is_first_panel = true; ?>
                    <?php foreach ($side_tabs as $i => $tab) : ?>
                        <?php if ($title = $tab['title']) : ?>
                            <?php if ($contant = $tab['content']) : ?>
                                <div class="tabs-panel
                                    <?php if ($is_first_panel) {
                                        $is_first_panel = false;
                                        echo 'is-active';
                                    } else {
                                        echo '';
                                    } ?>"
                                     id="panel<?php echo $i?>v">
                                    <?php echo $tab['content']; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
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
                    if ($title = $item['title']) : ?>
                        <li class="accordion-item <?php echo ($i == 0) ? 'is-active' : ''; ?>" data-accordion-item>
                            <a href="#" class="accordion-title text-uppercase"><?php echo $title; ?></a>
                            <?php if ($contant = $item['content']) : ?>
                                <div class="accordion-content" data-tab-content>
                                    <?php echo $contant; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
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
                    <img class="cover stretched-img" id="video-cover" src="<?php echo asset_path('images/decoration/video-cover.png') ?>">
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
                    <button class="play-button" id="video-play">
                        <img class="" src="<?php echo asset_path('images/decoration/play-button.png') ?>">
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of video section -->

<!-- BEGIN of slider section -->
<?php if ($testimonials = get_field('home_featured_testimonials')) : ?>
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

    <?php if ($order_table = get_field('home_order_table')) :
        $plans = $order_table['plans'];
        $choosed_plan_features = $order_table['plan_features'];
        $plans_amount = count($plans);
        $args = array(
        'taxonomy' => 'plan-feature',
        'fields' => 'ids',
        );
        $all_plan_features = get_terms($args); ?>

        <!-- BEGIN of order table for large -->
        <div class="show-for-large">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
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
                             <?php if ($choosed_plan_features) : ?>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- END of order table for large -->

        <!-- BEGIN of order table for small -->
        <div class="hide-for-large show-for-small">
            <div class="grid-container">
                <div class="grid-x row-gap-30">
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
                            <?php if ($choosed_plan_features) : ?>
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
                </div>
            </div>
        </div>
        <!-- END of order table for small -->
    <?php endif; ?>

    <?php if ($tablepress = get_field('home_tablepress')) : ?>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <div class="show-for-large">
                    <?php if ($shortcode = $tablepress['shortcode_desktop']) {
                        echo do_shortcode($shortcode);
                    } ?>
                </div>

                <div class="hide-for-large show-for-small">
                    <?php if ($shortcode = $tablepress['shortcode_mobile']) {
                        echo do_shortcode($shortcode);
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<!-- END of tables section -->

<!-- BEGIN of blog section -->
<?php if ($blog = get_field('home_blog')) : ?>
<section class="blog-section rel-content" id="blog">
    <div class="grid-container">
        <div class="grid-x rel-content">
            <img class="blog-section__side-decor left" src="<?php echo asset_path('images/decoration/blog-left.png') ?>">
            <img class="blog-section__side-decor right" src="<?php echo asset_path('images/decoration/blog-right.png') ?>">
            <?php if ($title = $blog['title']) : ?>
                <div class="cell text-center rel-content">
                    <img class="blog-section__title-decor left" src="<?php echo asset_path('images/decoration/title-decor.png') ?>">
                    <h3 class="blog-section__title"><?php echo $title; ?></h3>
                    <img class="blog-section__title-decor right" src="<?php echo asset_path('images/decoration/title-decor.png') ?>">
                </div>
            <?php endif; ?>

            <?php $amount = $blog['posts_amount'];
            $posts = new WP_Query([
                'post_type' => 'post',
                'order' => 'DESC',
                'posts_per_page' => $amount,
            ]); ?>

            <?php if ($posts->have_posts()) : ?>
            <div class="cell">
                <div class="post-list grid-x grid-margin-x row-gap-90 column-gap-90 xxlarge-up-2 xlarge-up-1 align-center"
                    <?php while ($posts->have_posts()) :
                        $posts->the_post();
                        echo get_template_part('parts/loop', 'home-post');
                    endwhile; ?>
            </div>
            <?php endif;
            wp_reset_query();?>

            <?php if ($link = $blog['link']) : ?>
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
    <img class="blog-section__bottom-decor" src="<?php echo asset_path('images/decoration/blog-bottom.png') ?>">
</section>
<?php endif; ?>
<!-- END of blog section -->

<!-- BEGIN of contacts section -->
<?php if ($contact_form = get_field('home_contact')) : ?>
<section class="contacts-section rel-content" id="contacts">
    <img class="contacts-section__side-decor left" src="<?php echo asset_path('images/decoration/contact-left.png') ?>">
    <img class="contacts-section__side-decor right" src="<?php echo asset_path('images/decoration/contact-right.png') ?>">
    <?php if ($bg_img = $contact_form['background_image']) : ?>
        <?php echo wp_get_attachment_image($bg_img, false, false, array('class' => 'contacts-section__img stretched-img')); ?>
    <?php endif; ?>
    <div class="grid-container rel-content">
        <div class="contact-form">
            <?php if ($title = $contact_form['title']) : ?>
                <div class="cell xxxlarge-4 large-6">
                    <h2 class="contacts-section__title text-center"><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>
            <?php if ($gf_id = $contact_form['form']) : ?>
                <div class="cell xxxlarge-4 large-6">
                    <?php gravity_form($gf_id['id'], false, false, false, '', true, 1); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- END of contacts section -->

<?php get_footer(); ?>
