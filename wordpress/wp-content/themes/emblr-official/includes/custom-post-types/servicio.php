<?php


/**
*
*	Ensambler Official: Custom Post Type "Servicio"
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
	*	Registra "Servicio" Custom Post Type
	*
	*/
	function register_servicio_custom_post_type ( ) {

		## Mensajes Custom Post Type en Admin
		$labels = array(

			'name'					=> __( 'Servicios', 'emblr' ),
			'singular_name'			=> __( 'Servicio', 'emblr' ),
			'add_new'				=> __( 'Añadir nuevo', 'emblr' ),
			'add_new_item'			=> __( 'Nuevo servicio', 'emblr' ),
			'edit_item'				=> __( 'Editar servicio', 'emblr' ),
			'new_item'				=> __( 'Nuevo servicio', 'emblr' ),
			'all_items'				=> __( 'Todos', 'emblr' ),
			'view_item'				=> __( 'Ver servicios', 'emblr' ),
			'search_items'			=> __( 'Buscar servicio', 'emblr' ),
			'not_found'				=> __( 'Hasta ahora no hay servicios.', 'emblr' ),
			'not_found_in_trash'	=> __( 'No encontrado en la papelera', 'emblr' )

		);

		## Argumentos para registrar Custom Post Type
		$args = array(

			'labels'				=> $labels,
			'description'			=> __( 'Añade servicios ofrecidos en el sitio web', 'emblr' ),
			'capability_type'		=> 'post',
			'public'				=> true,
			'menu_icon'				=> 'dashicons-feedback',
			'menu_position'			=> 20,
			'exclude_from_search'	=> false,
			'show_in_nav_menus'		=> false,
			'supports'				=> array( 'title', 'editor', 'custom_fields' )

		);

		## Se registra Custom Post Type
		register_post_type( 'servicio', $args );

	}

	add_action( 'init', 'register_servicio_custom_post_type' );



	/**
	*
	*	Agrega Custom Fields como columnas en el listado de posts
	*
	*/
	function add_servicio_acf_columns ( $columns ) {

		## Juntamos columnas existentes con las indicadas
		$fields = array(

			'cb'			=> $columns['cb'],
			'title'			=> __( 'Servicio', 'emblr' ),
			'descr'			=> __( 'Descripción', 'emblr' ),
			'icono'			=> '',
			'date'			=> $columns['date']

		);

		return $fields;

	}

	add_filter( 'manage_servicio_posts_columns', 'add_servicio_acf_columns' );



	/**
	*
	*	Agrega los valores correspondientes en cada Custom Field 
	*
	*/
	function add_servicio_acf_column_values ( $column, $post_id ) {

		switch ( $column ) {

			case 'icono':

				echo
					'<span style="font-size:32px;display:block;text-align:center">' .
						get_field( 'icono', $post_id ) .
					'</span>'
				;
				
				break

			;


			case 'descr':

				echo get_post_field( 'post_content', $post_id );
				break

			;

		}

	}

	add_action( 'manage_servicio_posts_custom_column', 'add_servicio_acf_column_values', 10, 2 );



	/**
	*
	*	Agrega soporte para Fontawesome en Admin
	*
	*/
	function admin_servicio_style ( ) {

		wp_enqueue_style( 'admin-styles', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css' );

	}

	add_action( 'admin_enqueue_scripts', 'admin_servicio_style' );



	/**
	*
	*	Añade vista previa del icono fontawesome seleccionado
	*
	*/
	function servicio_add_icon_preview_on_field ( $field ) {

		global $post;

		
		if ( $post->post_type == 'servicio' and $field['_name'] == 'icono' ) {

			$icon = get_field( 'icono', $post_id );

			if ( $icon ) {

				echo
					'<span style="font-size:48px;margin-bottom:10px;display:block">' .
						$icon .
					'</span>'
				;

			}
			
		}

	}

	add_action( 'acf/render_field/type=text', 'servicio_add_icon_preview_on_field', 1, 1 );


?>