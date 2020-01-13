<?php


/**
*
*   Post Noticias
*
*
*   @version    emblr-official-1
*
*   @author     Ensambler <emblr@ensambler.cl>
*   @copyright  Derechos reservados 2020, Ensambler
*
*   @link       http://www.ensambler.cl/
*
*   @package    WordPress
*   @subpackage emblr
*   @since      5.2.2
*
*/



    /**
     * 
     *  Objeto referencia al post actual
     * 
     */
    global $post;



    /**
     * 
     *  Autor
     * 
     */
    $autor = get_field( 'autor', $post->ID );


    /**
     * 
     *  Tiempo de lectura
     * 
     */
    $tiempo_lectura = get_field( 'tiempo_lectura', $post->ID );


    /**
     * 
     *  Categorías del post
     * 
     */
    $categorias = get_the_category( $post->ID );


    /**
     * 
     *  Etiquetas del post
     * 
     */
    $etiquetas = get_the_tags( $post-> ID );

?>


<? get_header() ?>

<body id="posts" class="<? emblr_theme() ?>">

    <!-- top-header: corner-logo - search and menu controls -->

    <? get_template_part( 'template-parts/top-header' ) ?>

    <!-- top-header: corner-logo - search and menu controls -->
    

    <!-- Contenido de entradas -->

    <section class="section-page s-post-view article">

        <? the_post() ?>

        <!-- POST HEADER -->

        <h1 class="post-title"> <? the_title() ?> </h1>
        <tiny class="post-date">
            <? the_date( 'j F, Y' ) ?>
            <? if ( $tiempo_lectura ): ?> · <?= $tiempo_lectura ?> <?= __( 'minutos de lectura', 'emblr' ) ?> <? endif ?>
        </tiny>

        <!-- POST HEADER -->


        <div class="post-grid-container">

            <!-- POST ARTICLE -->

            <article class="post-article">

                <!-- POST CONTENT -->

                <div class="post-featured-img"> <? the_post_thumbnail( 'large' ) ?> </div>
                <main class="post-content"> <? the_content() ?> </main>

                <!-- POST CONTENT -->


                <!-- POST TAXONOMIES and SHARE -->

                <section class="post-taxonomies">
                    <div class="post-categories">

                        <div class="post-taxonomy-title">
                            <h6> <?= __( 'categorías', 'emblr' ) ?> </h6>
                        </div>

                        <div class="post-taxonomies-content">

                            <? if ( $categorias ): ?>

                                <? foreach ( $categorias as $categoria ): ?>
                                
                                    <a class="btn"> <?= $categoria->name ?> </a> 

                                <? endforeach ?>

                            <? endif ?>

                        </div> <!-- post-taxonomies-content -->
                    </div> <!-- post-categories -->


                    <div class="post-labels">

                         <div class="post-taxonomy-title">
                             <h6> <?= __( 'etiquetas', 'emblr' ) ?> </h6>
                        </div>


                        <div class="post-taxonomies-content">
                            
                            <? if ( $etiquetas ): ?>

                                <? foreach ( $etiquetas as $etiqueta ): ?>

                                    <a class="btn"> <?= $etiqueta->name ?> </a> 

                                <? endforeach ?>

                            <? endif ?>

                        </div> <!-- post-taxonomies-content -->
                    </div> <!-- post-labels -->


                    <div class="post-share">

                        <div class="post-share-title">
                            <h6> <?= __( 'compartir este post', 'emblr' ) ?> </h6>
                        </div>

                        <div class="post-share-buttons">

                            <? $url = get_the_permalink() ?>
                            
                            <!-- facebook -->
                            <a target="_blank" href="<?= "http://www.facebook.com/sharer.php?u=${url}" ?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <!-- facebook -->
                            
                            <!-- twitter -->
                            <a target="_blank" href="<?= "http://www.twitter.com/share?url=${url}" ?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <!-- twitter -->

                        </div> <!-- post-share-buttons -->

                    </div> <!-- post-share -->

                    <!-- POST TAXONOMIES and SHARE -->
                </section>


                <div class="post-writter-mobile"> <!-- sobre el autor dispositivos móviles --> </div>


                <!-- POST COMMENTS -->

                <section class="post-comments">
                    <? comments_template() ?>
                </section>

                <!-- POST COMMENTS -->

            </article>

            <!-- POST ARTICLE -->


            <!-- SIDEBAR -->

            <aside>

                <div class="post-writter">
                    <h5> <?= __( 'sobre el autor', 'emblr' ) ?> </h5>

                    <?

                        if ( $autor ) :

                            $nombre_autor     = $autor->post_title;

                            $profile_autor    = get_field( 'perfil', $autor->ID );
                            $ocupacion_autor  = get_field( 'ocupacion', $autor->ID );
                            $resena_autor     = get_field( 'resena', $autor->ID );

                            // Profile (si url imagen está roto):
                            $profile_autor = $profile_autor ?
                                $profile_autor[ 'sizes' ][ 'large' ] : '#empty-profile-image-url'
                            ;

                            // Redes (opcional):
                            $redes_autor = get_field( 'redes', $autor->ID );

                            if ( $redes_autor ):
                                
                                $linkedin   = $redes_autor[ 'linkedin' ];
                                $github     = $redes_autor[ 'github' ];
                                $email      = $redes_autor[ 'email' ];
                            
                            endif;

                    ?>

                        <div class="post-author-box box-team">
                            <div class="post-author-container our-team">

                                <div class="post-author-profile pic">
                                    <img src="<?= $profile_autor ?>">
                                </div>

                                <div class="post-author-content team-content">
                                    <a href="<?= get_the_permalink( $autor->ID ) ?>">
                                        <h3 class="post-author-title"> <?= $nombre_autor ?> </h3>
                                    </a>

                                    <span class="post-author-ocupation post"> <?= $ocupacion_autor ?> </span>

                                    <p>
                                        <?= $resena_autor ?>
                                    </p>
                                </div>

                                <ul class="post-author-social social">
                                    <li> <a href="<?= $linkedin ? $linkedin : '#' ?>" target="_blank" class="fab fa-linkedin"></a> </li>
                                    <li> <a href="<?= $github ? $github : '#' ?>" target="_blank" class="fab fa-github"></a> </li>
                                    <li> <a href="<?= $email ? "mailto:$email?subject=Contacto%20desde%20Ensambler&reg;" : '#' ?>" class="fas fa-envelope"></a> </li>
                                </ul>

                            </div> <!-- post-author-container -->
                        </div> <!-- post-author-box -->
                    
                    <? else: ?>
                        
                        <?= __( 'No asignado' ) ?>

                    <? endif ?>

                </div> <!-- post-writter -->


                <div class="post-sidebar-container">
                    <? dynamic_sidebar( 'post-sidebar' ) ?>
                </div> <!-- post-sidebar-container -->

            </aside>

            <!-- SIDEBAR -->

        </div> <!-- post-grid-container -->

    </section>

    <!-- Contenido de entradas -->


    <script type="text/javascript">

        ($ => {

            $(window).resize(() => {

                let width = $(window).width()

                let $post_writter = $( '.post-writter',  'aside' )
                let $mobile_post_writter = $( '.post-writter-mobile' )


                if ( width < 1024 && $post_writter.length > 0  )
                    $mobile_post_writter.append( $post_writter )

                else if ( width >= 1024 && $post_writter.length === 0 ) {
                    $post_writter = $( '.post-writter',  '.post-writter-mobile' )
                    $('aside').prepend( $post_writter )
                }

            })

            $(window).trigger( 'resize' )

        })( jQuery )

    </script>


<? get_footer() ?>