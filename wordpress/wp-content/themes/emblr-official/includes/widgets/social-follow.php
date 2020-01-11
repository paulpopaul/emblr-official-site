<?php
	

/**
*
*	Ensambler Social Follow - Widget
*
*
*	@author Ensambler <emblr@ensambler.cl>
*	@copyright	Derechos reservados 2020, Ensambler
*
*	@link 	http://www.ensambler.cl/
*
*	@package	WordPress
*	@subpackage emblr-official
*
*/


	class social_follow_widget extends WP_Widget {
		// Construct
		public function social_follow_widget( ) {
            $options = array(
				'classname'		=> 'widget_social_follow',
				'description'	=> __( 'Añade redes sociales para seguir a Ensambler&reg;.', 'emblr' )
			);

			$this->WP_Widget( 'social_follow_widget', __('Ensambler Social Follow (emblr)', 'emblr'), $options );
		}

		// Front-end build
		public function widget ( $args, $instance ) {
			extract( $args );
			echo $before_widget;
		?>
            
            <h5 class="widget-title"> <?= $instance['titulo'] ?> </h5>
            
            <div class="social">

                <? global $social_links; ?>

                <? foreach ( $social_links as $social_name => $social ): ?>

                    <? if ( $social ):

                        switch ( $social_name ):
                            case "facebook": $social_name .= "-f"; break;
                            case "linkedin": $social_name .= "-in"; break;
                        endswitch
                    ?>

                    <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                        <i class="fab fa-<?= $social_name ?>" aria-hidden="true"></i>
                    </a>
                
                    <? endif ?>

                <? endforeach ?>

            </div> <!-- social -->

		<?
			echo $after_widget;
 		}

		// Updates old or new data
		public function update ( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['titulo'] = strip_tags( $new_instance['titulo'] );

			return $instance;
		}


		// Form for user data input
		public function form ( $instance ) {
			?>

				<p>
					<label for="<?= $this->get_field_id( 'titulo' ) ?>">
						<? _e( 'Título:', 'emblr' ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( 'titulo' ) ?>"
						name="<?= $this->get_field_name( 'titulo' ) ?>"
						value="<?= esc_attr( $instance['titulo'] ) ?>"
					/>
				</p>

			<?
		}

	}


?>