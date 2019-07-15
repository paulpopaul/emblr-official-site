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

?>