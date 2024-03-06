<!-- BEGIN of Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cell post-block preview preview--' . get_post_type()); ?>>
    <div class="grid-x grid-margin-x grid-margin-y">
        <div class="cell">
            <div class="preview__meta grid-x align-justify">
                <span><?php echo get_the_time('d.m'); ?></span>
                <span><?php echo get_the_time('Y'); ?></span>
            </div>
        </div>
        <div class="cell">
            <h5 class="preview__title">
                <a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'fxy'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php echo get_the_title() ?: __('No title', 'fxy'); ?>
                </a>
            </h5>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="cell">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium_large', array('class' => 'preview__thumb')); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="cell">
            <p class="preview__excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 20);?>
            </p>
        </div>
    </div>
</article>
<!-- END of Post -->
