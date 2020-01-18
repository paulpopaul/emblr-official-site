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
    global $post;


?>


<? get_header() ?>

<body class="<? emblr_theme() ?>">

    <!-- top-header: corner-logo - search and menu controls -->

    <? set_query_var( 'focused_search', true ) ?>
    <? set_query_var( 'posts_number_results', true ) ?>

    <? get_template_part( 'template-parts/top-header' ) ?>

    <!-- top-header: corner-logo - search and menu controls -->


    <!-- Sección: Resultado búsqueda -->
    <section id="search-results" class="section-page s-search-results" data-aos="fade-up">
        
        <h1> <?= __( 'Resultados de búsqueda', 'emblr' ) ?>: </h1>
        <!-- <i class="fas fa-search"></i> -->
        <tiny> <?= __( 'Usted ingresó', 'emblr' ) ?>: "<?= $_GET['s'] ?>" </tiny>

        <? while ( have_posts() ) :
        
            the_post()
        ?>

            <article>

                <a href="<? the_permalink() ?>">
                    <h2 class="entry-title main_title"> <? the_title() ?> </h2>
                </a>

                <div class="entry-content">
                    <?
                        $content = get_the_excerpt();
                        $content = str_replace( $_GET['s'], "<mark>${_GET['s']}</mark>", $content );

                        echo $content
                    ?>
                </div>

            </article>
        <? endwhile ?>
        
    </section>
    <!-- Sección: Resultado búsqueda -->


    <!-- importa noticias stories -->
    <? get_template_part( 'templates/noticias' ) ?>
    <!-- importa noticias stories -->
    

    <? get_footer() ?>