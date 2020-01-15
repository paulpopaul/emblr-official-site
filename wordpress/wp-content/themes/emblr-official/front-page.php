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


    <style>
        body.light-theme #return-to-top{
            background: #242B3F;
        }

        body.light-theme #return-to-top i{
            color: #fff;
        }

        body.dark-theme #return-to-top{
            background: #000;
            border: 2px solid #1FBDA2;
        }

        body.dark-theme #return-to-top i{
            color: #fff;
            left: 21px;
            top: 14px;
        }

        @media only screen and (max-width: 3000px) {
            #return-to-top {
                position: fixed;
                bottom: 17px;
                left: 23px;
                width: 58px;
                height: 58px;
                cursor: pointer;
                -webkit-border-radius: 100px;
                -moz-border-radius: 100px;
                border-radius: 100px;
                z-index: 99;
            }

            #return-to-top i {
                margin: 0;
                position: relative;
                left: 23px;
                top: 15px;
                font-size: 15px;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }

            #return-to-top:hover {
                background: #242B3F;
            }

            #return-to-top:hover i {
                color: #fff;
                top: 12px;
            }
        }

        @media only screen and (max-width: 414px) {
            #return-to-top {
                left: initial;
                right: 8px;
                bottom: 11px;
                text-decoration: none;
            }
        }
    </style>


    <div>
        <a id="return-to-top" class="dissapear"><i class="fas fa-chevron-up"></i></a>
    </div>
    <script>
        $('#inicio').waypoint({
            offset: '-50%',
            handler: function() {
                $('#return-to-top').toggleClass('dissapear');
            }
        });
        
        $('#return-to-top').click(function() {
            scrollTo('#inicio');
        });
    </script>
