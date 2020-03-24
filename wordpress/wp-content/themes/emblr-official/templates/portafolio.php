<?php

/**
 *
 *   Template Name: Portafolio
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
    *   Objeto post (página)
    *
    */
    global $post;



    /**
     * 
     *  Lista de Categorías (selector)
     * 
     */
    $categorias = get_categories(array(
        'taxonomy'      => 'category',
        'parent'        => get_cat_ID( 'portafolio' ),
        'hide_empty'    => 0
    ));



    /**
    *
    *   Colección de posts tipo "trabajo"
    *
    */
    $trabajos = get_posts(array(

        'post_type'     => 'trabajo',
        'order'         => 'ASC',
        'numberposts'   => -1

    ));


?>



<!-- Portafolio
================================================== -->
<section id="portafolio" class="s-portafolio target-section section-page ">

    <h1 class="sportafolio classic-title" data-aos="fade-up">Portafolio</h1>

    <div class="wrap background-porta">
        <div class="gallery-wrap">

            <div class="portafolio-header">

            <?

                foreach ( $categorias as $categoria ) {
                    $data_filters .= ".{$categoria->slug}, ";
                }

                $data_filters = substr( $data_filters, 0 , -2 );

            ?>

                <ul id="filters" class="clearfix" data-aos="fade-up">

                    <li>
                        <span class="filter active" data-filter="<?= $data_filters ?>">
                            Todo
                        </span>
                    </li>

                    <?  foreach ( $categorias as $categoria ) : ?>

                    <li>
                        <span class="filter" data-filter=".<?= $categoria->slug ?>">
                            <?= $categoria->name ?>
                        </span>
                    </li>
                    
                    <?  endforeach  ?>

                </ul> <!-- filters -->

            </div> <!-- portafolio-header -->


            <div id="gallery" data-aos="fade-up">
                
                <?
                
                    foreach ( $trabajos as $trabajo ) :

                        /**
                         * 
                         *  Categorías
                         * 
                         */
                        $categorias  = get_field( 'categoria', $trabajo->ID );
                        $cat_classes = '';

                        foreach ( $categorias as $categoria ) {
                            $cat_classes .= "{$categoria->slug} ";
                        }

                        $cat_classes = substr( $cat_classes, 0, -1 );


                        /**
                         * 
                         *  Campos
                         * 
                         */
                        $titulo         = get_the_title( $trabajo->ID );
                        $miniatura      = get_field( 'miniatura', $trabajo->ID );
                        $razon_social   = get_field( 'razon_social', $trabajo->ID );
                        $enlace         = get_field( 'enlace', $trabajo->ID );
                        $descripcion    = get_field( 'descripcion', $trabajo->ID );
                        $fullscreen     = get_field( 'fullscreen', $trabajo->ID );

                ?>

                <div class="masonry__brick item-folio gallery-item <?= $cat_classes ?>" href="#">

                    <div class="item-folio__thumb">
                        <a href="<?= $fullscreen['sizes']['large'] ?>" class="thumb-link" data-size="1920x7944">
                            <img src="<?= $miniatura['sizes']['large'] ?>" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title"> <?= $titulo ?> </h3>
                        <p class="item-folio__cat"> <?= $razon_social ?> </p>
                    </div>

                    <a href="<?= $enlace ?>" target="_blank" class="item-folio__project-link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p> <?= $descripcion ?> </p>
                    </div>

                </div> <!-- end masonry__brick -->

                <?  endforeach  ?>

            </div><!--/gallery-->

        </div><!--/gallery-wrap-->

    </div> <!-- /wrap -->
</section>


















