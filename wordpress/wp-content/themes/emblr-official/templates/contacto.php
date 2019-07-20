<?php


/**
*
*   Template Name: Contacto
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
    *   Objetos página, ID página
    *
    */
    global

        $page,
        $page_id

    ;


?>


<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section section-page">
  <div class="contact-bg">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 900 720" enable-background="new 0 0 900 720" xml:space="preserve" id="worldmap"></svg>
  </div>
  
  <div class="contact-content">
    <h1 data-aos="fade-up"> <?= $page->post_title ?> </h1>

    <p data-aos="fade-up">Hagamos realidad el proyecto que tienes en mente</p>

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
    </div>
  </div>
</section> <!-- end s-contact -->