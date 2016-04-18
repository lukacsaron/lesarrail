<?php
/**
 * Template Name: Accomodation Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container mobile-nopadding">
        <div class="col-md-12 mobile-nopadding">
        <?php $args = array( 'post_type' => 'apartment', 'posts_per_page' => 10 );
              $loop = new WP_Query( $args );
        
            while ( $loop->have_posts() ) : $loop->the_post(); ?> 
        
						<div class="row apartment-row" style="background-image:url('<?php echo get_image_custom($post->ID, 'large'); ?>');">
                            <div class="apartment-container">
                            <div class="row hide-desktop gallery-btn-container">
                                <div class="col-md-offset-10 col-md-2 col-xs-push-7 col-xs-5">
                                    <a href="<?php echo get_post_meta($post->ID, "wpcf-gallery-item", false)[0]; ?>" class="btn btn-default btn-transparent" data-gallery="#blueimp-gallery-<?php echo ($post->ID); ?>_mob">GALLERY</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 primary-container">
                                <div class="opener-btn opener"></div>
							     <?php   $apartment_size = get_post_meta($post->ID, "wpcf-apartment-size", false);
                            $bedrooms = get_post_meta($post->ID, "wpcf-wpcf-bedrooms", false);
                            $book_btn = get_post_meta($post->ID, "wpcf-book-btn", false);
                            $contact_btn = get_post_meta($post->ID, "wpcf-contact-btn", false);
                            $season_01 = get_post_meta($post->ID, "wpcf-season_01", false);
                            $season_02 = get_post_meta($post->ID, "wpcf-season_02", false);
                            $season_03 = get_post_meta($post->ID, "wpcf-season_03", false);
                            $season_04 = get_post_meta($post->ID, "wpcf-season_04", false);
                            $features = get_post_meta($post->ID, "wpcf-apartment-feature", false);
                            $main_feature = get_post_meta($post->ID, "wpcf-bedrooms-info", false);
                            $offer_boolean = get_post_meta($post->ID, "wpcf-offer-boolean", false);
                            $offer_details = get_post_meta($post->ID, "wpcf-offer-details", false);
                    ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('closed'); ?>>

                            <header class="entry-header">
                                <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                                <span class="can-accomodate">(Can accommodate up to <?php echo $apartment_size[0]; ?>)</span>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <ul class="col-md-12 main-feature">
                                    <li class="feature-item"><?php echo $main_feature[0]; ?></li>
                                </ul>
                                <div class="apartment-description col-md-12">
                                    <?php the_content(); ?>
                                </div>
                                 <ul class="col-md-6 features">
                                    <?php
                                        $count = 0;
                                        foreach($features as $features) {
                                        $count ++;
                                        echo '<li class="feature-item">'.$features.'</li>';
                                            if( $count == 4 ) {
                                                echo '</ul><ul class="features_2 col-md-6">';
                                            }continue;
                                    } ?>
                                </ul>
                                <div id="rates" class="col-md-6">
                                    <h5>RATES</h5>
                                    <span class="season-title">7th May - 28th May</span>
                                    <span class="season-price">€<?php echo $season_01[0]; ?></span>
                                    <br>
                                    <span class="season-title">28th May - 2nd Jul</span>
                                    <span class="season-price">€<?php echo $season_02[0]; ?></span>
                                    <br>
                                    <span class="season-title">2nd Jul - 3rd Sep</span>
                                    <span class="season-price">€<?php echo $season_03[0]; ?></span>
                                    <br>
                                    <span class="season-title">3rd Sep - 2nd Oct</span>
                                    <span class="season-price">€<?php echo $season_04[0]; ?></span>
                                    <br>
                                </div>
                                <div class="clear spacer"></div>
                                <div id="offer" class="col-md-6">
                                    <div class="offer-wrapper">
                                        <h4>SPECIAL OFFER</h4>
                                        <span class="details"><?php echo $offer_details[0]; ?></span>
                                    </div>
                                </div>
                                <div id="callouts" class="col-sm-12 col-md-6 small-nopadding">
                                    <a href="<?php echo $contact_btn[0]; ?>">
                                        <button class="btn btn-default btn-callout col-sm-6 col-md-12">Contact the owner</button>
                                    </a>
                                                             
                                    <?php if ($book_btn[0]=="") { ?>

                                        <!-- If there are no custom fields, show nothing -->

                                    <?php } else { ?>
                                    
                                        <a href="<?php echo $book_btn[0]; ?>" target="_blank">
                                            <button class="btn btn-default btn-callout col-sm-6 col-md-12">Book online</button>
                                        </a>

                                    <?php } ?>
                                         
                                </div>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <?php understrap_entry_footer(); ?>
                            </footer><!-- .entry-footer -->
                            <div>
            
                            </div>
                        </article><!-- #post-## -->
                                <div class="hide-mobile gallery-btn-container transition delay">
                                    <a href="<?php echo get_post_meta($post->ID, "wpcf-gallery-item", false)[0]; ?>" class="btn btn-default btn-transparent" data-gallery="#blueimp-gallery-<?php echo ($post->ID); ?>">GALLERY</a>
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
                                <div style="display:none;">
                                    <?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
                                    
        <!-- detach first image -->
        <?php unset($attached_images[0]); ?>
        <?php foreach($attached_images as $attached_images) {
            $postID = ($post->ID);
            echo '<a href="'.$attached_images.'"data-gallery="#blueimp-gallery-'.$postID.'_mob"></a>';
            } ?>

        <?php } ?>
                                </div>
                            </div>
                        </div>
            </div>
        
				<?php endwhile; ?>
        
    </div><!-- Container end -->
    </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>