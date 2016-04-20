<?php
/**
 * Template Name: Find Us Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container">
        
        <div class="row">
            
            <div class="col-md-12">
        
               <div id="primary" class="col-md-4 content-area">

                    <main id="main" class="site-main" role="main"> 

                        <?php while ( have_posts() ) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                <div class="entry-content">

                                    <?php the_content(); ?>

                                    <?php
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>

                                </div><!-- .entry-content -->

                                <footer class="entry-footer">

                                    <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

                                </footer><!-- .entry-footer -->

                            </article><!-- #post-## -->


                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || get_comments_number() ) :

                                    comments_template();

                                endif;
                            ?>

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->

                </div><!-- #primary -->
                <div id="secondary" class="col-md-8">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>