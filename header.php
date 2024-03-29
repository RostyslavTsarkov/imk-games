<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('no-outline fxy'); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
    <div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
    <div data-sticky-container>
        <div data-sticky data-options="marginTop:0;">
        <div class="grid-container menu-grid-container">
            <div class="grid-x grid-margin-x">
                <div class="xlarge-2 large-12 cell small-order-2 medium-order-1">
                    <div class="logo text-center xlarge-text-left">
                        <h1>
                            <?php show_custom_logo(); ?>
                            <span class="show-for-sr">
                                <?php echo get_bloginfo('name'); ?>
                            </span>
                        </h1>
                    </div>
                </div>
                <div class="xlarge-10 large-12 cell rel-content small-order-1 medium-order-2" data-smooth-scroll>
                    <?php $menu_location = is_front_page() ? 'header-menu' : 'header-menu-home'; ?>
                    <?php if (has_nav_menu($menu_location)) : ?>
                        <div class="title-bar hide-for-medium" data-responsive-toggle="main-menu" data-hide-for="medium">
                            <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                                <span></span></button>
                            <span class="title-bar-title">Menu</span>
                        </div>
                        <nav class="top-bar" id="main-menu">
                            <?php if ($decor = get_field('header_menu_decoration', 'options')) : ?>
                                <?php echo wp_get_attachment_image($decor, false, false, array('class' => 'top-bar__decor')); ?>
                            <?php endif; ?>
                            <?php wp_nav_menu(array(
                                'theme_location' => $menu_location,
                                'menu_class' => 'menu header-menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                                'walker' => new theme\FoundationNavigation()
                            )); ?>
                            <a class="search-toggle grid-x align-middle" href="#search" data-toggle-click="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <div class="grid-x align-right" data-toggle-block="search">
                                <?php get_search_form(); ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<!-- END of header -->
