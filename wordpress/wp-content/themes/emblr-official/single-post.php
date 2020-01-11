<? get_header() ?>


    <?

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


    <!-- Contenido de entradas -->

    <section class="section-page s-post-view article">

        <? the_post() ?>

        <!-- POST HEADER -->

        <h1 class="post-title"> <? the_title() ?> </h1>
        <tiny class="post-date"> <? the_date( 'j F, Y' ) ?> · X <?= __( 'minutos de lectura', 'emblr' ) ?> </tiny>

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


                <!-- POST COMMENTS -->

                <section class="post-comments">
                    <? //comments_template() ?>
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


<? get_footer() ?>