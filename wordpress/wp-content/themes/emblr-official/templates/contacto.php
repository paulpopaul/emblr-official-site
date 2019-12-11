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

    <h1 data-aos="fade-up" data-text="<? the_title() ?>" class="glitch"> <? the_title() ?> </h1>
    <h2 class="glitch contact-sub" data-text="<?= get_field( 'subtitulo', $post->ID ) ?>">
      <?= get_field( 'subtitulo', $post->ID ) ?>
      <span class="cursor"></span>
    </h2>
  
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
            <pre>Nombre</pre>
            <input type="text" name="nombre" id="" class="nombre" autofocus>
        </div>

        <div>
            <pre>Correo</pre>
            <input type="text" name="email" id="" class="email">
        </div>

        <div>
            <pre>Consulta</pre>
            <textarea name="subject" id="" class="subject"></textarea>
        </div>

        <div>
            <pre>Presiona <span>enviar</span> para confirmar tu mensaje</pre>
            <input type="submit" value="ENVIAR" class="btn btn--primary btn--large">
        </div>
    </form> <!-- traditional-form -->
  </div>
</section> <!-- end s-contact -->