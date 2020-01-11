<?php

   /**
   * 
   *  Sidebar Posts
   *  ID: 'posts'
   * 
   *  Contenido dinámico de sidebar mostrado en noticias (entradas)
   *
   */
   
   
   if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>

         <div id="widget-area" class="widget-area">
            <? dynamic_sidebar( 'sidebar-posts' ) ?>
         </div>

   <? endif ?>


