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

                    <!-- Inicio Sobre Nosotros -->
                    <div class="fl-col  fl-col-small">
                        <div class="footer-sobrenosotros">
                            <h1><span>Sobre nosotros</span></h1>
                            <p align="left">
                                Ensambler cree en tus sueños, y es por eso que queremos brindarte la mejor asesoría e infraestructura del mercado, aquellos que te permitan hacerlo realidad.
                            </p>
                            <p>
                                <span><a href="sitioleermás"> Leer más...</a></span>
                            </p>
                        </div>
                    </div>
                    <!-- Final sobre nosotros -->

                    <!-- Inicio Sitio -->
                    <div class="fl-col fl-col-small">
                        <div class="vineta-sitio">
                           <h1><span>Sitio</span></h1>
                            <a href="inicio.php"> Inicio </a></br>
                            <a > Sobre Nosotros</a></br>
                            <a > Servicios</a></br>
                            <a >Portafolio</a></br>
                            <a >Contacto</a></br>
                        </div>
                    </div>

                    <!-- Inicio Contacto -->
                    <div class="fl-col fl-col-small">
                        <div class="textoContacto">
                            <h1><span ><span>Contacto</span></span></h1>
                            <p align="left"> Telefono: +569 99887744 
                                <br> Email: Info@ensambler.cl
                                <br> Direccion: #1
                                <br> Direccion: #2
                            </p>
                        </div>
                    </div>

                    <!-- Inicio suscríbete -->
                    <div class="fl-col  fl-col-small">
                         <div class="suscribete">
                            <h1><span>Suscribete</span></h1>
                            <p align="left"> Recibe noticias, novedades y más...</p>
                            <div class="input-group">
                                <input id="entradaCorreo" placeholder="Ingresa tu email" type="text">
                                <button>Enviar</button>
                            </div>
                        </div>
                    </div>
                    <!-- Final Suscríbete -->
                </div> 

            <!-- Inicio Footer Final -->
            <div class="fl-col-group footergeneral">
                <div class="fl-col-group">
                    <div class="fl-rich-text marca">
                        <p>
                            <span>2019</span><span>ENSAMBLER</span><br>
                            <span>TODOS LOS DERECHOS RESERVADOS</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="fl-col-group"> 
                <div class="fl-col-group social">
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-behance" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
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