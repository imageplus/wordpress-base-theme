<?php get_header(); ?>

<main class="container mx-auto">
    <?php
        /**
         * To keep consistency throughout pages as the header is usually similar if not the same
         * use the template to do this with parameters to modify it
         */
        get_template_part(
                'template-parts/partials/page-header',
                null,
                [
                    'title-class' => 'search-page__title',

                    //sprintf to append the search query into the translated string in place of %s
                    'title'       => sprintf(esc_html__('Search Results for: %s', BT_DOMAIN), '<span>' . get_search_query() . '</span>')
                ]
        );
    ?>

    <section class="search-input__container search-page__form">
        <?php get_search_form(); ?>
    </section>

    <section class="search-results">
        <?php if(have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/search/result'); ?>
            <?php endwhile; wp_reset_postdata(); ?>

            <?php the_posts_pagination(); ?>
        <?php else: ?>
            <?php get_template_part('template-parts/search/no-result'); ?>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
