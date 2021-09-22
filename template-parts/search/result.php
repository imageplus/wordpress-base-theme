<?php
    /**
     * Doing this allows the templates to be used with different content without duplicating the template
     *
     * @link https://developer.wordpress.org/reference/functions/get_template_part/
     */
    $values = [
        'button-label' => 'More Information',
        ...$args
    ];
?>

<article class="search-result <?= get_post_index() % 2 == 0 ? 'search-result--odd' : 'search-result--even'; ?>">

    <?php //Add the 150x150px thumbnail image if it is set on the post ?>
    <?php if(has_post_thumbnail()): ?>
        <div class="search-result__image-container">
            <?php
                /**
                 * This image is always lazy loaded irrelevant of the used settings in the admin
                 *
                 * @link https://developer.wordpress.org/reference/functions/the_post_thumbnail/
                 */
                the_post_thumbnail('thumbnail', ['class' => 'search-result__image', 'loading' => 'lazy']);
            ?>
        </div>
    <?php endif; ?>
    <div class="search-result__container">
        <h2 class="search-result__title"><?php the_title(); ?></h2>

        <div class="search-result__content"><?php the_excerpt(); ?></div>

        <div class="search-result__link-container">
            <?php //Any string used in the admin is passed through a translation function so string translations could be added to change it ?>
            <a href="<?php the_permalink(); ?>" class="search-result__link btn btn--transparent-primary"><?= __($values['button-label'], BT_DOMAIN); ?></a>
        </div>
    </div>
</article>