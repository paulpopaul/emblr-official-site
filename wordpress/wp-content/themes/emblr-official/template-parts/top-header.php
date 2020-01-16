<?php


    /**
     * 
     *  Objeto global wp_query
     * 
     */
    global $wp_query;


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



    <!-- Header
    ================================================== -->
    <header class="s-header">

        <label class="toggle-control" id="chk" >
            <input type="checkbox" checked="checked" for="chk">
            <span class="control"></span>
        </label>

        
        <?  if ( $logo_esquina ) :  ?>

            <div class="header-logo">
                <a class="site-logo" href="#">

                <span class="header-logo-container">
                    <img src="<?= get_template_directory_uri() ?>/images/logo-light-theme.svg">
                    <img src="<?= get_template_directory_uri() ?>/images/logo-dark-theme.svg">
                </span>

                <? if ( $posts_number_results ) :

                        if ( $wp_query->found_posts < 10 ) :
                            $total_resultados = '0' . $wp_query->found_posts;

                        else :
                            $total_resultados = $wp_query->found_posts;

                        endif
                ?>

                    <span class="marca"> <?= __( 'total', 'emblr' ) ?> <?= $total_resultados ?> </span>

                <? endif ?>

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

                                            case "facebook":
                                                $social_name .= "-f";
                                                break
                                            ;

                                            case "linkedin":
                                                $social_name .= "-in";
                                                break
                                            ;

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

                    <input id="search" type="checkbox" <? if ( $focused_search ) echo 'checked' ?>/>
                    <label class="search-init" for="search"></label>
                    <label class="search-active" for="search"></label>

                    <div class="search-border <? if ( $focused_search ) echo 'focus' ?>"></div>

                    <!-- WORDPRESS SEARCH INPUT -->
                    <input
                        type="text"
                        id="s" name="s"
                        class="search-field"
                        placeholder="Buscar"
                        value="<?= $_GET['s']?>"
                        <? if ( $focused_search ) echo 'autofocus' ?>
                    />
                    <!-- /WORDPRESS SEARCH INPUT -->

                    <div class="close-search"></div>
                    
                </form> <!-- search -->

            </a>  <!-- icon-search -->

        <?  endif  ?>


        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->

    
    <!-- botonSubir
    ================================================== -->
    <div>
        <a id="return-to-top" class="dissapear"><i class="fas fa-chevron-up"></i></a>
    </div>