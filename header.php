<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site h-full">
        <a class="skip-link sr-only" href="#site-content">Skip to content</a>

        <header id="site-header" class="site-header">
            <?php get_template_part('template-parts/partials/site-header'); ?>
        </header>

        <div id="site-content">

