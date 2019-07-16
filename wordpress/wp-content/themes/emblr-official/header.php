<?php

    global $social_links;
    global $main_nav_menu;


    /*
    *   Redes sociales
    */
    $social_links = array(
        'facebook' => get_field('facebook', 'options'),
        'twitter' => get_field('twitter', 'options'),
        'instagram' => get_field('instagram', 'options'),
        'linkedin' => get_field('linkedin', 'options'),
        'behance' => get_field('behance', 'options'),
        'dribbble' => get_field('dribbble', 'options')
    );

?>


<!DOCTYPE html>

<html class="no-js" <? language_attributes() ?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="<? bloginfo('charset') ?>">
    <title><? bloginfo('name') ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/base.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/vendor.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="<? bloginfo('stylesheet_url') ?>">

    <!-- script
    ================================================== -->
    <script src="<?= get_template_directory_uri() ?>/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">

    <? wp_head() ?>
    
</head>