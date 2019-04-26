<!DOCTYPE html>

<html class="no-js" <? language_attributes() ?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="<? bloginfo('charset') ?>">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<? echo get_template_directory_uri() ?>/css/base.css">
    <link rel="stylesheet" href="<? echo get_template_directory_uri() ?>/css/vendor.css">
    <link rel="stylesheet" href="<? bloginfo('stylesheet_url') ?>">

    <!-- script
    ================================================== -->
    <script src="<? echo get_template_directory_uri() ?>/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<? echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<? echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">

    <? wp_head() ?>

</head>