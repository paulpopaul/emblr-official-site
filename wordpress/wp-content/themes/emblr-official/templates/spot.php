<?php


/**
*
*   Template Name: Spot
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



    /**
    *
    *   Objeto post (página)
    *
    */
    global $post;



    /**
    *
    *	Texto 1 animación máquina de escribir
    *
    */
    $texto_1 = get_field( 'texto_1', $post->ID );



    /**
    *
    *	Texto 2 animación shuffle letters
    *
    */
    $texto_2 = get_field( 'texto_2', $post->ID );



    /**
    *
    *	Texto y enlace de botón de acción
    *
    */
    $boton = get_field( 'boton', $post->ID );


?>



 <!-- Spot
================================================== -->

<section id="spot" class="spot target-section section-page">

	<h1 data-aos="fade-up"> <? the_title() ?> </h1>
	<h6 data-aos="fade-right">

	    <?	if ( $texto_1 ) : ?>

	    <span id="spot-text"> <?= $texto_1 ?> </span>

		<?	endif ?>

		
		<?	if ( $texto_2 ) : ?>

	    <span id="spot-shuffle-text"> <?= $texto_2 ?> </span>

	    <?	endif ?>

	</h6>
	

	<?	if ( $boton ) : ?>

	<span data-aos="fade-up" data-aos-offset="10">
		<a
			href="<?= $boton['url'] ?>"
			target="<?= $boton['target'] ?>"
			class="smoothscroll btn btn--primary btn--large">

	        <?= $boton['title'] ?>

	    </a>
	</span>

	<?	endif ?>

</section>