    <?php

        /*
        * Registro marca
        */
        $registro_marca = get_field('registro_marca', 'options');


        /*
        * Redes sociales footer
        */
        $redes_footer = get_field('redes_footer', 'options');


        /*
        * Teléfonos
        */
        $telefonos = get_field('telefonos', 'options');


        /*
        * Email principal visible
        */
        $email_principal = get_field('email_principal', 'options');


        /*
        * Sucursal #1
        */
        $sucursal_1 = get_field('sucursal_1', 'options');


        /*
        * Sucursal #2
        */
        $sucursal_2 = get_field('sucursal_2', 'options');

    ?>


    <footer class="target-section">
        <div class="row" data-aos="fade-up">
            <div class="col-full ss-copyright">
                <div class="fl-col-group textos" id="grupo-textos">

                    <!-- Inicio Sobre Nosotros -->
                    <div class="fl-col  fl-col-small">
                        <div class="sobre-nosotros">
                            <h1><span>Sobre Nosotros</span></h1>

                            <p>
                                <strong>Ensambler</strong> cree en tus sueños, y es por eso que queremos brindarte la <strong>mejor asesoría e infraestructura del mercado</strong>, aquellos que te permitan hacerlos realidad.
                            </p>

                            <a class="read-more" href="#"> Leer más ...</a>
                        </div>
                    </div>
                    <!-- Final sobre nosotros -->

                    <!-- Inicio Sitio -->
                    <div class="fl-col fl-col-small">
                        <div class="sitio">
                           <h1>Sitio</h1>

                            <a href="#">Inicio </a>
                            <a href="#">Sobre Nosotros</a>
                            <a href="#">Servicios</a>
                            <a href="#">Portafolio</a>
                            <a href="#">Contacto</a>
                        </div>
                    </div>

                    <!-- Inicio Contacto -->
                    <div class="fl-col fl-col-small">
                        <div class="contacto">
                            <hr> <h1>Contacto</h1>
                            
                            <p>
                                <strong>Teléfono</strong> <span>·</span> <br class="br-hidden"> <?= $telefonos['1'] ?> <br>
                                
                                <? if ( $telefonos['2'] ): ?>
                                <strong>Teléfono #2</strong> <span>·</span> <br class="br-hidden"> <?= $telefonos['2'] ?> <br>
                                <? endif ?>

                                <strong>Email</strong> <span>·</span> <br class="br-hidden"> <?= $email_principal ?>
                            </p>

                            <p>
                                <strong>Dirección · <?= $sucursal_1['ciudad'] ?></strong> <br>
                                <?= $sucursal_1['direccion'] ?>
                            </p>

                            <? if( $sucursal_2['ciudad'] ): ?>
                            <p>
                                <strong>Dirección · <?= $sucursal_2['ciudad'] ?></strong> <br>
                                <?= $sucursal_2['direccion'] ?>
                            </p>
                            <? endif ?>
                            
                        </div>
                    </div>

                    <!-- Inicio suscríbete -->
                    <div class="fl-col fl-col-small">
                         <div class="suscribete">
                            <hr> <h1>Suscríbete</h1>

                            <p> Recibe noticias, novedades y más.</p>

                            <div class="input-group">
                                <input id="suscripcion" placeholder="Ingresa tu email" type="text">
                                <button class="btn">Enviar</button>
                            </div>
                        </div>
                    </div>
                    <!-- Final Suscríbete -->
                </div>
            </div>

            <!-- Inicio Footer Final -->
            <div class="fl-col-group footer-bottom">
                <div class="fl-col-group">
                    <div class="fl-rich-text marca">
                        <p>
                            <span><?= $registro_marca['ano'] ?></span><span>&nbsp;ENSAMBLER</span>
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
    <script src="<?= get_template_directory_uri() ?>/js/shuffle-text.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/main.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/terminal-functions.js"></script>
    <script src="<?= get_template_directory_uri() ?>/js/contact-map.js"></script>

    <? wp_footer() ?>

</body>
</html>