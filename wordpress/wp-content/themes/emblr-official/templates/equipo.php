<?php

/**
*
*   Template Name: Equipo
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
    *   Colección de posts tipo "personal"
    *
    */
    $personal = get_posts( array(

        'post_type'     => 'personal',
        'numberposts'   => -1,
        'orderby'       => 'nombre',
        'order'         => 'ASC'

    ));


?>


<!-- equipo ================================================== -->
<section id="equipo" class="team-section target-section section-page">
    <h1 class="classic-title" data-aos="fade-up"> Nuestro Equipo </h1>

    <div class="slick-team-container" data-aos="fade-up">

        <div class="container-team">

        <?

            if ( $personal ) :

                foreach ( $personal as $persona ) :

                    $nombre     = $persona->post_title;

                    $profile    = get_field( 'perfil', $persona->ID );
                    $ocupacion  = get_field( 'ocupacion', $persona->ID );
                    $resena     = get_field( 'resena', $persona->ID );

                    // Profile (si url imagen está roto):
                    $profile = $profile ?
                        $profile[ 'sizes' ][ 'large' ] : '#empty-profile-image-url'
                    ;

                    // Redes (opcional):
                    $redes = get_field( 'redes', $persona->ID );

                    if ( $redes ):
                        
                        $linkedin   = $redes[ 'linkedin' ];
                        $github     = $redes[ 'github' ];
                        $email      = $redes[ 'email' ];
                    
                    endif;

        ?>

            <div class="box-team">
                <div class="our-team">

                    <div class="pic">
                        <img src="<?= $profile ?>">
                    </div>

                    <div class="team-content">
                        <a href="<?= get_the_permalink( $persona->ID ) ?>"><h3 class="title"> <?= $nombre ?> </h3></a>
                        <span class="post"> <?= $ocupacion ?> </span>

                        <p>
                            <?= $resena ?>
                        </p>
                    </div>

                    <ul class="social">
                        <li> <a href="<?= $linkedin ? $linkedin : '#' ?>" target="_blank" class="fab fa-linkedin"></a> </li>
                        <li> <a href="<?= $github ? $github : '#' ?>" target="_blank" class="fab fa-github"></a> </li>
                        <li> <a href="<?= $email ? "mailto:$email?subject=Contacto%20desde%20Ensambler&reg;" : '#' ?>" class="fas fa-envelope"></a> </li>
                    </ul>

                </div> <!-- our-team -->
            </div> <!-- box-team -->

        <?

                endforeach ;
            endif ;

        ?>

        </div> <!-- container-team -->
    </div> <!-- slick-team-container -->
</section>
<!-- /equipo ================================================== -->
