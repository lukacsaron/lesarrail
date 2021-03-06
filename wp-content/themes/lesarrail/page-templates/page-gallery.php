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
        <?php $count = 0; ?>
    <div id="gallery">
       <?php foreach($attached_images as $attached_images) {
             $count ++;
            
             if( $count == 1 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-2" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 2 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-3" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 3 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-4" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            
            if( $count == 4 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-3" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 5 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-4" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 6 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-3" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 7 ) {
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-3" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } 
            
            if( $count == 8 ) {
                        $count = 0;
                        echo '<a data-gallery="#blueimp-gallery" class="gallery-item col-xs-6 col-sm-6 col-md-4 col-lg-2" href="'.$attached_images.'" style="background-image:url('.$attached_images.');"></a>';
                    } continue; 
            

        ?>
            
    </div>

        <?php } } ?>

                </main><!-- #main -->

            </div><!-- #primary -->
                </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>