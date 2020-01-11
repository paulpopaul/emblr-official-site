<? get_header() ?>


    <?

        /**
         * 
         *  Objeto referencia al post actual
         * 
         */
        global $post;

    ?>


    <!-- Contenido de entradas -->

    <section class="section-page s-noticias article">

        <? the_post() ?>

        <!-- POST HEADER -->

        <h1 class="post-title"> <? the_title() ?> </h1>
        <tiny class="post-date"> <? the_date( 'j F, Y' ) ?> · X <?= __( 'minutos de lectura' ) ?> </tiny>

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
                        <!-- categorías aquí -->
                    </div>

                    <div class="post-labels">
                        <!-- etiquetas aquí -->
                    </div>

                    <div class="post-share">
                        <!-- compartir aquí -->
                    </div>

                    <!-- POST TAXONOMIES and SHARE -->
                </section>


                <!-- POST COMMENTS -->

                <section class="post-comments">
                    <!-- sistema comentarios aquí -->
                </section>

                <!-- POST COMMENTS -->

            </article>

            <!-- POST ARTICLE -->


            <!-- SIDEBAR -->

            <aside>

                <div class="post-writter">
                    <h5> <?= __( 'sobre el autor' ) ?> </h5>
                </div> <!-- post-writter -->


                <!-- resto contenido sidebar -->

            </aside>

            <!-- SIDEBAR -->

        </div> <!-- post-grid-container -->

    </section>

    <!-- Contenido de entradas -->


<? get_footer() ?>