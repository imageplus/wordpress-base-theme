<?php
/**
 * To keep consistency throughout pages as the header is usually similar if not the same it's best to use something
 * generic so if it needs to be modified it's in a single place.
 *
 * Make use of arguments <$args> for any simple changes to the templates as this will prevent duplication of templates
 * and layouts
 */
?>

<h1 class="page__title <?= $args['title-class'] ?? null; ?>">
    <?php
        if(isset($args['title'])){
            echo $args['title'];
        } else {
            the_title();
        }
    ?>
</h1>