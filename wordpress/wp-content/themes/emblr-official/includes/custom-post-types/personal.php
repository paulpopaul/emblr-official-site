<?php


/**
*
*	Ensambler Official: Custom Post Type "Personal"
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
	*	Registra "Personal" Custom Post Type
	*
	*/
	function register_personal_custom_post_type ( ) {

		## Mensajes Custom Post Type en Admin
		$labels = array(

			'name'					=> __( 'Personal', 'emblr' ),
			'singular_name'			=> __( 'Persona', 'emblr' ),
			'add_new'				=> __( 'Añadir nueva persona', 'emblr' ),
			'add_new_item'			=> __( 'Nueva persona', 'emblr' ),
			'edit_item'				=> __( 'Editar persona', 'emblr' ),
			'new_item'				=> __( 'Nueva persona', 'emblr' ),
			'all_items'				=> __( 'Todos', 'emblr' ),
			'view_item'				=> __( 'Ver personas', 'emblr' ),
			'search_items'			=> __( 'Buscar persona', 'emblr' ),
			'not_found'				=> __( 'Hasta ahora no hay personas.', 'emblr' ),
			'not_found_in_trash'	=> __( 'No encontrado en la papelera', 'emblr' )

		);

		## Argumentos para registrar Custom Post Type
		$args = array(

			'labels'				=> $labels,
			'description'			=> __( 'Añade personas al equipo de Ensambler', 'emblr' ),
			'capability_type'		=> 'post',
			'public'				=> true,
			'menu_icon'				=> 'dashicons-admin-users',
			'menu_position'			=> 20,
			'exclude_from_search'	=> false,
			'show_in_nav_menus'		=> false,
			'supports'				=> array( 'title', 'custom_fields' ),
			'rewrite' 				=> array( 'slug' => 'equipo' )

		);

		## Se registra Custom Post Type
		register_post_type( 'personal', $args );

	}

	add_action( 'init', 'register_personal_custom_post_type' );



	/**
	*
	*	Agrega Custom Fields como columnas en el listado de posts
	*
	*/
	function add_personal_acf_columns ( $columns ) {

		## Juntamos columnas existentes con las indicadas
		$fields = array(

			'cb'			=> $columns['cb'],
			'title'			=> __( 'Nombre', 'emblr' ),
			'ocupacion'		=> __( 'Ocupación', 'emblr' ),
			'resena' 		=> __( 'Reseña', 'emblr' ),
			'perfil'		=> '',

		);

		return $fields;

	}

	add_filter( 'manage_personal_posts_columns', 'add_personal_acf_columns' );



	/**
	*
	*	Agrega los valores correspondientes en cada Custom Field 
	*
	*/
	function add_personal_acf_column_values ( $column, $post_id ) {

		switch ( $column ) {

			case 'ocupacion':

				echo get_field( 'ocupacion', $post_id );
				break

			;


			case 'perfil':

				$profile_img = get_field( 'perfil', $post_id );

				if ( ! empty( $profile_img ) )
					echo "<img src=\"{$profile_img['sizes']['thumbnail']}\" style=\"border-radius:50%;display:block;margin:0 auto\">"
				;

				break

			;


			case 'resena':

				echo '"' . get_field( 'resena', $post_id ) . '"';
				break;

			;

		}

	}

	add_action( 'manage_personal_posts_custom_column', 'add_personal_acf_column_values', 10, 2 );

?>