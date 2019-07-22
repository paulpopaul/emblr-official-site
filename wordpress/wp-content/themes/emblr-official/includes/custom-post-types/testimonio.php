<?php


/**
*
*	Ensambler Official: Custom Post Type "Testimonio"
*
*
*	@version 	emblr-official-1
*
*	@author 	Ensambler <emblr@ensambler.cl>
*	@copyright	Derechos reservados 2019, Ensambler
*
*	@link 		http://www.ensambler.cl/
*
*	@package	WordPress
*	@subpackage	emblr
*	@since 		5.2.2
*
*/



	/**
	*
	*	Registra "Testimonio" Custom Post Type
	*
	*/
	function register_testimonio_custom_post_type ( ) {

		## Mensajes Custom Post Type en Admin
		$labels = array(

			'name'					=> __( 'Testimonios', 'emblr' ),
			'singular_name'			=> __( 'Testimonio', 'emblr' ),
			'add_new'				=> __( 'Añadir nuevo', 'emblr' ),
			'add_new_item'			=> __( 'Nuevo testimonio', 'emblr' ),
			'edit_item'				=> __( 'Editar testimonio', 'emblr' ),
			'new_item'				=> __( 'Nuevo testimonio', 'emblr' ),
			'all_items'				=> __( 'Todos', 'emblr' ),
			'view_item'				=> __( 'Ver testimonios', 'emblr' ),
			'search_items'			=> __( 'Buscar testimonio', 'emblr' ),
			'not_found'				=> __( 'Hasta ahora no hay testimonios.', 'emblr' ),
			'not_found_in_trash'	=> __( 'No encontrado en la papelera', 'emblr' )

		);

		## Argumentos para registrar Custom Post Type
		$args = array(

			'labels'				=> $labels,
			'description'			=> __( 'Añade referencias de personas al sitio web', 'emblr' ),
			'capability_type'		=> 'post',
			'public'				=> true,
			'menu_icon'				=> 'dashicons-format-quote',
			'menu_position'			=> 20,
			'exclude_from_search'	=> true,
			'show_in_nav_menus'		=> false,
			'supports'				=> array( 'custom_fields' )

		);

		## Se registra Custom Post Type
		register_post_type( 'testimonio', $args );

	}

	add_action( 'init', 'register_testimonio_custom_post_type' );



	/**
	*
	*	Agrega Custom Fields como columnas en el listado de posts
	*
	*/
	function add_testimonio_acf_columns ( $columns ) {

		## Juntamos columnas existentes con las indicadas
		$fields = array(

			'cb'			=> $columns['cb'],
			'title'			=> '#',
			'perfil'		=> '',
			'nombre'		=> __( 'Nombre', 'emblr' ),
			'ocupacion'		=> __( 'Ocupación', 'emblr' ),
			'recomendacion' => __( 'Recomendación', 'emblr' ),
			'date'			=> $columns['date']

		);

		return $fields;

	}

	add_filter( 'manage_testimonio_posts_columns', 'add_testimonio_acf_columns' );



	/**
	*
	*	Agrega los valores correspondientes en cada Custom Field 
	*
	*/
	function add_testimonio_acf_column_values ( $column, $post_id ) {

		switch ( $column ) {

			case 'nombre':

				echo get_field( 'nombre', $post_id );
				break

			;


			case 'ocupacion':

				echo get_field( 'ocupacion', $post_id );
				break

			;


			case 'perfil':

				$profile_img = get_field( 'perfil', $post_id );

				if ( ! empty( $profile_img ) )
					echo "<img src=\"{$profile_img[sizes][thumbnail]}\" style=\"border-radius:50%\">"
				;

				break

			;


			case 'recomendacion':

				echo '"' . get_field( 'recomendacion', $post_id ) . '"';
				break;

			;

		}

	}

	add_action( 'manage_testimonio_posts_custom_column', 'add_testimonio_acf_column_values', 10, 2 );



	/**
	*
	*	Genera títulos autoincrement para nuevos custom post types "testimonio"
	*
	*/
	function autoincrement_testimonio_post_title ( $post ) {

		$posts_status = [ 'publish', 'future', 'draft', 'pending', 'private', 'trash' ];

		if( $post['post_type'] == 'testimonio' ) {

			## Actualizamos título sólo si post no existe actualmente en algún estado
			if ( ! in_array( $post['post_status'], $posts_status ) ) {

			    ## Contamos la cantidad de posts tipo "testimonio"
			    $posts_count = wp_count_posts( 'testimonio' );
			    ## Obtenemos sólo la cantidad de publicados
			    $published_posts_count = $posts_count->publish;
			    ## Obtenemos el índice numérico para el nuevo título de post
			    $new_post_position = $published_posts_count + 1;
			    ## Asignamos el título al nuevo post de forma automática
				$post['post_title'] = "Testimonio #$new_post_position";

			}

		}

		return $post;

	}

	add_filter( 'wp_insert_post_data' , 'autoincrement_testimonio_post_title' , '99', 2 );


?>