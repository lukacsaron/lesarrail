<?php
/**
 *
 * The template for displaying all activity posts.
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    

    <?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
     
    <div id="slideshow" style="display:none;">
       <?php foreach($attached_images as $attached_images) {
            echo '<div class="slideshow-item" style="background-image:url('.$attached_images.');"></div>';
            } ?>
    </div>

        <?php } ?>
    
    
    <div  id="content" class="container">
        <div class="row">
            <div class="col-md-12">
        
           <div id="primary" class="col-md-6 content-area">

                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :

                                comments_template();

                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->
                <div id="secondary" class="col-md-6 content-area">
                    <div class="row btn-container">
            <div class="col-md-3 col-xs-12 absolute-btn">
                <a href="<?php echo get_post_meta($post->ID, "wpcf-gallery-item", false)[0]; ?>" class="btn btn-default btn-transparent" data-gallery="#blueimp-gallery-<?php echo ($post->ID); ?>">GALLERY</a>
            </div>
        </div>
                    <img src="<?php echo $attached_images; ?>">
                </div>
                <div style="display:none;">
                                    <?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
                                    
        <!-- detach first image -->
        <?php unset($attached_images[0]); ?>
        <?php foreach($attached_images as $attached_images) {
            $postID = ($post->ID);
            echo '<a href="'.$attached_images.'"data-gallery="#blueimp-gallery-'.$postID.'" ></a>';
            } ?>

        <?php } ?>
                                </div>
                </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>