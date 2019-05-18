<? get_header() ?>


<body id="top">
    
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="#">
                <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header-logo -->

        <nav class="header-nav">
            <div class="header-nav__bg"> <!-- blur background efx --> </div>

            <div class="header-nav__content-container">
                <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

                <h3>Navegar a</h3>

                <div class="header-nav__content">
                    
                    <ul class="header-nav__list">
                        <li><a class="smoothscroll"  href="#home">Inicio</a></li>
                        <li><a class="smoothscroll"  href="#about">Sobre Nosotros</a></li>
                        <li><a class="smoothscroll"  href="#services">Servicios</a></li>
                        <li><a class="smoothscroll"  href="#works">Portafolio</a></li>
                        <li><a class="smoothscroll"  href="#contact">Contacto</a></li>
                    </ul>
        
                    <p><a href='#0'>Ensambler</a> cree en tus sueños, y es por eso que queremos brindarte la <b>mejor asesoría e infraestructura del mercado</b>, aquellos que te permitan hacerlos realidad.</p>

                    
        
                    <ul class="header-nav__social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-dribbble"></i></a>
                        </li>
                    </ul>

                </div> <!-- end header-nav__content -->
            <div>

        </nav> <!-- end header-nav -->

        <a class="icon-search">
            <div class="search">
                <input id="search" type="checkbox" /><label class="search-init" for="search"></label>
                <label class="search-active" for="search"></label> 
            <div class="search-border"></div>
                <input class="search-field" id="search-field" type="text" />
            <div class="close-search"></div> 
            </div>
        </a> 



        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


     <!-- pages
    ================================================== -->
    <? require_once("custom-pages/inicio.php") ?>

    <? #require_once("custom-pages/sobre-nosotros.php") ?>

    <? #require_once("custom-pages/servicios.php") ?>

    <? #require_once("custom-pages/portafolio.php") ?>

    <? #require_once("custom-pages/clients.php") ?>

    <? #require_once("custom-pages/testimonials.php") ?>

    <? #require_once("custom-pages/contacto.php") ?>


    <!-- footer
    ================================================== -->
   <footer>
    <div class="row">
        <div class="col-full ss-copyright">
            <div class="fl-col-group">
                <div class="fl-col  fl-col-small" style="width: 25%;">
                    <div class="textoSobreNosotros" style="text-align: left;">
                        <h1><span style="font-size: 30px;"><strong><span style="color: #ffffff;">Sobre nosotros</span></strong></span></h1>
                        <p align="left" style="font-size: 13px; margin-bottom:1rem;">Ensambler cree en tus sueños, y es por eso que queremos brindarte la mejor asesoría e infraestructura del mercado, aquellos que te permitan hacerlo realidad.</p>
                        <p style="font-size: 13px;"><span style="color: #1FBDA2;"><a style="color: #1FBDA2; font-size: 12px;" href="sitioleermás"> Leer más...</a></span></p>
                    </div>
                </div>

                <div class="fl-col fl-col-small" style="width: 25%;">
                    <div class="textoSitio" style="text-align: left; line-height: 25px;">
                       <h1><span style="font-size: 23px;"><strong><span style="color: #ffffff;" >Sitio</span></strong></span></h1>

                        <div class="textosS" style="font-size: 13px;">
                            <strong style="color: #1FBDA2;"><a style="color: #1FBDA2;" href="inicio.php"> Inicio </a></strong></br>
                            <strong style="color: #1FBDA2;"><a style="color: #1FBDA2;"> Sobre Nosotros</a></strong></br>
                            <strong style="color: #1FBDA2;"><a style="color: #1FBDA2;"> Servicios</a></strong></br>
                            <strong style="color: #1FBDA2;"><a style="color: #1FBDA2;">Portafolio</a></strong></br>
                            <strong style="color: #1FBDA2;"><a style="color: #1FBDA2;">Contacto</a></strong></br>
                        </div>
                    </div>
                </div>

                <div class="fl-col fl-col-small" style="width: 25%;">
                    <div class="textoContacto" style="text-align: left;">
                        <h1><span style="font-size: 30px;"><strong><span style="color: #ffffff;">Contacto</span></strong></span></h1>
                        <p align="left" style="font-size: 13px;"> Telefono: +569 99887744 <br> Email: Info@ensambler.cl
                            <br> Direccion: #1
                            <br> Direccion: #2</p>
                    </div>
                </div>

                <div class="fl-col  fl-col-small" style="width: 25%;">
                     <div class="Suscribete" style="text-align: left;">
                        <h1><span style="font-size: 30px;"><strong><span style="color: #ffffff;">Suscribete</span></strong></span></h1>
                        <p align="left" style="font-size: 13px; margin-bottom: 1rem;"> Recibe noticias, novedades y más...</p>
                        <div class="input-group">
                            <input id="entradaCorreo" placeholder="Ingresa tu email" type="text">
                            <!-- <button id=botonEnviar type="submit">Enviar</button> -->
                        </div>

                    </div>
                </div>
            </div> 
        </div>
    </div>
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


<? get_footer() ?>