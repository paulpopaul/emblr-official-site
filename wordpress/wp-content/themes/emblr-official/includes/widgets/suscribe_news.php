<?php
	

/**
*
*	Suscribe News Widget
*
*	@author Ensambler <emblr@ensambler.cl>
*	@author Diego Ulloa <diego@ensambler.cl>
*	@copyright	Derechos reservados 2019, Ensambler
*
*	@link 	http://www.ensambler.cl/
*
*	@package	WordPress
*	@subpackage emblr-official
*
*/



	class suscribe_news_widget extends WP_Widget {
		// Construct
		public function suscribe_news_widget( ) {
			$options = array(
				'classname'		=> "widget_suscribe_news",
				'description'	=> "Añade un campo de suscripción de noticias."
			);

			$this->WP_Widget( "suscribe_news_widget", "Suscripción de noticias (emblr)", $options );
		}


		// Front-end build
		public function widget( $args, $instance ) {
			extract( $args );
			echo $before_widget;
		?>
			
			<div>
                <? echo $before_title . $instance['title'] . $after_title ?>
                <p> <?= $instance['description'] ?> </p>

                <div class="input-group">
                    <input id="suscribe" placeholder="<?= $instance['placeholder'] ?>" type="text">
                    <button class="btn"><?= $instance['send'] ?></button>
                </div>
            </div>

		<?
			echo $after_widget;
		}


		// Updates old or new data
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['description'] = strip_tags( $new_instance['description'] );
			$instance['placeholder'] = strip_tags( $new_instance['placeholder'] );
			$instance['send'] = strip_tags( $new_instance['send'] );

			return $instance;
		}


		// Form for user input data
		public function form( $instance ) {
			?>

				<p> <!-- title -->
					<label for="<?= $this->get_field_id( "title" ) ?>">
						<? _e( "Título:", "emblr-official" ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( "title" ) ?>"
						name="<?= $this->get_field_name( "title" ) ?>"
						value="<?= esc_attr( $instance['title'] ) ?>"
					/>
				</p>  <!-- title -->


				<p>  <!-- description -->
					<label for="<?= $this->get_field_id( "description" ) ?>">
						<? _e( "Descripción:", "emblr-official" ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( "description" ) ?>"
						name="<?= $this->get_field_name( "description" ) ?>"
						value="<?= esc_attr( $instance['description'] ) ?>"
					/>
				</p> <!-- description -->


				<p> <!-- placeholder -->
					<label for="<?= $this->get_field_id( "placeholder" ) ?>">
						<? _e( "Placeholder:", "emblr-official" ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( "placeholder" ) ?>"
						name="<?= $this->get_field_name( "placeholder" ) ?>"
						value="<?= esc_attr( $instance['placeholder'] ) ?>"
					/>
				</p> <!-- placeholder -->


				<p> <!-- send -->
					<label for="<?= $this->get_field_id( "send" ) ?>">
						<? _e( "Botón enviar:", "emblr-official" ) ?>
					</label>

					<input
						type="text"
						class="widefat"
						id="<?= $this->get_field_id( "send" ) ?>"
						name="<?= $this->get_field_name( "send" ) ?>"
						value="<?= esc_attr( $instance['send'] ) ?>"
					/>
				</p> <!-- send -->

			<?
		}

	}

?>