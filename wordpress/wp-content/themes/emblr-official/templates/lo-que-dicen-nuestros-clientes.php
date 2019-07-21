<?php


/**
*
*   Template Name: Lo que dicen nuestros clientes
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



    /**
    *
    *   Objetos página, ID página
    *
    */
    global

        $page,
        $page_id

    ;



    /**
    *
    *   Colección de posts tipo "testimonio"
    *
    */
    $testimonios = get_posts( array(

        'post_type'     => 'testimonio',
        'numberposts'   => -1

    ));


?>



<section class="s-testimonials target-section section-page">
    <h1 data-aos="fade-up"> <?= $page->post_title ?> </h1>
    <div class="testimonials__icon" data-aos="fade-up"></div>

    <div class="row testimonials narrow">

        <div class="col-full testimonials__slider" data-aos="fade-up">

        <?

            if ( $testimonios ) :

                foreach ( $testimonios as $testimonio ) :

                    $profile        = get_field( 'perfil', $testimonio->ID );
                    $nombre         = get_field( 'nombre', $testimonio->ID );
                    $ocupacion      = get_field( 'ocupacion', $testimonio->ID );
                    $recomendacion  = get_field( 'recomendacion', $testimonio->ID );

        ?>
        
            <div class="testimonials__slide">

                <div class="foto-persona"> 
                    <img src="<?= $profile['sizes']['thumbnail'] ?>" />
                </div>


                <p>
                    "<?= $recomendacion ?>"
                </p>


                <div class="testimonials__author">
                    <?= $nombre ?>
                    <span> <?= $ocupacion ?> </span>
                </div> <!-- testimonials__author -->

            </div> <!-- testimonials__slide -->

        <?

                endforeach ;
            endif ;

        ?>

        </div> <!-- end testimonials__slider -->

    </div> <!-- end testimonials -->

</section> <!-- end s-testimonials -->



<!-- clientes logos
================================================== -->

<section id="testimonials-clientes-logo" class="target-section section-page">
    <div data-aos="flip-down" data-aos-offset="0">

        <div class="clientes-logo">
            <img src="<?= get_template_directory_uri() ?>/images/clientes/logos/logocliente-01.svg" alt="">
        </div>


        <div class="clientes-logo">
            <img src="<?= get_template_directory_uri() ?>/images/clientes/logos/logocliente-02.svg" alt="">
        </div>


        <div class="clientes-logo">
            <img src="<?= get_template_directory_uri() ?>/images/clientes/logos/logocliente-03.svg" alt="">
        </div>

    </div>
</section>