<?php


/**
*
*	Ensambler Official: functions and definitions
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
	


	/*
	*
	*	Se registra menú principal
	*
	*/
	function register_main_menu( ) {

		if ( function_exists('register_nav_menu') )
			register_nav_menu( 'menu-principal', __('Menú principal', 'emblr') );

	}

	add_action( 'after_setup_theme', 'register_main_menu' );



	/*
	*
	*	Habilita sistema de administración del tema
	*
	*/
	function enable_theme_admin_options( ) {

		if ( function_exists('acf_add_options_page') ) {

			acf_add_options_page(array(

				'page_title' 	=> __( 'Ensambler · Opciones del tema', 'emblr' ),
				'menu_title' 	=> 'Ensambler',
				'menu_slug'		=> 'ensambler-options',
				'capability' 	=> 'edit_posts'

			));


			acf_add_options_sub_page(array(

				'page_title' 	=> __( 'Ajustes del tema: @General', 'emblr' ),
				'menu_title' 	=> __( 'General', 'emblr' ),
				'menu_slug' 	=> 'ensambler-options-general',
				'parent_slug' 	=> 'ensambler-options'

			));


			acf_add_options_sub_page(array(

				'page_title' 	=> __( 'Ajustes del tema: @Inicio', 'emblr' ),
				'menu_title' 	=> __( 'Inicio', 'emblr' ),
				'menu_slug' 	=> 'ensambler-options-inicio',
				'parent_slug' 	=> 'ensambler-options'

			));


			acf_add_options_sub_page(array(

				'page_title' 	=> __( 'Ajustes del tema: @Footer' ),
				'menu_title' 	=> __( 'Footer' ),
				'menu_slug' 	=> 'ensambler-options-footer',
				'parent_slug' 	=> 'ensambler-options'

			));

		}

	}

	add_action( 'acf/init', 'enable_theme_admin_options' );



	/**
	*
	*	Registra "Testimonio" Custom Post Type
	*
	*/
	function register_testimonio_custom_post_type( ) {

		## Mensajes Custom Post Type en Admin
		$labels = array(

			'name'					=> __( 'Testimonios', 'emblr' ),
			'singular_name'			=> __( 'Testimonio', 'emblr' ),
			'add_new'				=> __( 'Añadir nuevo', 'emblr'),
			'add_new_item'			=> __( 'Nuevo testimonio', 'emblr'),
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
	*	Agrega Custom Fields como columnas en el listado de posts "testimonio" existentes
	*
	*/
	function add_testimonio_acf_columns( $columns ) {

		## Juntamos columnas existentes con las indicadas
		$fields = array(

			'cb'			=> $columns['cb'],
			'title'			=> '#',
			'perfil'		=> __( 'Cliente', 'emblr' ),
			'nombre'		=> __( 'Nombre', 'emblr' ),
			'ocupacion'		=> __( 'Ocupación', 'emblr' ),
			'recomendacion' => __( 'Recomendación', 'emblr' ),
			'date'			=> $columns['date']

		);

		return $fields;

	}

	add_filter( 'manage_testimonio_posts_columns', 'add_testimonio_acf_columns' );



	/*
	*
	*	Agrega los valores correspondientes en cada Custom Field 
	*
	*/
	function add_testimonio_acf_column_values( $column, $post_id ) {

		switch ( $column ) {

			case 'nombre':

				echo get_field( 'nombre', $post->id );
				break

			;


			case 'ocupacion':

				echo get_field( 'ocupacion', $post->id );
				break

			;


			case 'perfil':

				$profile = get_field( 'perfil', $post->id );

				if ( ! empty( $profile ) ) {

					$thumb_url = $profile['sizes']['thumbnail'];
					echo "<img src=\"$thumb_url\">";
				}

				break

			;


			case 'recomendacion':

				echo get_field( 'recomendacion', $post_id );
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
	function autoincrement_testimonio_post_title( $post ) {

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



	/**
	*
    *   Registra area del menú principal como un área de widgets
	*
    */
	function register_menu_widget_area( ) {
		/**
		*
		 *	Crea un widget area
		 *	@param string|array  Crea un area de widgets de acuerdo a los argumentos
		 *
		 */
		$args = array(

			'name'          => __( 'Menú principal', 'emblr' ),
			'id'            => 'main-menu',
			'description'   => __( 'Agrega widgets en el área del menú principal (recomendado: max. 2)', 'emblr' ),
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'

		);

		## Registramos área de widgets
		register_sidebar( $args );
		
	}

	add_action( 'widgets_init', 'register_menu_widget_area' );



	/**
	*
    *   Registra footer como un área de widgets
	*
    */
	function register_footer_widget_area( ) {
		/**
		*
		 *	Crea un widget area
		 *	@param string|array  Crea un area de widgets de acuerdo a los argumentos
		 *
		 */
		$args = array(

			'name'          => __( 'Footer', 'emblr' ),
			'id'            => 'footer',
			'description'   => __( 'Agrega widgets en el área del footer (capacidad: 4)', 'emblr' ),
			'class'         => '',
			'before_widget' => '<div class="fl-col fl-col-small %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'

		);

		## Registramos área de widgets
		register_sidebar( $args );
		
	}

	add_action( 'widgets_init', 'register_footer_widget_area' );



	/**
	*
	*	Crea widget "Navegación del sitio landing-page (emblr)"
	*
	*/
	function create_landing_navigation_widget( ) {

		## Se carga archivo del widget
		include_once( get_template_directory() . '/includes/widgets/landing_navigation.php' );
		## Se registra widget
		register_widget( 'landing_navigation_widget' );

	}

	add_action( 'widgets_init', 'create_landing_navigation_widget' );



	/**
	*
	*	Crea widget "Información de contacto (emblr)"
	*
	*/
	function create_contact_info_widget( ) {

		## Se carga archivo del widget
		include_once( get_template_directory() . '/includes/widgets/contact_info.php' );
		## Se registra widget
		register_widget( 'contact_info_widget' );

	}

	add_action( 'widgets_init', 'create_contact_info_widget' );



	/**
	*
	*	Crea widget "Suscripción de noticias (emblr)"
	*
	*/
	function create_suscribe_news_widget( ) {

		## Se carga archivo del widget
		include_once( get_template_directory() . '/includes/widgets/suscribe_news.php' );
		## Se registra widget
		register_widget( 'suscribe_news_widget' );

	}

	add_action( 'widgets_init', 'create_suscribe_news_widget' );



	/**
	*
    *   Imprime menú principal (de 1 nivel) en cualquier locación
    *
    *	@param String $classname	nombre de clase para elemento de navegación <nav>
    *
    */
    function custom_wp_nav_menu ( $classname = '' ) {

    	## obtiene menús en idioma adecuado miltilenguaje
	    $theme_menus = get_nav_menu_locations( );
	    ## obtenemos menú principal
	    $main_nav_menu = $theme_menus[ 'menu-principal' ];
	    ## elementos del menú principal (array)
	    $main_nav_menu_items = wp_get_nav_menu_items( $main_nav_menu );


	    ## imprime menú en una lista simple <ul> con class pasada por parámetro
	    if ( !empty( $main_nav_menu_items ) ): ?>

	    <nav<? if ( $classname ): ?> class="<?= $classname ?>"<? endif ?>>
		    <ul>
			<? foreach ( $main_nav_menu_items as $menu_item ):
				if ( $menu_item->post_status == 'publish' ):
					if ( $menu_item->type == 'post_type' ):
						$menu_item_link = str_replace( get_site_url() . '/', '#', $menu_item->url );
					else:
						$menu_item_link = $menu_item->url;
					endif;
				endif
			?>
				<li><a href="<?= $menu_item_link ?>"><?= $menu_item->title ?></a></li>
			<? endforeach ?>
			</ul>
		</nav>

		<? endif;

	}


?>