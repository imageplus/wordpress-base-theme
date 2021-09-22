<?php get_header(); ?>

<?php
    get_template_part('template-parts/partials/page-header', null, [
        'title' => get_the_archive_title()
    ]);
?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <?php
            //attempt to include a content template for the post type, if it doesn't exist use the generic one
            if(get_template_part('template-parts/' . get_post_type() . '/result', 'archive') === false) {
                get_template_part('template-parts/generic-content/result', 'archive');
            }
        ?>
    <?php endwhile; ?>
<?php else: ?>
    <?php
        //attempt to include a no result template for the post type, if it doesn't exist use the generic one
        if(get_template_part('template-parts/' . get_post_type() . '/no-result', 'archive') === false) {
            get_template_part('template-parts/generic-content/no-result', 'archive');
        }
    ?>
<?php endif; ?>

<?php get_footer(); ?>