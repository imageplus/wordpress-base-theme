<h2 class="search-no-result__title">
    <?php
        printf(
            esc_html__('No Results Found For "%s"', BT_DOMAIN),
            esc_html(get_search_query())
        );
    ?>
</h2>