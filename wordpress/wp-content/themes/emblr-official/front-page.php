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
                <input class="search-field" id="search-field" type="text" placeholder="Buscar" />
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
        <!-- --> <? require_once("sub-sections/noticias.php") ?>

    <? require_once("custom-pages/testimonials.php") ?>
    <!-- --> <? require_once("sub-sections/lo-que-dicen-nuestros-clientes.php") ?>
    <!-- --> <? require_once("sub-sections/apartado-1.php") ?>

    <? require_once("custom-pages/contacto.php") ?>


    <!-- footer
    ================================================== -->
    <? get_footer() ?>

