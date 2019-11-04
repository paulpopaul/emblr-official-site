<?php


/**
*
*   Template Name: Contacto
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


<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section section-page">
  <div class="contact-bg">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 900 720" enable-background="new 0 0 900 720" xml:space="preserve" id="worldmap"></svg>
  </div>

    <h1 data-aos="fade-up"> <? the_title() ?> </h1>
    <p data-aos="fade-up"> <?= get_field( 'subtitulo', $post->ID ) ?> </p>
  
    <div class="contact-content">
    <!-- <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="" data-aos="fade-up"> -->

    <div class="terminal" data-aos="fade-up">
        <div class="terminal__task-bar">
          <span class="terminal__circle terminal__circle--red"></span>
          <span class="terminal__circle terminal__circle--yellow"></span>
          <span class="terminal__circle terminal__circle--green"></span>
        </div>

        <div class='terminal__window'>
          <div id='prev'>
            
          </div>

          <div class='input'>
            <span id="prompt-field">></span>
            <input id="prompt" type="text" autocomplete="off">
          </div>
        </div>
    </div> <!-- terminal -->

    <form class="traditional-form" method="post" action="">
        <div>
            <pre>Escribe tu nombre</pre>
            <input type="text" name="nombre" id="" class="nombre" autofocus>
        </div>

        <div>
            <pre>Escribe tu correo</pre>
            <input type="text" name="email" id="" class="email">
        </div>

        <div>
            <pre>Consulta</pre>
            <textarea name="subject" id="" class="subject"></textarea>
        </div>

        <div>
            <pre>Presiona <span>enviar</span> para confirmar el mensaje</pre>
            <input type="submit" value="enviar" class="btn btn--primary btn--large">
        </div>
    </form> <!-- traditional-form -->
  </div>
</section> <!-- end s-contact -->