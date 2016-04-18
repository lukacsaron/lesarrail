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
    

    <?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
    
    <div id="slideshow">
       <?php foreach($attached_images as $attached_images) {
            echo '<div class="slideshow-item" style="background-image:url('.$attached_images.');"></div>';
            } ?>
    </div>

        <?php } ?>
    
    
    <div  id="content" class="container">
        <div class="row">
            <div class="col-md-12">
        
           <div id="primary" class="col-md-6 content-area">
               <header class="entry-header">
                   <h4>With a return guest rate of 75% here's what they say.....</h4>
               </header>

                <main id="main" class="site-main" role="main">

                    <?php $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 30 );
              $loop = new WP_Query( $args );
        
            while ( $loop->have_posts() ) : $loop->the_post(); ?> 
        
                                
                        
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
                        <hr>
                                
                                
                                       
				<?php endwhile; ?>

                </main><!-- #main -->

            </div><!-- #primary -->
                </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>