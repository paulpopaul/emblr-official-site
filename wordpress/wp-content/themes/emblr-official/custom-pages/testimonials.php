<?php

    /*
    *
    *   Colección de posts tipo "testimonio"
    *
    */
    $testimonios = get_posts( array(

        'numberposts'   => -1,
        'post_type'     => 'testimonio'

    ));

?>



<!-- testimonials
================================================== -->
<section class="s-testimonials target-section section-page">
    <h1 data-aos="fade-up"> Lo que dicen nuestros clientes </h1>
    <div class="testimonials__icon" data-aos="fade-up"></div>

    <div class="row testimonials narrow">

        <div class="col-full testimonials__slider" data-aos="fade-up">

        <?

            if ( $testimonios ) :

                foreach ( $testimonios as $testimonio ) :

                    $profile = get_field( 'perfil', $testimonio->ID );
                    $nombre = get_field( 'nombre', $testimonio->ID );
                    $ocupacion = get_field( 'ocupacion', $testimonio->ID );
                    $recomendacion = get_field( 'recomendacion', $testimonio->ID );

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