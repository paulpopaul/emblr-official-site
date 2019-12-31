<?php


/**
*
*   Template Name: Inicio
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
    *   Fondo
    */
    $fondo = get_field( 'color_fondo', 'options' );


    /*
    *   Slogan principal
    */
    $slogan = get_field( 'slogan', 'options' );


    /*
    *   Particulas opción
    */
    $particles = get_field( 'particulas', 'options' );


    /*
    *   Botones bajo logo
    */
    $botones = get_field( 'botones', 'options' );

    $boton_1 = $botones[ 'boton_1' ];
    $boton_2 = $botones[ 'boton_2' ];


    /*
    *   Navegación lateral
    */
    $navegacion_lateral = get_field( 'navegacion_lateral', 'options' );


    /*
    *   Navegación scroll
    */
    $navegacion_scroll = get_field( 'navegacion_scroll', 'options' );


    /*
    *   Redes sociales inicio
    */
    $redes_inicio_activo = get_field( 'redes_inicio', 'options' );

?>


<!-- inicio
================================================== -->
<!--<section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center> -->


<section id="inicio" class="s-inicio page-hero target-section" style="background-color:<?= $fondo ?>">

    <?  if ( $particles ): ?>
    <div class="grid-overlay" id="particles">
        <!-- particles -->
    </div>
    <?  endif ?>


    <div class="home-content">
        <div class="row home-content__main">

            <img class="home-content__logo" src="<?= get_template_directory_uri() ?>/images/logo-home.svg">
            

            <?  if ( $slogan ): ?>

            <h3> <? echo $slogan ?> </h3>

            <?  endif ?>


            <!-- <div class="home-content__video">
                <a class="video-link" href="https://player.vimeo.com/video/117310401?color=01aef0&title=0&byline=0&portrait=0" data-lity>
                    <span class="video-icon"></span>
                    <span class="video-text">Watch Video</span>
                </a>
            </div> -->


            <div class="home-content__button">

            <?  if ( $boton_1['mostrar'] ): ?>

                <a
                    href="<?= $boton_1['enlace']['url'] ?>"
                    target="<?= $boton_1['enlace']['target'] ?>"
                    class="smoothscroll btn btn--primary btn--large"
                >

                    <?= $boton_1['texto'] ?>

                </a>

            <?  endif ?>
                


            <?  if ( $boton_2['mostrar'] ): ?>

                <a
                    href="<?= $boton_2['enlace']['url'] ?>"
                    target="<?= $boton_2['enlace']['target'] ?>"
                    class="smoothscroll btn btn--large"
                >

                    <?= $boton_2['texto'] ?>

                </a>

            <?  endif ?>

            </div>
        </div> <!-- end home-content__main -->



        <?  if ( $navegacion_scroll ): ?>

        <div class="home-content__scroll">
            <a href="#sobre-nosotros" class="scroll-link smoothscroll"> Scroll </a>
        </div>

        <?  endif ?>


        <?  if ( $redes_inicio_activo ): ?>

        <ul class="home-social">

            <?

            global $social_links;

            foreach ( $social_links as $social_name => $social ):

                if ( $social ):

                    switch ( $social_name ):
                        case "facebook": $social_name .= "-f"; break;
                        case "linkedin": $social_name .= "-in"; break;
                    endswitch
            ?>

            <li>
                <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                    <i class="fab fa-<?= $social_name ?>" aria-hidden="true"></i>
                    <span> <?= $social['title'] ?> </span>
                </a>
            </li>
            
            <?

                endif;
            endforeach;

            ?>

        </ul> <!-- end home-social -->

        <?  endif ?>

    </div> <!-- end home-content -->



    <?  if ( $navegacion_lateral ): ?>

    <div id="page-counter" class="page-counter"> <span>01</span> / <span>05</span> </div>

    <ul id="page-dots" class="page-dots">

        <!--
            Estructura:
            <li class="active"><button type="button"></button></li>
            <li><button type="button"></button></li>
        -->

    </ul>

    <?  endif ?>

</section> <!-- end s-home -->