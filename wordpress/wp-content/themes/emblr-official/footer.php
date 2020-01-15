    <?php

        /*
        *   Registro marca
        */
        $registro_marca = get_field( 'registro_marca', 'options' );


        /*
        *   Redes sociales footer
        */
        $redes_footer = get_field( 'redes_footer', 'options' );

    ?>


    <footer>
        <div class="row">
            <div class="col-full ss-copyright">
                <div class="fl-col-group" id="footer-widgets">

                    <? dynamic_sidebar( "footer" ) ?>

                </div>
            </div>

            <!-- Inicio Footer Final -->
            <div class="fl-col-group footer-bottom">
                <div class="fl-col-group">
                    <div class="fl-rich-text marca">
                        <p>
                            <span><?= date('Y') ?></span><span>&nbsp;ENSAMBLER&reg;</span>
                            <br>
                            <span><?= $registro_marca['derechos'] ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <? if ( $redes_footer ): ?>
            <div class="fl-col-group"> 
                <div class="fl-col-group social">
                    <? global $social_links; ?>

                    <? foreach ( $social_links as $social_name => $social ): ?>
                    <? if ( $social ):
                        switch ( $social_name ):
                            case "facebook": $social_name .= "-f"; break;
                            case "linkedin": $social_name .= "-in"; break;
                        endswitch
                    ?>

                    <a href="<?= $social['url'] ?>" target="<?= $social['target'] ?>">
                        <i class="fab fa-<?= $social_name ?>" aria-hidden="true"></i>
                    </a>
                    
                    <? endif ?>
                    <? endforeach ?>
                </div>
            </div>
            <? endif ?>
        </div>


        <? global $navegacion_scroll ?>
        
        <? if ( $navegacion_scroll ): ?>
        <div class="footer__scroll">
            <a href="#home" class="scroll-link smoothscroll">
                Volver
            </a>
        </div>
        <? endif ?>

    </footer>



    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->

    <!-- Java Script
    ================================================== -->
    <script src="<?= get_template_directory_uri() ?>/js/jquery-3.2.1.min.js"></script>

    <script src="<?= get_template_directory_uri() ?>/js/plugins.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
	<script src="<?= get_template_directory_uri() ?>/js/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typeit@6.0.3/dist/typeit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js"></script>

    <script src="<?= get_template_directory_uri() ?>/js/shuffle-text.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/main.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/terminal-functions.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/contact-map.js"></script>

    <? wp_footer() ?>

</body>
</html>