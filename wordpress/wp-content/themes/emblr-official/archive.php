<?php


/**
*
*   Categorías - Entradas
*
*
*   @version    emblr-official-1
*
*   @author     Ensambler <emblr@ensambler.cl>
*   @copyright  Derechos reservados 2020, Ensambler
*
*   @link       http://www.ensambler.cl/
*
*   @package    WordPress
*   @subpackage emblr
*   @since      5.2.2
*
*/

    
?>



<? get_header() ?>


<body id="category-labels" class="<? emblr_theme() ?>">

    <!-- top-header: corner-logo - search and menu controls -->

    <? get_template_part( 'template-parts/top-header' ) ?>

    <!-- top-header: corner-logo - search and menu controls -->
    

    <!-- Lista de post con categoría/etiqueta especificada -->

    <section class="section-page s-archive-view">

        <h1 class="archive-title">
            <span> <?= __( 'Resultado búsqueda', 'emblr' ) ?>: </span> <? single_term_title() ?>
        </h1>

        <div class="archive-grid-container">

            <main>

                <? while( have_posts() ): ?>

                <article>

                    <? the_post() ?>

                    <!-- THUMBNAIL -->
                    <div class="archive-img" style="background-image:url('<? the_post_thumbnail_url() ?>')">

                        <div class="archive-img-top"> <? single_term_title() ?> </div>
                        
                        <div class="archive-img-bottom">
                            <?= 
                                get_the_date( 'l' ) .
                                '&nbsp;<span>' . get_the_date( 'j' ) . '</span>' .
                                get_the_date( ', F Y' )
                            ?>
                        </div> <!-- archive-img-bottom -->

                    </div> <!-- archive-img -->
                    <!-- THUMBNAIL -->


                    <!-- ARCHIVE BODY -->
                    <div class="archive-body">

                        <a href="<? the_permalink() ?>"> <h2> <? the_title() ?> </h2> </a>

                        <? the_excerpt() ?>

                        <span class="read-more">
                            <a href="<? the_permalink() ?>">
                                <?= __( 'Leer más', 'emblr' ) ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </span>

                        <span class="archive-labels">

                            <? $categories = get_the_category() ?>

                            <? foreach ( $categories as $n => $category ): ?>
                                <? if ( $n == 3 ) break ?>
                                <a href="<?= get_category_link( $category ) ?>" class="btn--pill"> <?= $category->name ?> </a>
                            <? endforeach ?>

                        </span> <!-- archive-labels -->

                    </div>
                    <!-- ARCHIVE BODY -->

                </article>

                <? endwhile ?>

            </main>


            <!-- SIDEBAR -->

            <aside>

                <!-- Se utiliza misma sidebar que en vista entradas -->
                <div class="post-sidebar-container">
                    <? dynamic_sidebar( 'post-sidebar' ) ?>
                </div>
                <!-- Se utiliza misma sidebar que en vista entradas -->

            </aside>

            <!-- SIDEBAR -->

        </div> <!-- archive-grid-container -->

    </section>

    <!-- Lista de post con categoría/etiqueta especificada -->


<? get_footer() ?>