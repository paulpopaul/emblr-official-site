<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section section-page">
    <h1 data-aos="fade-up">Contáctate con nosotros</h1>

    <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="" data-aos="fade-up">

    <div class="terminal" data-aos="fade-up">
        <div class="terminal__task-bar">
          <span class="terminal__circle terminal__circle--red"></span>
          <span class="terminal__circle terminal__circle--yellow"></span>
          <span class="terminal__circle terminal__circle--green"></span>
        </div>

        <div class='terminal__window'>
          <div id='prev'> <!-- output --> </div>

          <div class='input'>
            <span id="prompt-field">></span>
            <input id="prompt" type="text" onkeypress="keyPressed()" autocomplete="off">
          </div>

        </div>
    </div>
</section> <!-- end s-contact -->