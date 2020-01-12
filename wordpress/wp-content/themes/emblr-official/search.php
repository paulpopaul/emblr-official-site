<?php


/**
*
*   Action: Search Form Results
*
*
*   @version    emblr-official-1
*
*   @author     Ensambler <emblr@ensambler.cl>
*   @copyright  Derechos reservados 2019, Ensambler
*
*   @link       http://www.ensambler.cl/
*
*   @package    WordPress
*   @subpackage emblr
*   @since      5.2.2
*
*/



    /*
    *
    *   Objeto post (resultados)
    *
    */
    global
        $post,
        $wp_query
    ;


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


<? get_header() ?>

<body class="<? emblr_theme() ?>">

    <!-- Header
    ================================================== -->
    <header class="s-header">
        
        <?  if ( $logo_esquina ) :  ?>

        <div class="header-logo">
            <a class="site-logo" href="#">

            <?
            
                if ( $wp_query->found_posts < 10 ) :
                    $total_resultados = '0' . $wp_query->found_posts;

                else :
                    $total_resultados = $wp_query->found_posts;

                endif;

            ?>

                <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Homepage">
                <span class="marca"> total <?= $total_resultados ?> </span>
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

                </div> <!-- end header-nav__content -->
            </div>

        </nav> <!-- end header-nav -->

        
        <?  if ( $busqueda ) :  ?>

        <div class="opaque-controls"></div>

        <a class="icon-search">

            <form role="search" method="get" id="searchform" action="<?= home_url( '/' ) ?>" class="search">

                <input id="search" type="checkbox" checked/><label class="search-init" for="search"></label>
                <label class="search-active" for="search"></label>

                <div class="search-border focus"></div>

                <!-- WORDPRESS SEARCH INPUT -->
                <input
                    type="text"
                    id="s" name="s"
                    class="search-field"
                    placeholder="Buscar"
                    value="<?= $_GET['s']?>"
                    autofocus
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


    <!-- Sección: Resultado búsqueda -->
    <section id="search-results" class="section-page s-search-results" data-aos="fade-up">
        
        <h1> Resultados de búsqueda: </h1>
        <!-- <i class="fas fa-search"></i> --> <tiny> Usted ingresó: "<?= $_GET['s'] ?>" </tiny>

        <? while ( have_posts() ) : the_post() ?>
            <article>

                <a href="<? the_permalink() ?>">
                    <h2 class="entry-title main_title"> <? the_title() ?> </h2>
                </a>

                <div class="entry-content">
                    <?
                        $content = get_the_content();
                        $content = str_replace( $_GET['s'], "<mark>${_GET['s']}</mark>", $content );

                        echo $content
                    ?>
                </div>

            </article>
        <? endwhile ?>
        
    </section>
    <!-- Sección: Resultado búsqueda -->

    
    <? get_template_part( 'templates/noticias' ) ?>


    <? get_footer() ?>