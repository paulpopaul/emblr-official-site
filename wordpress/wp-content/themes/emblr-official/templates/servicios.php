<?php

/**
*
*   Template Name: Servicios
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
    *   Colección de posts tipo "testimonio"
    *
    */
    $servicios = get_posts( array(

        'post_type'     => 'servicio',
        'numberposts'   => -1

    ));


?>


<!-- services
================================================== -->
<section id="servicios" class="s-services target-section section-page">
    <h1 data-aos="fade-up"> <? the_title() ?> </h1>

    <div data-aos="fade-up">
        <h2>
            <?= get_field( 'subtitulo', $post->ID ) ?>
        </h2>
    </div> <!-- end section-header -->

    <div class="bit-narrow services block-1-2 block-tab-full">
        
        <?

            $service_counter = 1;

            if ( $servicios ):

                foreach ( $servicios as $post ):

                    $icono = get_field( 'icono', $post->ID );

        ?>

        <div class="col-block item-service<?= $service_counter > 6 ? ' hidden-service' : '' ?>" data-aos="fade-up">
            <div class="item-service__icon">
                <?= $icono ?>
            </div>

            <div class="item-service__text">
                <h3 class="item-title"> <? the_title() ?> </h3>

                <p>
                    <?= $post->post_content ?>
                </p>
            </div>
        </div>
        
        <?

                    $service_counter++;

                endforeach ;
            endif ;

        ?>

    </div>

    <input id="more-services" type="submit" value="ver más servicios" class="more-services btn btn--primary btn--large">

</section> <!-- end s-services -->