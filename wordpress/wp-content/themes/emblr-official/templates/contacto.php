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
<section id="contacto" class="s-contact target-section section-page">
  <div class="contact-bg">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 900 720" enable-background="new 0 0 900 720" xml:space="preserve" id="worldmap"></svg>
  </div>

    <h1 data-aos="fade-up" data-text="<? the_title() ?>" class="glitch"> <? the_title() ?> </h1>
    <h2 class="glitch contact-sub" data-text="<?= get_field( 'subtitulo', $post->ID ) ?>">
      <?= get_field( 'subtitulo', $post->ID ) ?>
      <!-- <span class="cursor"></span> -->
    </h2>
  
    <div class="contact-content">
    <!-- <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="" data-aos="fade-up"> -->

    <div class="terminal" data-aos="fade-up">
        <div class="terminal__task-bar">
          <span class="terminal__circle terminal__circle--red"></span>
          <span class="terminal__circle terminal__circle--yellow"></span>
          <span class="terminal__circle terminal__circle--green"></span>
        </div>

        <div id="terminal-form" class='terminal__window'>
          <div id='prev'>
            
          </div>

          <div class='input'>
            <span id="prompt-field">></span>
            <input id="prompt" type="text" autocomplete="off">
          </div>
        </div>
    </div> <!-- terminal -->

    <form id="traditional-form" class="traditional-form">
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

        <div class="submit-area">
            <pre>Presiona <span>enviar</span> para confirmar tu mensaje</pre>
            <input id="traditional-form-submit" type="submit" value="ENVIAR" class="btn btn--primary btn--large">
        </div>
    </form> <!-- traditional-form -->
  </div>
</section> <!-- end s-contact -->