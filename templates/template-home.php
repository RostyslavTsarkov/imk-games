<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<!--HOME PAGE SLIDER-->
    <section class="hero-section">
    <?php if (shortcode_exists('slider')) {
        echo do_shortcode('[slider]');
    } ?>
</section>
<!--END of HOME PAGE SLIDER-->

<!-- BEGIN of tabs section -->
<section class="tabs-section" id="tabs">
    <div class="grid-container full">
        <div class="grid-x">
            <?php if ($top_tabs = get_field('home_top_tabs')) : ?>
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
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END of tabs section -->

<!-- BEGIN of side-nav section -->
<section class="side-nav-section" id="side-nav">
    <div class="grid-container">
        <div class="grid-x">
            <?php if ($side_tabs = get_field('home_side_tabs')) : ?>
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
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END of side-nav section -->

<!-- BEGIN of accordion section -->
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
            <?php if ($accordion = get_field('home_faq_accordion')) : ?>
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
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- END of accordion section -->

<!-- BEGIN of video section -->
<section class="video-section" id="video">
    <div class="grid-container">
        <div class="grid-x">

        </div>
    </div>
</section>
<!-- END of video section -->

<!-- BEGIN of slider section -->
<section class="slider-section" id="slider">
    <div class="grid-container">
        <div class="grid-x">

        </div>
    </div>
</section>
<!-- END of slider section -->

<!-- BEGIN of tables section -->
<section class="tables-section" id="tables">
    <div class="grid-container">
        <div class="grid-x">

        </div>
    </div>
</section>
<!-- END of tables section -->

<!-- BEGIN of blog section -->
<section class="blog-section" id="blog">
    <div class="grid-container">
        <div class="grid-x">

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
