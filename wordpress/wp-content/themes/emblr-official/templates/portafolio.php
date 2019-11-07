<?php

/**
 *
 *   Template Name: Portafolio
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



/*
*
*   Objeto post (página)
*
*/
global $post;


?>



<!-- Portafolio
================================================== -->

<div class="wrap">
    <h1>Portafolio</h1>

    Creamos marcas, productos y experiencias que la gente ama. Echa un vistazo a nuestros trabajos recientes.

    <div class="gallery-wrap">

        <ul id="filters" class="clearfix">
            <li><span class="filter active" data-filter=".print, .strategy, .logo, .web">Todo</span></li>
            <li><span class="filter" data-filter=".print">Diseño</span></li>
            <li><span class="filter" data-filter=".strategy">Desarrollo</span></li>
            <li><span class="filter" data-filter=".logo">Marketing</span></li>
        </ul>

        <div id="gallery">

            <a class="gallery-item logo" href="#" data-cat="logo">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Logo</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1084" alt="" />
                </div>
            </a>

            <a class="gallery-item logo" href="#" data-cat="logo">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Logo</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1083" alt="" />
                </div>
            </a>

            <a class="gallery-item web" href="#" data-cat="web">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Web</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1082" alt="" />
                </div>
            </a>

            <a class="gallery-item print" href="#" data-cat="print">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Print</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1081" alt="" />
                </div>
            </a>

            <a class="gallery-item strategy" href="#" data-cat="strategy">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Strategy</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1080" alt="" />
                </div>
            </a>

            <a class="gallery-item strategy web print" href="#" data-cat="strategy web print">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Strategy. Web. Print.</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1079" alt="" />
                </div>
            </a>

            <a class="gallery-item web" href="#" data-cat="web">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Web.</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1078" alt="" />
                </div>
            </a>

            <a class="gallery-item strategy" href="#" data-cat="strategy">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Strategy.</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1077" alt="" />
                </div>
            </a>

            <a class="gallery-item web strategy" href="#" data-cat="web strategy">
                <div class="inside">
                    <div class="details">
                        <div class="text">
                            <h2>Client Name</h2>
                            <p>Strategy. Web.</p>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="https://unsplash.it/500/500?image=1076" alt="" />
                </div>
            </a>

        </div><!--/gallery-->

    </div><!--/gallery-wrap-->

</div>



















<!--<section id="works" class="s-works target-section">

    <div class="row section-header has-bottom-sep narrow target-section" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Our Works</h3>
            <h1 class="display-1">
            We create brands, products, and experiences that people love. Check out our recent works.
            </h1>
        </div>
    </div> <!-- end section-header -->

    <!--<div class="row masonry-wrap">

        <div class="masonry">

            <div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-shutterbug.jpg" class="thumb-link" title="Shutterbug" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/lady-shutterbug.jpg" 
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/lady-shutterbug.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/lady-shutterbug@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Shutterbug
                        </h3>
                        <p class="item-folio__cat">
                            Branding
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div> <!-- end masonry__brick -->

            <!--<div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-woodcraft.jpg" class="thumb-link" title="Woodcraft" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/woodcraft.jpg" 
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/woodcraft.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/woodcraft@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Woodcraft
                        </h3>
                        <p class="item-folio__cat">
                            Web Design
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div> <!-- end masonry__brick -->
    
            <!--<div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-beetle.jpg" class="thumb-link" title="The Beetle Car" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/the-beetle.jpg"
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/the-beetle.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/the-beetle@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            The Beetle
                        </h3>
                        <p class="item-folio__cat">
                            Web Development
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div> <!-- end masonry__brick -->
    
            <!--<div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-salad.jpg" class="thumb-link" title="Grow Green" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/salad.jpg" 
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/salad.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/salad@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Salad
                        </h3>
                        <p class="item-folio__cat">
                            Branding
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div> <!-- end masonry__brick -->

            <!--<div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-lamp.jpg" class="thumb-link" title="Guitarist" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/lamp.jpg" 
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/lamp.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/lamp@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Lamp
                        </h3>
                        <p class="item-folio__cat">
                            Web Design
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div>  end masonry__brick -->
    
           <!-- <div class="masonry__brick" data-aos="fade-up">
                <div class="item-folio">
                        
                    <div class="item-folio__thumb">
                        <a href="<? echo get_template_directory_uri() ?>/images/portfolio/gallery/g-fuji.jpg" class="thumb-link" title="Palmeira" data-size="1050x700">
                            <img src="<? echo get_template_directory_uri() ?>/images/portfolio/fuji.jpg"
                                 srcset="<? echo get_template_directory_uri() ?>/images/portfolio/fuji.jpg 1x, <? echo get_template_directory_uri() ?>/images/portfolio/fuji@2x.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Fuji
                        </h3>
                        <p class="item-folio__cat">
                            Web Design
                        </p>
                    </div>

                    <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>

                </div>
            </div> <!-- end masonry__brick -->

        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->

</section> <!-- end s-works -->