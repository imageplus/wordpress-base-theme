<?php
    /**
     * This file adds a custom search form to be inline with BEM standards
     *
     * @link https://developer.wordpress.org/reference/functions/get_search_form/
     */
?>

<form role="search" method="get" class="search-form" action="<?= esc_url(home_url('/')); ?>">
    <label class="search-form__label">
        <span class="sr-only"><?= __('Enter Search Term', BT_DOMAIN) ?></span>
        <input type="search" class="search-form__input form-input" placeholder="<?= __('Search...', BT_DOMAIN); ?>" value="<?php the_search_query() ?>" name="s" />
    </label>
    <button type="submit" class="search-form__submit btn btn--primary"><?= __('Search', BT_DOMAIN); ?></button>
</form>
