<? get_header() ?>


<?php

    /*
    *   Título menú
    */
    $titulo_menu = get_field( 'titulo_menu', 'options' );


    /*
    *   Widgets menú
    */
    $widgets_menu = get_field( 'widgets_menu', 'options' );


    /*
    *   Redes menú
    */
    $redes_menu = get_field( 'redes_menu', 'options' );


    /*
    *   Mini logo esquinero
    */
    $logo_esquina = get_field( 'logo_esquina', 'options' );


    /*
    *   Búsqueda
    */
    $busqueda = get_field( 'busqueda', 'options' );

?>


<body id="top">
    
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- header
    ================================================== -->
    <header class="s-header">
        
        <? if ( $logo_esquina ): ?>
        <div class="header-logo">
            <a class="site-logo" href="#">
                <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header-logo -->
        <? endif ?>


        <nav class="header-nav">
            <div class="header-nav__bg"> <!-- blur background efx --> </div>

            <div class="header-nav__content-container">
                <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

                <h3> <?= $titulo_menu ?> </h3>

                <div class="header-nav__content">
                    
                    <? custom_wp_nav_menu( "header-nav__list" ) ?>


                    <? if ( $widgets_menu ): ?>
                    <div id="menu-widgets">

                        <? dynamic_sidebar( "main-menu" ) ?>

                    </div>
                    <? endif ?>


                    <? if ( $redes_menu ): ?>
                    <ul class="header-nav__social">
                        <? global $social_links; ?>

                        <? foreach ( $social_links as $social_name => $social ): ?>
                        <? if ( $social ):
                            switch ( $social_name ):
                                case "facebook": $social_name .= "-f"; break;
                                case "linkedin": $social_name .= "-in"; break;
                            endswitch
                        ?>

                        <li>
                            <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                                <i class="fab fa-<?= $social_name ?>"></i>
                            </a>
                        </li>
                        
                        <? endif ?>
                        <? endforeach ?>
                    </ul>
                    <? endif ?>

                </div> <!-- end header-nav__content -->
            </div>

        </nav> <!-- end header-nav -->

        
        <? if ( $busqueda ): ?>
        <div class="opaque-controls"></div>

        <a class="icon-search">
            <div class="search">
                <input id="search" type="checkbox" /><label class="search-init" for="search"></label>
                <label class="search-active" for="search"></label> 
            <div class="search-border"></div>
                <input class="search-field" id="search-field" type="text" placeholder="Buscar" />
            <div class="close-search"></div> 
            </div>
        </a> 
        <? endif ?>


        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


     <!-- pages
    ================================================== -->
    <? require_once("custom-pages/inicio.php") ?>

    <? #require_once("custom-pages/sobre-nosotros.php") ?>

    <? require_once("custom-pages/servicios.php") ?>

    <? #require_once("custom-pages/portafolio.php") ?>

    <? #require_once("custom-pages/clients.php") ?>

    <!-- --> <? require_once("sub-sections/noticias.php") ?>
    <!-- --> <? require_once("custom-pages/testimonials.php") ?>
    <!-- --> <? require_once("sub-sections/lo-que-dicen-nuestros-clientes.php") ?>
    <!-- --> <? require_once("sub-sections/apartado-1.php") ?>

    <? require_once("custom-pages/contacto.php") ?>


    <!-- footer
    ================================================== -->
    <? get_footer() ?>

