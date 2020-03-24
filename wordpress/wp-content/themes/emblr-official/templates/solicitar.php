<?php get_header() ?>

<body id="solicitud-plan" class="<? emblr_theme() ?>">

    <!-- Contenido solicitud de planes -->

    <!-- sobre nosotros
================================================== -->
<section id="solicitar-plan" class="s-solicitar-plan target-section section-page">
    <div class="features-content">
        <div class="icon"> <i class="flaticon-trip"></i> </div>
        <h1> Solicitud de plan </h1>
        <h3> Resumen del plan solicitado <h3>

    <div class="list-form-items">
        <div class="items-body">
                            <ul>
                                <li> Secciones <b> 1 </b></li>
                                <hr>
                                <li> Idiomas <b> 1 </b></li>
                                <hr>
                                <li> Formulario <b> 1 </b></li>
                                <hr>
                                <li> Cuentas de Email <b> 1 </b></li>
                                <hr>
                                <li> Preguntas de Diseño <b> Si </b></li>
                                <hr>
                                <li> Integración Redes sociales <b> 6 </b></li>
                                <hr>
                                <li> Autoadministrable <b> No </b></li>
                            </ul>
        </div> 
           <div class="form">
                <form id="form-traditional" class="form-tradicional">
                <div>
                    <pre>Nombre</pre>
                    <input type="text" name="nombre" class="nombre" required autofocus>
                </div>
                <div>
                    <pre>Correo</pre>
                    <input type="email" name="email" class="email" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div>
                    <pre>Consulta</pre>
                    <textarea name="consulta" class="subject" maxlength="150" minlength="15" required></textarea>
                </div>
                </form> <!-- traditional-form -->  
            </div>
    </div>
        <div class="button-send-form">
            <a href="/solicitar?plan=simple" class="send-order-btn">Enviar</a>
        </div>

    </div>

</section>





    <!-- Contenido solicitud de planes -->


    <?php //get_footer() ?>