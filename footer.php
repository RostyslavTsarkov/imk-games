<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x row-gap-60">
            <div class="cell large-2">
                <div class="footer__logo">
                    <?php if ($footer_logo = get_field('footer_logo', 'options')) :
                        echo wp_get_attachment_image($footer_logo['id'], 'medium');
                    else :
                        show_custom_logo();
                    endif; ?>
                </div>
            </div>
            <div class="cell xlarge-offset-1 large-2">
                <div class="grid-x row-gap-60 row-gap-25-medium">
                    <?php if (has_nav_menu('footer-menu')) : ?>
                        <div class="cell">
                            <h6 class="footer__title">
                                <?php echo wp_get_nav_menu_name('footer-menu'); ?>
                            </h6>
                        </div>
                        <div class="cell">
                            <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'depth' => 1)); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cell large-2">
                <div class="grid-x row-gap-60 row-gap-25-medium">
                    <?php if (has_nav_menu('footer-menu-2')) : ?>
                        <div class="cell">
                            <h6 class="footer__title">
                                <?php echo wp_get_nav_menu_name('footer-menu-2'); ?>
                            </h6>
                        </div>
                        <div class="cell">
                            <?php wp_nav_menu(array('theme_location' => 'footer-menu-2', 'menu_class' => 'footer-menu', 'depth' => 1)); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cell large-2">
                <div class="grid-x row-gap-60 row-gap-25-medium">
                    <?php if (has_nav_menu('footer-menu-3')) : ?>
                        <div class="cell">
                            <h6 class="footer__title">
                                <?php echo wp_get_nav_menu_name('footer-menu-3'); ?>
                            </h6>
                        </div>
                        <div class="cell">
                            <?php wp_nav_menu(array('theme_location' => 'footer-menu-3', 'menu_class' => 'footer-menu', 'depth' => 1)); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cell large-3 footer__sp">
                <div class="grid-y row-gap-60 row-gap-25-medium">
                    <?php if (get_field('socials', 'options')) : ?>
                    <div class="cell">
                        <?php if ($socials_title = get_field('footer_socials_title', 'options')) : ?>
                            <h6 class="footer__title">
                                <?php echo $socials_title; ?>
                            </h6>
                        <?php endif; ?>
                    </div>
                    <div class="cell large-8">
                        <?php get_template_part('parts/socials');?>
                    </div>
                    <?php endif; ?>
                    <?php if ($copyright = get_field('copyright', 'options')) : ?>
                        <div class="cell footer__copy large-8">
                            <div class="grid-x grid-margin-x ">
                                <div class="cell">
                                    <?php echo $copyright; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
