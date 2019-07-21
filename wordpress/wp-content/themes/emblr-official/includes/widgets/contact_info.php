<?php
	

/**
*
*	Información de Contacto Widget
*
*	@author Ensambler <emblr@ensambler.cl>
*	@copyright	Derechos reservados 2019, Ensambler
*
*	@link 	http://www.ensambler.cl/
*
*	@package	WordPress
*	@subpackage emblr-official
*
*/


	class contact_info_widget extends WP_Widget {
		// Construct
		public function contact_info_widget( ) {
			$options = array(
				'classname'		=> 'widget_contact_info',
				'description'	=> __( 'Añade información de contacto asociada a la página.', 'emblr' )
			);

			$this->WP_Widget( 'contact_info_widget', __('Información de contacto (emblr)', 'emblr'), $options );
		}

		// Front-end build
		public function widget( $args, $instance ) {
			extract( $args );
			echo $before_widget;

	        $telefonos = get_field( 'telefonos', 'options' );
	        $email_principal = get_field( 'email_principal', 'options' );
	        $sucursal_1 = get_field( 'sucursal_1', 'options' );
			$sucursal_2 = get_field( 'sucursal_2', 'options' );

		?>
			
            <div>

                <? echo $before_title . $instance['title'] . $after_title ?>
                
                <p>
                    <strong>Teléfono</strong> <span>·</span> <br class="br-hidden"> <?= $telefonos['1'] ?> <br>
                    
                    <? if ( $telefonos['2'] ): ?>
                    <strong>Teléfono #2</strong> <span>·</span> <br class="br-hidden"> <?= $telefonos['2'] ?> <br>
                    <? endif ?>

                    <strong>Email</strong> <span>·</span> <br class="br-hidden"> <?= $email_principal ?>
                </p>

                <p>
                    <strong>Dirección · <?= $sucursal_1['ciudad'] ?></strong> <br>
                    <?= $sucursal_1['direccion'] ?>
                </p>

                <? if( $sucursal_2['ciudad'] ): ?>
                <p>
                    <strong>Dirección · <?= $sucursal_2['ciudad'] ?></strong> <br>
                    <?= $sucursal_2['direccion'] ?>
                </p>
                <? endif ?>

            </div>

		<?
			echo $after_widget;
 		}

		// Updates old or new data
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}


		// Form for user input data
		public function form( $instance ) {
			?>

				<p>
					<label for="<?= $this->get_field_id( 'title' ) ?>">
						<? _e( 'Título:', 'emblr' ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( 'title' ) ?>"
						name="<?= $this->get_field_name( 'title' ) ?>"
						value="<?= esc_attr( $instance['title'] ) ?>"
					/>
				</p>

			<?
		}

	}


?>