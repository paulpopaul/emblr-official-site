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


<? get_footer() ?>