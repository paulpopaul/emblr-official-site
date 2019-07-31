<?php

/**
*
*   Template Name: Servicios
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


<!-- services
================================================== -->
<section class="s-services target-section section-page">
    <h1 data-aos="fade-up"> <? the_title() ?> </h1>
    <p data-aos="fade-up"> <?= get_field( 'subtitulo', $post->ID ) ?> </p>

    <div class="row-services" data-aos="fade-up">

            <div class="box">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fa fa-laptop" aria-hidden="true"></i>
                        <div class="title"><h1>Desarrollo de sitios web</h1></div>
                        <hr/>
                        <p><strong>Ensambler crea tu página web para empresas o servicios, con diseños modernos, profesionales y 100% autoadministrables. Te ayudamos a obtener el éxito, haciendo uso de tecnologías acordes a la actualidad, que refleje tu imagen corporativa con diseños 100% personalizados.</strong></p>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                        <div class="title"><h1>Aplicaciones y plafatorma web</h1></div>
                        <hr/>
                        <p><strong>Llevamos tu idea a ser realizada, creando aplicaciones de tipo web, en donde los usuarios puedan ejecutarlas con facilidad a través de un navegador, sin necesidad de un instalador, estableciendo una potente comunicación entre los usuarios y la información.</strong></p>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i>
                        <div class="title"><h1>Diseño web (UI/UX)</h1></div>
                        <hr/>
                        <p><strong>Somos especialistas en el diseño de páginas web, adaptándonos a su necesidad, nuestras premisas son la usabilidad, innovación y creación de estilos que te permitan ser diferente a la competencia. Te apoyamos con la integración de medios que permitan apoyar el concepto que quieres darle a tu proyecto.</strong></p>
                    </div>
                </div>
            </div>
     
    </div>



    <div class="row-services" data-aos="fade-up">

            <div class="box hidden">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fas fa-utensils"></i>
                        <div class="title"><h1>Sistema de venta (POS)</h1></div>
                        <hr/>
                        <p><strong>Tienes un local de ventas?,tenemos soluciones que te permitirán realizaras con eficiencia y exactitud. Realizamos aplicaciones de administración que se utilicen para monitorear tu negocio en línea, gestionar lo pedidos, optimizar operaciones, reducción de costos,entre otras soluciones para mejorar cada aspecto de su negocio. </strong></p>
                    </div>
                </div>
            </div>

            <div class="box hidden">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fas fa-file-code"></i>
                        <div class="title"><h1>Aplicaciones de administración (CRUD)</h1></div>
                        <hr/>
                        <p><strong>Crea, lee, actualiza y borra cualquier dato de tu sistema web a través de la integración CRUD, podrás ser el administrador de tu plataforma, de forma fácil y eficiente.</strong></p>
                    </div>
                </div>
            </div>

            <div class="box hidden">
                <div class="box-container">
                    <div class="box-content">
                        <i class="fa fa-server" aria-hidden="true"></i>
                        <div class="title"><h1>Configuración de servidores</h1></div>
                        <hr/>
                        <p><strong>Si no sabes cuál es el mejor servicio que requiere tu empresa para llevar a cabo sus proyectos, Ensambler se centra en los objetivos de negocio para buscar cuál es el servidor con mayor rendimiendo, escalable y seguro que se adopte a los requerimientos de su proyecto.</strong></p>
                    </div>
                </div>
            </div>
     
    </div>
    


    <div class="row-services" data-aos="fade-up">

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <div class="title"><h1>Posicionamiento web (SEO)</h1></div>
                    <hr/>
                    <p><strong>Nos destacamos dentro del rubro del posicionamiento web, y llevamos tu sitio a los primeros lugares del buscador, para aumentar el rendimiento de tu compañía, buscando generar un aumento en tus cotizaciones y ventas</strong></p>
                </div>
            </div>
        </div>

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fas fa-chart-line"></i>
                    <div class="title"><h1>Analiticas y estadísticas para sitios web</h1></div>
                    <hr/>
                    <p><strong>Realizamos todo el proceso de anàlisis de tu sitio web, haciendo uso de Google Analytics, podemos determinar el comportamiento de los visitantes de tu sitio, cuáles son las páginas que visitan más, tiempo entre cada una.</strong></p>
                </div>
            </div>
        </div>
        
        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <div class="title"><h1>Tiendas de venta Online</h1></div>
                    <hr/>
                        <p><strong>Te ofrecemos todo lo que necesitas para potenciar tu tienda online y administrar tus ventas. Diseñamos la experiencia de usuario, enfocándonos en entender profundamente tus objetivos y clientes. También te ofrecemos soporte y mantención encargandonos de que tu sistema esté actualizado y operativo.</strong>
                        </p>
                </div>
            </div>
        </div>
     
    </div>


    <div class="row-services" data-aos="fade-up">

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fab fa-paypal"></i>
                    <div class="title"><h1>Integración de medios de pago (WebPay)</h1></div>
                    <hr/>
                    <p><strong>La nueva manera de vender es a través de sitios web, si lo que quieres es integrar un sistema de este tipo, nuestro equipo tiene la experiencia y conocimiento para que transformes tu proyecto en un punto de venta online 100% confiable.</strong></p>
                </div>
            </div>
        </div>   

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fas fa-mobile"></i>
                    <div class="title"><h1>Aplicaciones móviles</h1></div>
                    <hr/>
                    <p><strong>Diseñamos y desarrollamos tu aplicación móvil de forma creativa. Creemos que el diseño de la experiencia de usuario es fundamental, es por esto que hacemos uso de útimas tecnologías, desarrollo de aplicaciones híbridas que pueden ser visualizadas en cualquier sistema operativo.</strong></p>
                </div>
            </div>
        </div>
        
        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fas fa-envelope"></i>
                    <div class="title"><h1>Email de Marketing</h1></div>
                    <hr/>
                    <p><strong>Envíe fácilmente sus boletines informátivos y campañas de marketing por e-mail. Nuestro equipo puede crear e-mail personalizados que se adapten a cualquier pantalla permitiendole además crear informes de campañá detallados y seguir sus envíos en tiempo real.</strong></p>
                </div>
            </div>
        </div>
     
    </div>

    <div class="row-services" data-aos="fade-up">

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <div class="title"><h1>Soporte de aplicaciones web y mantenimiento</h1></div>
                    <hr/>
                    <p><strong>Nuestro equipo está altamente capacitado para mantener tu aplicación o sitio web en correcto funcionamiento y siempre actualizado.</strong></p>
                </div>
            </div>
        </div>

        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="far fa-handshake"></i>
                    <div class="title"><h1>Asesoría y consultoría de proyectos</h1></div>
                    <hr/>
                    <p><strong>Podemos asesorar tu empresa en ámbitos comerciales y en tecnologías de la información. A través de nuestra asesoría e integración de nuevas tecnologías, podemos aumentar o mejorar la rentabilidad de tu empresa a través de sistemas financieros o ayudando a la mejora de tu imágen corporativa.</strong></p>
                </div>
            </div>
        </div>
        
        <div class="box hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fab fa-google"></i>
                    <div class="title"><h1>Integración de servicios Google</h1></div>
                    <hr/>
                    <p><strong>Todas las potentes herramientas de Google para trabajar con mayor eficiencia y hacer crecer tu negocio, edita y comparte documentos, hojas de cálculo, presentaciones, y archivos. Obten ingresos publicitando anuncios en tu sitio web y paga sólo por resultados, creando campañas eficientes.</strong></p>
                </div>
            </div>
        </div>
     
    </div>


    <!-- Clase que se activa cuando esta en modalidad Tablet -->
    <div class="row-services tablet" data-aos="fade-up">

        <div class="box responsive hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                    <div class="title"><h1>Diseño web (UI/UX)</h1></div>
                        <hr/>
                        <p><strong>Somos especialistas en el diseño de páginas web, adaptándonos a su necesidad, nuestras premisas son la usabilidad, innovación y creación de estilos que te permitan ser diferente a la competencia. Te apoyamos con la integración de medios que permitan apoyar el concepto que quieres darle a tu proyecto.</strong></p>
                    </div>
            </div>
        </div>

        <div class="box responsive hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-server" aria-hidden="true"></i>
                    <div class="title"><h1>Configuración de servidores</h1></div>
                        <hr/>
                        <p><strong>Si no sabes cuál es el mejor servicio que requiere tu empresa para llevar a cabo sus proyectos, Ensambler se centra en los objetivos de negocio para buscar cuál es el servidor con mayor rendimiendo, escalable y seguro que se adopte a los requerimientos de su proyecto.</strong></p>
                    </div>
            </div>
        </div>
    </div>


    <div class="row-services tablet" data-aos="fade-up">

        <div class="box responsive hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <div class="title"><h1>Tiendas de venta Online</h1></div>
                        <hr/>
                        <p><strong>Te ofrecemos todo lo que necesitas para potenciar tu tienda online y administrar  la realización de ventas. Diseñamos la experiencia de usuario, enfocándonos en entender profundamente tus objetivos y clientes. También te ofrecemos soporte y mantención encargandonos de que tu sistema esté actualizado y operativo.</strong>
                        </p>
                </div>
            </div>
        </div>

        <div class="box responsive hidden">
            <div class="box-container">
                <div class="box-content">
                    <i class="fas fa-desktop"></i>
                    <div class="title"><h1>Email de Marketing</h1></div>
                    <hr/>
                    <p><strong>Envíe fácilmente sus boletines informátivos y campañas de marketing por e-mail. Nuestro equipo puede crear e-mail personalizados que se adapten a cualquier pantalla permitiendole además crear informes de campañá detallados y seguir sus envíos en tiempo real.</strong></p>
                </div>
            </div>
        </div>
    </div>


    
</section> <!-- end s-services -->