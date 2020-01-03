<?php


/**
*
*	Ensambler Official: Custom Post Type "Trabajo"
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
	*	Registra "Trabajo" Custom Post Type
	*
	*/
	add_action( 'init', 'register_trabajo_custom_post_type' );
	function register_trabajo_custom_post_type ( ) {

		## Mensajes Custom Post Type en Admin
		$labels = array(

			'name'					=> __( 'Trabajos', 'emblr' ),
			'singular_name'			=> __( 'Trabajo', 'emblr' ),
			'add_new'				=> __( 'Añadir nuevo', 'emblr' ),
			'add_new_item'			=> __( 'Nuevo trabajo', 'emblr' ),
			'edit_item'				=> __( 'Editar trabajo', 'emblr' ),
			'new_item'				=> __( 'Nuevo trabajo', 'emblr' ),
			'all_items'				=> __( 'Todos', 'emblr' ),
			'view_item'				=> __( 'Ver trabajos', 'emblr' ),
			'search_items'			=> __( 'Buscar trabajo', 'emblr' ),
			'not_found'				=> __( 'Hasta ahora no hay trabajos.', 'emblr' ),
			'not_found_in_trash'	=> __( 'No encontrado en la papelera', 'emblr' )

		);

		## Argumentos para registrar Custom Post Type
		$args = array(

			'labels'				=> $labels,
			'description'			=> __( 'Colección de trabajos realizados en Ensambler', 'emblr' ),
			'capability_type'		=> 'post',
			'public'				=> true,
			'menu_icon'				=> 'dashicons-portfolio',
			'menu_position'			=> 20,
			'exclude_from_search'	=> false,
			'show_in_nav_menus'		=> false,
			'supports'				=> array( 'title', 'custom_fields' )

		);

		## Se registra Custom Post Type
		register_post_type( 'trabajo', $args );

	}



	/**
	*
	*	Agrega Custom Fields como columnas en el listado de posts
	*
	*/
	add_filter( 'manage_trabajo_posts_columns', 'add_trabajo_acf_columns' );
	function add_trabajo_acf_columns ( $columns ) {

		## Juntamos columnas existentes con las indicadas
		$fields = array(

			'miniatura'		=> '',
			'title'			=> $columns[ 'title' ],
			'razon_social'	=> __( 'Razón social', 'emblr' ),
			'categoria'		=> __( 'Categoría', 'emblr' ),
			'enlace'		=> __( 'Enlace', 'emblr' ),
			'date'			=> $columns[ 'date' ]

		);

		return $fields;

	}



	/**
	*
	*	Agrega los valores correspondientes en cada Custom Field 
	*
	*/
	add_action( 'manage_trabajo_posts_custom_column', 'add_trabajo_acf_column_values', 10, 2 );
	function add_trabajo_acf_column_values ( $column, $post_id ) {

		switch ( $column ) {

			case 'miniatura':

				$miniatura = get_field( 'miniatura', $post_id );
				$edit_link = get_edit_post_link( $post_id );

				echo
					"<a href=\"$edit_link\">
						<img src=\"{$miniatura['sizes']['thumbnail']}\">
					</a>"
				;

				break
			;


			case 'razon_social':

				echo get_field( 'razon_social', $post_id );
				break

			;


			case 'categoria':

				$categorias = get_field( 'categoria', $post_id );

				foreach ( $categorias as $categoria ) {
					$categoria_string .=  "{$categoria->name} - ";
				}

				echo substr( $categoria_string, 0, -2 );
				break

			;


			case 'enlace':

				$enlace = get_field( 'enlace', $post_id );

				echo "<a href=\"$enlace\" target=\"_blank\">$enlace</a>";
				break

			;

		}

	}

?>