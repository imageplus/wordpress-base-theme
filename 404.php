<?php get_header(); ?>

<main class="container mx-auto flex flex-grow flex-wrap">
    <div class="flex justify-center items-center w-full md:w-1/2">
        <div>
            <h2 class="text-9xl text-primary font-bold"><?= __('404', 'base-theme'); ?></h2>
            <h1 class="text-xl text-black italic"><?= __('Error: page not found', 'base-theme'); ?></h1>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
        <div class="text-center md:text-left">
            <h3 class="font-bold text-black"><?= __('Maybe Try Searching?', BT_DOMAIN); ?></h3>
            <?php get_search_form(); ?>

            <h3 class="font-bold mt-6 mb-3 text-black"><?= __('Or One Of These Useful Links?', BT_DOMAIN); ?></h3>

            <?php
                wp_nav_menu([
                    'menu_location' => 'error_404'
                ]);
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
