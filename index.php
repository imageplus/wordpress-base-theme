<?php get_header(); ?>

<?php get_template_part('template-parts/partials/page-header'); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <?php
            //attempt to include a content template for the post type, if it doesn't exist use the generic one
            if(get_template_part('template-parts/' . get_post_type() . '/result', 'single') === false) {
                get_template_part('template-parts/generic-content/result', 'single');
            }
        ?>
    <?php endwhile; ?>
<?php else: ?>
    <?php
        //attempt to include a no result template for the post type, if it doesn't exist use the generic one
        if(get_template_part('template-parts/' . get_post_type() . '/no-result', 'single') === false) {
            get_template_part('template-parts/generic-content/no-result', 'single');
        }
    ?>
<?php endif; ?>

<?php get_footer(); ?>