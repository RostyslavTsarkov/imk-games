<!-- BEGIN of Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('preview preview--' . get_post_type()); ?>>
    <div class="grid-x grid-margin-x">
        <?php if (has_post_thumbnail()) : ?>
            <div class="medium-4 small-12 cell text-center medium-text-left">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'preview__thumb')); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="cell auto">
            <h4 class="preview__title">
                <a href="<?php the_permalink(); ?>"
                   title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'fxy'), the_title_attribute('echo=0'))); ?>"
                   rel="bookmark"><?php echo get_the_title() ?: __('No title', 'fxy'); ?>
                </a>
            </h4>
            <?php if (is_sticky()) : ?>
                <span class="secondary label preview__sticky"><?php _e('Sticky', 'fxy'); ?></span>
            <?php endif; ?>
            <div class="preview__excerpt">
                <p class="preview__excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20);?>
                </p>
            </div>
            <p class="preview__meta">
                <?php echo sprintf(__('Written by %s on %s', 'fxy'), get_the_author_posts_link(), get_the_time('F j, Y')); ?>
            </p>
        </div>
    </div>
</article>
<!-- END of Post -->
