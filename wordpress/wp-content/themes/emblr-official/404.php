<?php get_header() ?>

<body id="not-found" class="<? emblr_theme() ?>">

    <!-- Contenido página 404 aquí -->

    <div id="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="notfound">
            <div class="notfound-404">
                <h1> 404 </h1>
            </div>

            <h2> <?= __( 'PAGINA NO ENCONTRADA', 'emblr' ) ?> </h2>

            <div class="notfoundtext">
                <p> <?= __( 'La página que busca podría haberse eliminado o no está disponible temporalmente', 'emblr' ) ?> </p>
            </div>
            
            <a class="pag-inicio" href="<?= home_url() ?>"> <?= __( 'PAGINA DE INICIO', 'emblr' ) ?> </a>

            <?

                /*
                *   Redes menú
                */
                $redes_menu = get_field( 'redes_menu', 'options' );

            ?>

            <?  if ( $redes_menu ):  ?>

            <div class="notfound-social">

                <?  global $social_links  ?>

                <?  foreach ( $social_links as $social_name => $social ) :  ?>

                <?  if ( $social ) :

                    switch ( $social_name ) :
                        case "facebook": $social_name .= "-f";      break;
                        case "linkedin": $social_name .= "-in";     break;
                    endswitch
                ?>

                <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                    <i class="fab fa-<?= $social_name ?>"></i>
                </a>

                <?  endif  ?>
                <?  endforeach  ?>

            </div> <!-- notfound-social -->

            <?  endif  ?>

        </div>
    </div>

    <!-- Contenido página 404 aquí -->


    <!-- Check for Theme function -->
    <script src="<?= get_template_directory_uri() ?>/js/emblr-theme.js"></script>
    <!-- Check for Theme function -->


    <?php //get_footer() ?>