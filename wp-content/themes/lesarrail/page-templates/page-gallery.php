<?php
/**
 * Template Name: Gallery Page
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

                <main id="main" class="site-main" role="main">

                    <?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
    
    <div id="gallery">
       <?php foreach($attached_images as $attached_images) {
            echo '<a href="'.$attached_images.'" data-gallery="#blueimp-gallery" class="gallery-item col-md-4" style="background-image:url('.$attached_images.');"></a>';
            } ?>
    </div>

        <?php } ?>

                </main><!-- #main -->

            </div><!-- #primary -->
                </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>