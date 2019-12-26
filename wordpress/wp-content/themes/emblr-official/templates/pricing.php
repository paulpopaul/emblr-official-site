<?php

/**
*
*   Template Name: Pricing
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
	 *	Etiqueta de sección
	 * 
	 */
	$etiqueta = get_field( 'etiqueta_seccion', $post->ID );



	/**
	 * 
	 *	Botón Solicitar
	 * 
	 */
	$solicitar = get_field( 'solicitar', $post->ID );



	/**
	 * 
	 *	Botón Personalizar
	 * 
	 */
	$personalizar = get_field( 'personalizar', $post->ID );



	/**
	 * 
	 *	Planes
	 * 
	 */
	$planes = get_field( 'planes', $post->ID );


?>


<!-- pricing ================================================== -->
<section class="s-pricing section-page" id="pricing">

	<?	if ( $etiqueta[ 'visibilidad' ] ) :	?>

	<div class="cr cr-top cr-left cr-red"> <?= $etiqueta[ 'titulo' ] ?> </div>

	<?	endif	?>

	<h1 data-aos="fade-left"> <? the_title() ?> </h1>
	<h2 data-aos="fade-left"> <?= get_field( 'subtitulo', $post->ID ) ?> </h2>

	<div class="container">
		<div class="price-plan-wrapper">

			<div class="row">

			<?

				foreach ( $planes as $plan ) :

					$nombre			= $plan[ 'nombre' ];
					$descripcion	= $plan[ 'descripcion' ];
					$precio			= $plan[ 'precio' ];

					// Lista (array) de detalles:
					$features		= $plan[ 'features' ];

					// Nombre de clase:
					$classname		= strtolower( explode( ' ', $nombre )[ 0 ] );

					// Código plan (parámetro):
					$codigo			= $classname;

			?>

				<div class="col-pricing" data-aos="fade-right">

					<div class="pricing-table <?= $classname ?>">

						<div class="price-header">
							<div class="icon"> <i class="flaticon-trip"></i> </div>
							<h3 class="title"> <?= $nombre ?> </h3>
							<span class="subtitle"> <?= $descripcion ?> </span>
						</div> <!-- price-header -->

						<div class="price">
							<span class="dollar">$</span><?= $precio ?><!--<span class="month">/Mo</span>-->
						</div> <!-- price -->
							
						<div class="price-body">
							<ul>

							<?

								foreach ( $features as $feature ) :

									$cantidad	= $feature[ 'cantidad' ];
									$detalle 	= $feature[ 'detalle' ];

							?>

								<li><b> <?= $cantidad ?> </b> <?= $detalle ?> </li>

							<?	endforeach	?>

							</ul>
						</div> <!-- price-body -->
							
						<div class="price-footer">
							<a
								href="<?= esc_url( "/{$solicitar['accion']}?plan=$codigo" ) ?>"
								class="order-btn">

								<?= $solicitar[ 'texto' ] ?>
							</a>
						</div> <!-- price-footer -->

					</div> <!-- pricing-table -->
					
				</div> <!-- col-pricing -->
				
			<?	endforeach	?>

			</div> <!-- row -->

		</div> <!-- price-plan-wrapper -->
	</div> <!-- container -->

	<a
		href="<?= esc_url( "/{$personalizar['accion']}" ) ?>"
		class="customize-product btn btn--secondary btn--large"
		data-aos="fade-up">

		<?= $personalizar[ 'texto' ] ?>
	</a>

</section> <!-- #pricing -->