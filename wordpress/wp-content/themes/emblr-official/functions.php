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
*	@subpackage emblr-official
*	@since 		5.2.2
*
*/
	

	/*
	*
	*	Se registra menú principal
	*
	*/
	if ( function_exists("register_nav_menu") )
		register_nav_menu( "menu-principal", "Menú principal" );



	/*
	*
	*	Se registra sistema de administración del tema
	*
	*/
	if ( function_exists("acf_add_options_page") ) {

		acf_add_options_page(array(
			'page_title' 	=> "Ensambler · Opciones del tema",
			'menu_title' 	=> "Ensambler",
			'menu_slug'		=> "ensambler-options",
			'capability' 	=> "edit_posts"
		));


		acf_add_options_sub_page(array(
			'page_title' 	=> "Ajustes del tema: @General",
			'menu_title' 	=> "General",
			'menu_slug' 	=> "ensambler-options-general",
			'parent_slug' 	=> "ensambler-options"
		));


		acf_add_options_sub_page(array(
			'page_title' 	=> "Ajustes del tema: @Inicio",
			'menu_title' 	=> "Inicio",
			'menu_slug' 	=> "ensambler-options-inicio",
			'parent_slug' 	=> "ensambler-options"
		));


		acf_add_options_sub_page(array(
			'page_title' 	=> "Ajustes del tema: @Footer",
			'menu_title' 	=> "Footer",
			'menu_slug' 	=> "ensambler-options-footer",
			'parent_slug' 	=> "ensambler-options"
		));

	}



	/**
	*
    *   Registra area del menú principal como un área de widgets
	*
    */
	function register_menu_widget_area() {
		/**
		*
		 *	Crea un widget area
		 *	@param string|array  Crea un area de widgets de acuerdo a los argumentos
		 *
		 */
		$args = array(
			'name'          => __( "Menú principal", "emblr-site" ),
			'id'            => "main-menu",
			'description'   => "Agrega widgets en el área del menú principal (recomendado: max. 2)",
			'class'         => "",
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => "</div>",
			'before_title'  => "<h1>",
			'after_title'   => "</h1>"
		);

		## Registramos área de widgets
		register_sidebar( $args );
		
	}

	add_action( "widgets_init", "register_menu_widget_area" );



	/**
	*
    *   Registra footer como un área de widgets
	*
    */
	function register_footer_widget_area() {
		/**
		*
		 *	Crea un widget area
		 *	@param string|array  Crea un area de widgets de acuerdo a los argumentos
		 *
		 */
		$args = array(
			'name'          => __( "Footer", "emblr-site" ),
			'id'            => "footer",
			'description'   => "Agrega widgets en el área del footer (capacidad: 4)",
			'class'         => "",
			'before_widget' => '<div class="fl-col fl-col-small %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => "<h1>",
			'after_title'   => "</h1>"
		);

		## Registramos área de widgets
		register_sidebar( $args );
		
	}

	add_action( "widgets_init", "register_footer_widget_area" );



	/**
	*
	*	Crea widget "Navegación del sitio landing-page (emblr)"
	*
	*/
	function create_landing_navigation_widget( ) {
		## Se carga archivo del widget
		include_once( get_template_directory() . "/includes/widgets/landing_navigation.php" );
		## Se registra widget
		register_widget( "landing_navigation_widget" );
	}

	add_action( "widgets_init", "create_landing_navigation_widget" );



	/**
	*
	*	Crea widget "Información de contacto (emblr)"
	*
	*/
	function create_contact_info_widget( ) {
		## Se carga archivo del widget
		include_once( get_template_directory() . "/includes/widgets/contact_info.php" );
		## Se registra widget
		register_widget( "contact_info_widget" );
	}

	add_action( "widgets_init", "create_contact_info_widget" );



	/**
	*
	*	Crea widget "Suscripción de noticias (emblr)"
	*
	*/
	function create_suscribe_news_widget( ) {
		## Se carga archivo del widget
		include_once( get_template_directory() . "/includes/widgets/suscribe_news.php" );
		## Se registra widget
		register_widget( "suscribe_news_widget" );
	}

	add_action( "widgets_init", "create_suscribe_news_widget" );



	/**
	*
    *   Imprime menú principal (de 1 nivel) en cualquier locación
    *
    *	@param String $classname	nombre de clase para elemento de navegación <nav>
    *
    */
    function custom_wp_nav_menu ( $classname = "" ) {
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
				if ( $menu_item->post_status == "publish" ):
					if ( $menu_item->type == "post_type" ):
						$menu_item_link = str_replace( get_site_url() . "/", "#", $menu_item->url );
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