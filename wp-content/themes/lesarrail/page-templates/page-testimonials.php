<?php
/**
 * Template Name: Testimonials Page
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
        
           <div id="primary" class="col-md-12 content-area">
               <header class="entry-header">
                   <h4>With a return guest rate of 75% here's what they say.....</h4>
               </header>

                <main id="main" class="site-main" role="main">
                    <div class="col-md-6">
                    <?php $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 30 );
              $loop = new WP_Query( $args );
              $count = 0;
            while ( $loop->have_posts() ) : $loop->the_post(); $count ++; ?> 
        
                                
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('closed'); ?>>

                            <div class="entry-content">
                                <?php the_content(); ?>
                                <?php the_title( '<a class="entry-title">', '</a>' ); ?>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <?php understrap_entry_footer(); ?>
                            </footer><!-- .entry-footer -->
                            <div>
            
                            </div>
                        </article><!-- #post-## -->
                    <?php if( $count == 12 ) {
                        echo '</div><div class="col-md-6">';
                    } continue; ?>
                                
                                
                                       
				<?php endwhile; ?>
                    </div>
                </main><!-- #main -->

            </div><!-- #primary -->
            </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>