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
<section id="portafolio" class="s-portafolio target-section section-page">

    <h1 class="sportafolio classic-title" data-aos="fade-up">Portafolio</h1>

    <div class="wrap">
        <!--Creamos marcas, productos y experiencias que la gente ama. Echa un vistazo a nuestros trabajos recientes.-->

        <div class="gallery-wrap">

            <div class="portafolio-header">
                <ul id="filters" class="clearfix" data-aos="fade-up">
                    <li><span class="filter active" data-filter=".print, .strategy, .logo, .web">Todo</span></li>
                    <li><span class="filter" data-filter=".print">Diseño</span></li>
                    <li><span class="filter" data-filter=".strategy">Desarrollo</span></li>
                    <li><span class="filter" data-filter=".logo">Marketing</span></li>
                </ul>
            </div>

            <div id="gallery">

                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy" data-aos="fade-up">
                    <div class="item-folio__thumb">
                        <a href="<?= get_template_directory_uri() ?>/images/portfolio/porta-01.jpg" class="thumb-link" data-size="1000x1000">
                            <img src="<?= get_template_directory_uri() ?>/images/portfolio/porta-01.jpg" alt="" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Murtao
                        </h3>

                        <p class="item-folio__cat">
                            Restorán
                        </p>
                    </div>

                    <a href="http://www.murtao.cl/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>
                </div> <!-- end masonry__brick -->


                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy">
                    <div class="item-folio__thumb">
                        <a href="<?= get_template_directory_uri() ?>/images/portfolio/porta-02.jpg" class="thumb-link" data-size="1000x1000">
                            <img src="<?= get_template_directory_uri() ?>/images/portfolio/porta-02.jpg" alt="" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Cisne Negro
                        </h3>

                        <p class="item-folio__cat">
                            Estudio de grabación
                        </p>
                    </div>

                    <a href="https://www.cisnenegrostudio.com/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>
                </div> <!-- end masonry__brick -->


                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy">
                    <div class="item-folio__thumb">
                        <a href="<?= get_template_directory_uri() ?>/images/portfolio/porta-03.jpg" class="thumb-link" data-size="1000x1000">
                            <img src="<?= get_template_directory_uri() ?>/images/portfolio/porta-03.jpg" alt="" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            DivinaSur
                        </h3>

                        <p class="item-folio__cat">
                            Damas de compañía
                        </p>
                    </div>

                    <a href="https://www.divinasur.cl/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>
                </div> <!-- end masonry__brick -->


                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy">
                    <div class="item-folio__thumb">
                        <a href="<?= get_template_directory_uri() ?>/images/portfolio/porta-04.jpg" class="thumb-link" data-size="1000x1000">
                            <img src="<?= get_template_directory_uri() ?>/images/portfolio/porta-04.jpg" alt="" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Katari Consultores
                        </h3>

                        <p class="item-folio__cat">
                            Consultoria
                        </p>
                    </div>

                    <a href="https://www.katariconsultores.cl/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>
                </div> <!-- end masonry__brick -->


                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy">
                    <div class="item-folio__thumb">
                        <a href="<?= get_template_directory_uri() ?>/images/portfolio/porta-05.jpg" class="thumb-link" data-size="1000x1000">
                            <img src="<?= get_template_directory_uri() ?>/images/portfolio/porta-05.jpg" alt="" />
                        </a>
                    </div>

                    <div class="item-folio__text">
                        <h3 class="item-folio__title">
                            Regenhaus
                        </h3>

                        <p class="item-folio__cat">
                            Corredora de Propiedades
                        </p>
                    </div>

                    <a href="https://www.regenhaus.cl/" class="item-folio__project-link" title="Project link">
                        <i class="icon-link"></i>
                    </a>

                    <div class="item-folio__caption">
                        <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                    </div>
                </div> <!-- end masonry__brick -->

                <!--
                <div class="masonry__brick item-folio gallery-item print " href="#" data-cat="print" data-aos="fade-up">
                    <div class="item-folio__thumb">
                        <a href="https://unsplash.it/1000/1000?image=1079" class="thumb-link" data-size="1000x1000">
                            <img src="https://unsplash.it/1000/1000?image=1079" alt="" />
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


                <div class="masonry__brick item-folio gallery-item web " href="#" data-cat="web" data-aos="fade-up">
                    <div class="item-folio__thumb">
                        <a href="https://unsplash.it/1000/1000?image=1078" class="thumb-link" data-size="1000x1000">
                            <img src="https://unsplash.it/1000/1000?image=1078" alt="" />
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


                <div class="masonry__brick item-folio gallery-item strategy " href="#" data-cat="strategy" data-aos="fade-up">
                    <div class="item-folio__thumb">
                        <a href="https://unsplash.it/1000/1000?image=1077" class="thumb-link" data-size="1000x1000">
                            <img src="https://unsplash.it/1000/1000?image=1077" alt="" />
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


                <div class="masonry__brick item-folio gallery-item web strategy" href="#" data-cat="web strategy" data-aos="fade-up">
                    <div class="item-folio__thumb">
                        <a href="https://unsplash.it/1000/1000?image=1071" class="thumb-link" data-size="1000x1000">
                            <img src="https://unsplash.it/1000/1000?image=1071" alt="" />
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
                </div> <!-- end masonry__brick -->

            </div><!--/gallery-->

        </div><!--/gallery-wrap-->

    </div> <!-- /wrap -->

</section>


















