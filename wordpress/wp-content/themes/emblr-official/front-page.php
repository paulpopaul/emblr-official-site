<?  get_header()  ?>


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


<body id="main-page" class="<? emblr_theme() ?>">
    
    <!-- ( preloader )
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>



    <!-- Header
    ================================================== -->
    <header class="s-header">
        
        <?  if ( $logo_esquina ) :  ?>

        <div class="header-logo">
            <a class="site-logo" href="#">
                <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header-logo -->

        <?  endif  ?>


        <nav class="header-nav">
            <div class="header-nav__bg"> <!-- blur background efx --> </div>

            <div class="header-nav__content-container">
                <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

                <h3> <?= $titulo_menu ?> </h3>

                <div class="header-nav__content">
                    
                    <?

                        if ( function_exists( 'custom_wp_nav_menu' ) )
                            custom_wp_nav_menu( 'header-nav__list' );

                    ?>


                    <?  if ( $widgets_menu ) :  ?>

                    <div id="menu-widgets">

                        <?  dynamic_sidebar( 'main-menu' )  ?>

                    </div>

                    <?  endif  ?>



                    <?  if ( $redes_menu ):  ?>

                    <ul class="header-nav__social">

                        <?  global $social_links  ?>

                        <?  foreach ( $social_links as $social_name => $social ) :  ?>

                        <?  if ( $social ) :

                                switch ( $social_name ) :
                                    case "facebook": $social_name .= "-f";      break;
                                    case "linkedin": $social_name .= "-in";     break;
                                endswitch
                        ?>

                        <li>
                            <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                                <i class="fab fa-<?= $social_name ?>"></i>
                            </a>
                        </li>
                        
                        <?  endif  ?>
                        <?  endforeach  ?>

                    </ul>

                    <?  endif  ?>

                </div> <!-- end header-nav__content -->
            </div>

        </nav> <!-- end header-nav -->

        
        <?  if ( $busqueda ) :  ?>

        <div class="opaque-controls"></div>

        <a class="icon-search">

            <form role="search" method="get" id="searchform" action="<?= home_url( '/' ) ?>" class="search">

                <input id="search" type="checkbox" /><label class="search-init" for="search"></label>
                <label class="search-active" for="search"></label>

                <div class="search-border"></div>

                <!-- WORDPRESS SEARCH INPUT -->
                <input type="text" id="s" name="s" class="search-field" placeholder="Buscar" />
                <!-- /WORDPRESS SEARCH INPUT -->

                <div class="close-search"></div>
                
            </form> <!-- search -->

        </a>  <!-- icon-search -->

        <?  endif  ?>


        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->



     <!-- Páginas
    ================================================== -->
    <?

        /**
        *
        *   Se cargan secciones de la página
        *
        */
        global $main_nav_menu_items;


        foreach ( $main_nav_menu_items as $menu_item ) {

            if ( $menu_item->type == 'post_type' and $menu_item->post_status == 'publish' ) {
                ## Obtenemos ID del post asociado el item menú
                $page_id = $menu_item->object_id;
                ## Obtenemos el template de dicho post
                $template_part_php = get_page_template_slug( $page_id );
                ## Excluímos extensión .php
                $template_part = str_replace( '.php', '', $template_part_php );


                /*
                *
                *   Objeto post (página) para uso dentro de templates:
                *
                */
                $post = get_post( $page_id );


                ## Si existe template, lo cargamos
                if ( $template_part )
                    get_template_part( $template_part );

                ## Si no, usamos el por defecto
                else
                    get_template_part( 'content' );

            }

        }

    ?>



    <!-- Footer
    ================================================== -->
    <?  get_footer()  ?>

