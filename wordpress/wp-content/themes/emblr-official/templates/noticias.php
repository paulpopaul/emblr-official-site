<?php


/**
*
*   Template Name: Noticias
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
    *   Colección de entradas (noticias)
    *
    */
    $noticias = get_posts( array(

        'post_type'     => 'post',
        'numberposts'   => -1

    ));


?>


 <!-- Noticias
================================================== -->

<section id="noticias" class="noticias section-page">

	<div class="slick-stories-container">
		<!-- prev, next arrows -->
		<span class="slick-stories-prev slick-stories-arrow" data-aos="fade-right">
			<i class="fas fa-caret-left fa-2x"></i>
		</span>

		<span class="slick-stories-next slick-stories-arrow" data-aos="fade-left">
			<i class="fas fa-caret-right fa-2x"></i>
		</span>
		

		<div class="noticias-stories" data-aos="fade-up">


		<?

			if ( $noticias ) :

			foreach ( $noticias as $post ) :

		?>

			<div class="storie-container"> <!-- storie -->

			  	<div class="storie-canvas">
					<div class="round">
						<div class="round">
							<div class="picture">
								<a href="<? the_permalink() ?>">
									<img src="<? the_post_thumbnail() ?>">
								</a>
							</div>
						</div>
					</div>
				</div> <!-- .storie-container -->

				<a href="<? the_permalink() ?>"> <h5> <? the_title() ?> </h5> </a>

		  	</div> <!-- storie -->

		<?

			endforeach;

			endif
			
		?>
			

		</div> <!-- .noticias-stories -->

	</div> <!-- .slick-stories-container -->

</section>


<script type="module">
	import { storiesSlider } from '<?= get_template_directory_uri() ?>/js/exports.js'

	(function($) {
		// Init:
		storiesSlider()
	})(jQuery)
</script>