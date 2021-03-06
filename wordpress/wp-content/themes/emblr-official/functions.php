<?php


/**
*
*	Ensambler Official: functions and definitions
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
	*	Se registra menú principal
	*
	*/
	add_action( 'after_setup_theme', 'register_main_menu' );
	function register_main_menu ( ) {

		if ( function_exists( 'register_nav_menu' ) )
			register_nav_menu( 'menu-principal', __( 'Menú principal', 'emblr' ) )
		;

	}



	/**
	*
	*	Habilita sistema de administración del tema
	*
	*/
	add_action( 'acf/init', 'enable_theme_admin_options' );
	function enable_theme_admin_options ( ) {

		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page( array(

				'page_title' 	=> __( 'Ensambler · Opciones del tema', 'emblr' ),
				'menu_title' 	=> 'Ensambler',
				'menu_slug'		=> 'ensambler-options',
				'capability' 	=> 'edit_posts'

			));


			acf_add_options_sub_page( array(

				'page_title' 	=> __( 'Ajustes del tema: @General', 'emblr' ),
				'menu_title' 	=> __( 'General', 'emblr' ),
				'menu_slug' 	=> 'ensambler-options-general',
				'parent_slug' 	=> 'ensambler-options'

			));


			acf_add_options_sub_page( array(

				'page_title' 	=> __( 'Ajustes del tema: @Inicio', 'emblr' ),
				'menu_title' 	=> __( 'Inicio', 'emblr' ),
				'menu_slug' 	=> 'ensambler-options-inicio',
				'parent_slug' 	=> 'ensambler-options'

			));


			acf_add_options_sub_page( array(

				'page_title' 	=> __( 'Ajustes del tema: @Footer' ),
				'menu_title' 	=> __( 'Footer' ),
				'menu_slug' 	=> 'ensambler-options-footer',
				'parent_slug' 	=> 'ensambler-options'

			));

		}

	}



	/**
	*
	*	Añade soporte para imágen destacada en posts (noticias)
	*
	*/
	if ( function_exists( 'add_theme_support' ) )
		add_theme_support( 'post-thumbnails', array( 'post' ) )
	;



	/**
	*
	*	Custom Post Type: "Testimonio"
	*
	*/
	include_once( get_template_directory( ) . '/includes/custom-post-types/testimonio.php' );



	/**
	*
	*	Custom Post Type: "Servicio"
	*
	*/
	include_once( get_template_directory( ) . '/includes/custom-post-types/servicio.php' );



	/**
	*
	*	Custom Post Type: "Personal"
	*
	*/
	include_once( get_template_directory( ) . '/includes/custom-post-types/personal.php' );
	
	
	
	/**
	*
	*	Custom Post Type: "Portafolio"
	*
	*/
	include_once( get_template_directory( ) . '/includes/custom-post-types/portafolio.php' );



	/**
	*
    *   Registra area del menú principal como un área de widgets
	*
	*/
	add_action( 'widgets_init', 'register_menu_widget_area' );
	function register_menu_widget_area ( ) {

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



	/**
	*
    *   Registra footer como un área de widgets
	*
	*/
	add_action( 'widgets_init', 'register_footer_widget_area' );
	function register_footer_widget_area ( ) {

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


	/**
    *
    *	Se registra sidebar de entradas (noticias)
    *
    */
	add_action( 'widgets_init', 'register_post_sidebar' );
	function register_post_sidebar() {

		/**
		*
		 *	Crea una sidebar para entradas
		 *	@param string|array  Crea una sidebar de acuerdo a los argumentos
		 *
		 */
		$args = array(
			'name'			=> 'Sidebar de entradas',
			'id'			=> 'post-sidebar',
			'description'	=> 'Agregar widgets a sidebar de noticias',
			'class'			=> 'sidebar',
			'before_widget'	=> '<div id="%1$s" class="post-sidebar %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h5 class="widget-title">',
			'after_title'	=> '</h5>'
		);

		## Registramos sidebar
		register_sidebar( $args );
	}



	/**
	*
	*	Crea widget "Navegación del sitio landing-page (emblr)"
	*
	*/
	add_action( 'widgets_init', 'create_landing_navigation_widget' );
	function create_landing_navigation_widget ( ) {

		## Se carga archivo del widget
		include_once( get_template_directory( ) . '/includes/widgets/landing_navigation.php' );
		## Se registra widget
		register_widget( 'landing_navigation_widget' );

	}



	/**
	*
	*	Crea widget "Información de contacto (emblr)"
	*
	*/
	add_action( 'widgets_init', 'create_contact_info_widget' );
	function create_contact_info_widget ( ) {

		## Se carga archivo del widget
		include_once( get_template_directory( ) . '/includes/widgets/contact_info.php' );
		## Se registra widget
		register_widget( 'contact_info_widget' );

	}



	/**
	*
	*	Crea widget "Ensambler Social Follow"
	*
	*/
	add_action( 'widgets_init', 'create_social_follow_widget' );
	function create_social_follow_widget ( ) {

		## Se carga archivo del widget
		include_once( get_template_directory( ) . '/includes/widgets/social-follow.php' );
		## Se registra widget
		register_widget( 'social_follow_widget' );

	}



	/**
	 * 
	 * Retorna excerpt más corto para vista de categorías y etiquetas
	 * 
	 */
	add_filter( 'excerpt_length', 'archive_custom_excerpt_length', 999 );
	function archive_custom_excerpt_length( $length ) {

		if( is_category() || is_tag() )
			return 30;

		else
			return $length
		;

	}



	/**
	 * 
	 * 	Agrega clase Light/Dark Theme en body
	 * 
	 */
	function emblr_theme ( ) {

		$emblr_theme = $_COOKIE[ 'emblr_theme' ];

		if ( $emblr_theme )
			echo $emblr_theme;

		else
			echo 'light-theme'
		;
		
	}



	/**
	*
    *   Imprime menú principal (de 1 nivel) en cualquier locación
    *
    *	@param String $classname	nombre de clase para elemento de navegación <nav>
    *
    */
    function custom_wp_nav_menu ( $classname = '' ) {

    	global $main_nav_menu_items;

	    ## imprime menú en una lista simple <ul> con class pasada por parámetro
	    if ( !empty( $main_nav_menu_items ) ) :

	    ?>

	    <nav<? if ( $classname ) : ?> class="<?= $classname ?>"<? endif ?>>

		    <ul>

			<?

			foreach ( $main_nav_menu_items as $menu_item ) :
				## Sólo se cargan páginas de primer nivel del menú
				if ( $menu_item->menu_item_parent == '0' ) :
					## Si página está en estado publicado
					if ( $menu_item->post_status == 'publish' ) :
						## Si es de tipo post
						if ( $menu_item->type == 'post_type' ) :
							## Modificamos enlace para dejarlo de tipo slug -> http://www.ensambler.cl/#menu-item
							$menu_item_link = str_replace( get_site_url() . '/', '#', $menu_item->url );
							## Se agrega la ruta absoluta de la página de inicio del sitio
							$menu_item_link = get_home_url() . $menu_item_link;
							## Se elimina último "/" del hash
							$menu_item_link = substr( $menu_item_link, 0, -1 );
							
							## Si $menu_item_link está vacío entonces se trata de la página de inicio
							if ( !$menu_item_link ) :
								$menu_item_link = '#inicio';
							endif;

						else:
							$menu_item_link = $menu_item->url;

						endif;

					endif;

			?>

				<li> <a href="<?= $menu_item_link ?>" class="smoothscroll"><?= $menu_item->title ?></a> </li>

			<?

				endif;
			endforeach

			?>

			</ul>

		</nav>

		<?

		endif;

	}



	/**
	*
	*	Se obtiene menú principal (multilenguaje) en una variable global
	*
	*/
    $theme_menus = get_nav_menu_locations( );
    $main_nav_menu = $theme_menus[ 'menu-principal' ];
    ## elementos del menú principal (array)
    $main_nav_menu_items = wp_get_nav_menu_items( $main_nav_menu );


?>