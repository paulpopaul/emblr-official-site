<?php

/*
*	functions.php
*
*	tema: ensambler official
*	desarrollado por @Ensambler
*	www.ensambler.cl
*/
	

	/*
	*	Se registra menú principal
	*/
	if ( function_exists("register_nav_menu") )
		register_nav_menu( "menu-principal", "Menú principal" );


	/*
	*	Se registra sistema de administración del tema
	*/
	if ( function_exists("acf_add_options_page") ) {

		acf_add_options_page(array(
			'page_title' => "Ensambler · Opciones del tema",
			'menu_title' => "Ensambler",
			'menu_slug' => "ensambler-options",
			'capability' => "edit_posts"
		));


		acf_add_options_sub_page(array(
			'page_title' => "Ajustes del tema: @General",
			'menu_title' => "General",
			'menu_slug' => "ensambler-options-general",
			'parent_slug' => "ensambler-options"
		));


		acf_add_options_sub_page(array(
			'page_title' => "Ajustes del tema: @Inicio",
			'menu_title' => "Inicio",
			'menu_slug' => "ensambler-options-inicio",
			'parent_slug' => "ensambler-options"
		));


		acf_add_options_sub_page(array(
			'page_title' => "Ajustes del tema: @Footer",
			'menu_title' => "Footer",
			'menu_slug' => "ensambler-options-footer",
			'parent_slug' => "ensambler-options"
		));

	}


	/*
    *   Imprime menú principal en cualquier locación
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
					if ( $menu_item->type == "post_type" ) :
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