<?php
	

/**
*
*	Landing Navigation Widget
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



	class landing_navigation_widget extends WP_Widget {
		// Construct
		public function landing_navigation_widget( ) {
			$options = array(
				'classname'		=> 'widget_landing_navigation',
				'description'	=> __( 'Añade navegación de sitio con enlaces #slug tipo landing page.', 'emblr' )
			);

			$this->WP_Widget( 'landing_navigation_widget', __('Navegación del sitio landing-page (emblr)', 'emblr'), $options );
		}


		// Front-end build
		public function widget( $args, $instance ) {
			extract( $args );
			echo $before_widget;
			
		?>
			
			<div>
            <?

            	echo $before_title . $instance['title'] . $after_title;

            	if ( function_exists('custom_wp_nav_menu') )
            		custom_wp_nav_menu( );
            	
            ?>
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