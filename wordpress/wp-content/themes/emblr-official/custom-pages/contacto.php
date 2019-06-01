<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section section-page">
    <h1>Contáctate con nosotros</h1>

    <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="">

    <div class="terminal">
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