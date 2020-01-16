<?php


/**
*
*   Main-page base
*
*
*   @version    emblr-official-1
*
*   @author     Ensambler <emblr@ensambler.cl>
*   @copyright  Derechos reservados 2019, Ensambler
*
*   @link       http://www.ensambler.cl/
*
*   @package    WordPress
*   @subpackage emblr
*   @since      5.2.2
*
*/


?>


<?  get_header()  ?>


<body id="main-page" class="<? emblr_theme() ?>">
    
    <!-- ( preloader )
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <? get_template_part( 'template-parts/top-header' ) ?>


     <!-- Páginas
    ================================================== -->
    <?

        /**
        *
        *   Se cargan secciones de la página
        *
        */
        global $main_nav_menu_items;


        foreach ( $main_nav_menu_items as $menu_item ) {

            if ( $menu_item->type == 'post_type' and $menu_item->post_status == 'publish' ) {
                ## Obtenemos ID del post asociado el item menú
                $page_id = $menu_item->object_id;
                ## Obtenemos el template de dicho post
                $template_part_php = get_page_template_slug( $page_id );
                ## Excluímos extensión .php
                $template_part = str_replace( '.php', '', $template_part_php );


                /*
                *
                *   Objeto post (página) para uso dentro de templates:
                *
                */
                $post = get_post( $page_id );


                ## Si existe template, lo cargamos
                if ( $template_part )
                    get_template_part( $template_part );

                ## Si no, usamos el por defecto
                else
                    get_template_part( 'content' );

            }

        }

    ?>



    <!-- Footer
    ================================================== -->
    <?  get_footer()  ?>



