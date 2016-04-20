<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
 *
 * @package understrap
 */

get_header(); ?>
<?php $attached_images = get_post_meta($post->ID, "wpcf-gallery-item", false);
        if ($attached_images[0]=="") { ?>

        <!-- If there are no custom fields, show nothing -->

        <?php } else { ?>
    
    <div id="slideshow" class="relative">
       <?php foreach($attached_images as $attached_images) {
            echo '<div class="slideshow-item" style="background-image:url('.$attached_images.');"></div>';
            } ?>
    </div>

        <?php } ?>
<div class="container">
<div class="col-md-12 home-bottom">
                    <div class="site-info">
                         <div class="col-md-12 sm-hide">
                            <div class="center scroll-btn"></div>
                        </div>
                        <div class="col-md-6 col-xs-6 footer-contacts nopadding">
                            <div class="col-md-5 col-md-push-4 footer-socials">
                            <a href="https://www.facebook.com/Le-Sarrail-593654507463494/i" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/lesarrail" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/le_sarrail/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                            <div class="col-md-6 col-md-pull-5">
                                <span>T: 0738370507</span><br>
                                <span>E: info@lesarrail.com</span>
                            </div>
                        </div>
                        <div class="col-md-5 hide-sm subscribe-container">
                            <!-- Begin MailChimp Signup Form -->
                                <div id="mc_embed_signup">
                                <form action="//lesarrail.us10.list-manage.com/subscribe/post?u=8b5b47c0a55160921b20a398f&amp;id=7cfd841a3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                <div class="mc-field-group">
                                    <input type="email" value="" placeholder="enter your email address" name="EMAIL" class="required email" id="mce-EMAIL">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn">
                                </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8b5b47c0a55160921b20a398f_7cfd841a3a" tabindex="-1" value=""></div>
                                    </div>
                                </form>
                                </div>
                        <!--End mc_embed_signup-->
                        </div>
                        <div class="col-xs-6 col-md-1 copy-cont">
                            <span class="copyright">© 2016 Le Sarrail All Rights Reserved</span>
                        </div>
                    </div><!-- .site-info -->
            </div><!--col end -->
    </div>

<div class="wrapper" id="page-wrapper">    
    <div  id="content" class="container">
	   <div id="primary" class="col-md-8 col-md-offset-2 content-area">
            <main id="main" class="site-main" role="main">
                 <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_title.svg" width="50%"></h1>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                <?php endwhile; ?>
            </main><!-- #main -->
	    </div><!-- #primary -->
    </div><!-- Container end -->
    
    <?php   $kids = 22;
            $accommodation = 18;
            $area = 20;
            $group = 26;
            $maison_cypres = 45;

    ?>
    
    <div id="featured" class="container">
        <div class="col-md-12">
            <div class="col-md-5 page-link transition">
                <a href="<?php echo get_page_link($kids); ?>">
                    <div class="box-wrapper" style="background-image:url('<?php echo get_image_custom($kids, 'medium'); ?>');">
                        <h2 class="title"><?php echo get_the_title($kids); ?></h2>
                    </div>
                </a>
            </div>

            <div id="apartment-slider" class="col-md-7 page-link transition">
                
                <?php   $args = array( 'post_type' => 'apartment', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>  
                        <?php $image = get_image_custom($post->ID, 'medium'); ?>
                                    <a class="apartment col-md-6" href="<?php the_permalink($accommodation); ?>">
                                        <div class="box-wrapper" style="background-image:url('<?php echo $image; ?>');">
                                            <h2 class="title transition"><?php echo get_the_title(); ?></h2>
                                        </div>
                                    </a>
                            <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                
            </div>

            <div class="col-md-7 page-link activity-featured transition" >
                <a href="<?php echo get_page_link($area); ?>">
                    <div class="box-wrapper" style="background-image:url('<?php echo get_image_custom($area, 'medium'); ?>');">
                        <h2 class="title"><?php echo get_the_title($area); ?></h2>
                    </div>
                </a>
            </div>

            <div class="col-md-5 page-link transition">
                <a href="<?php echo get_page_link($group); ?>">
                    <div class="box-wrapper" style="background-image:url('<?php echo get_image_custom($group, 'medium'); ?>');">
                        <h2 class="title"><h2 class="title"><?php echo get_the_title($group); ?></h2></h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div id="brand-ident" class="container">
        <div class="col-md-12 ident-container">
        <?php   $args = array( 'post_type' => 'endorsement', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>  
                          <?php $endorsement = get_post_meta($post->ID, 'wpcf-endorsement-text', true); ?>
                          <?php $endorsement_image = get_post_meta($post->ID, 'wpcf-endorsement-image', true); ?>
                        <?php $logo = get_image_custom($post->ID, 'medium'); ?>
                                <div class="col-md-4">
                                    <a class="endorsement" href="<?php echo $endorsement_image; ?>" data-gallery="#blueimp-gallery-76"><?php echo $endorsement; ?>"</a>
                                    <img class="endorser" src="<?php echo $logo; ?>">
                                </div>
                            <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
        </div>
    </div>
    
    <div id="insta" class="container center">
       <!-- <header class="entry-header">
            <h5>VISIT</h5>
            <h2 class="entry-title">Le Sarrail</h2>
        </header> -->
        <div class="col-md-2 insta-ident"><a href="https://www.instagram.com/le_sarrail/" target="_blank"><i class="fa fa-instagram"></i> @LESARRAIL</a></div>
        <?php echo do_shortcode('[enjoyinstagram_mb_grid]'); ?>
    </div>
    
    <div id="map-container" class="container">
        <div class="col-md-12 full-height">
            <div class="col-md-5 panel-group-container">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Restaurants
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                                <?php $i = 1; ?>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'restaurants', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                          <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                          <?php $img = get_image_custom($post->ID, 'small'); ?>
                          <!-- HIDDEN -->
                                        <div style="display:none;">
                                            <div id="item<?php echo $i; ?>" class="map-info">
                                                <a class="poi-title" style="font-weight:600;font-size: 15px;display: block;margin-bottom: 5px;text-align: center;"><?php the_title(); ?></a>
                                                <div class="poi-address" style="font-weight:300;max-width: 60%;margin: 0 auto;text-align: center;"><?php echo $address; ?></div>
                                            </div>
                                        </div>
                          
                                        <div class="map-info">
                                            <a class="poi-title" onclick="myClick(<?php echo $i-1; ?>);"><?php the_title(); ?></a>
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <div class="poi-image"><img src="<?php echo $img; ?>"></div>
                                            <?php } ?>
                                            <!-- <?php the_content(); ?>  -->
                                            <div class="poi-det-cont">
                                            <div class="poi-details">Lorem ipsum sic hamet sut dolor ev amec thin apur maces</div>
                                            <div class="poi-address col-xs-6 col-md-6 nopadding"><?php echo $address; ?></div>
                                                </div>
                                            <hr>
                                        </div>
                                    <?php endif;?>
                                    <?php $i++;	?>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                                </div>
                    </div>
                  </div>
                    
                    <!-- SECOND PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingTwo"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Animal Parks
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'animal-parks', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                        <div style="display:none;">
                                        <div id="item<?php echo $i; ?>" class="map-info">
                                            <a class="poi-title" style="font-weight:600;font-size: 15px;display: block;margin-bottom: 5px;text-align: center;"><?php the_title(); ?></a>
                                                <div class="poi-address" style="font-weight:300;max-width: 60%;margin: 0 auto;text-align: center;"><?php echo $address; ?></div>
                                        </div>
                                            </div>
                                        <div class="map-info">
                                            <a class="poi-title" onclick="myClick(<?php echo $i-1; ?>);"><?php the_title(); ?></a>
                                            <!-- <?php the_content(); ?>  -->
                                            <div class="poi-details">Lorem ipsum sic hamet sut dolor ev amec thin apur maces</div>
                                            <div class="poi-address col-xs-6 col-md-6 nopadding"><?php echo $address; ?></div>
                                            <hr>
                                        </div>
                                    <?php endif;?>
                                    <?php $i++;	?>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                        </div>
                    </div>
                  </div>
                    <!-- SECOND PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Flying
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'flying', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                        <div style="display:none;">
                                        <div id="item<?php echo $i; ?>" class="map-info">
                                            <a class="poi-title" style="font-weight:600;font-size: 15px;display: block;margin-bottom: 5px;text-align: center;"><?php the_title(); ?></a>
                                            <div class="poi-address" style="font-weight:300;max-width: 60%;margin: 0 auto;text-align: center;"><?php echo $address; ?></div>
                                        </div>
                                            </div>
                                        <div class="map-info">
                                            <a class="poi-title" onclick="myClick(<?php echo $i-1; ?>);"><?php the_title(); ?></a>
                                            <!-- <?php the_content(); ?>  -->
                                            <div class="poi-details">Lorem ipsum sic hamet sut dolor ev amec thin apur maces</div>
                                            <div class="poi-address col-xs-6 col-md-6 nopadding"><?php echo $address; ?></div>
                                            <hr>
                                        </div>
                                    <?php endif;?>
                                    <?php $i++;	?>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                        </div>
                    </div>
                  </div>
                    <!-- SECOND PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Sporting Activities
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                        <div class="panel-body">
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'sporting-activities', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                        <div style="display:none;">
                                        <div id="item<?php echo $i; ?>" class="map-info">
                                            <a class="poi-title" style="font-weight:600;font-size: 15px;display: block;margin-bottom: 5px;text-align: center;"><?php the_title(); ?></a>
                                            <div class="poi-address" style="font-weight:300;max-width: 60%;margin: 0 auto;text-align: center;"><?php echo $address; ?></div>
                                        </div>
                                            </div>
                                        <div class="map-info">
                                            <a class="poi-title" onclick="myClick(<?php echo $i-1; ?>);"><?php the_title(); ?></a>
                                            <!-- <?php the_content(); ?>  -->
                                            <div class="poi-details">Lorem ipsum sic hamet sut dolor ev amec thin apur maces</div>
                                            <div class="poi-address col-xs-6 col-md-6 nopadding"><?php echo $address; ?></div>
                                            <hr>
                                        </div>
                                    <?php endif;?>
                                    <?php $i++;	?>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                        </div>
                    </div>
                  </div>
                    
			     </div>
            </div>
			<script type="text/javascript">
				var locations = [
					<?php  $i = 1; $args = array( 'post_type' => 'poi', 'posts_per_page' => 40 );
                      $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
							{
								latlng : new google.maps.LatLng<?php echo get_post_meta($post->ID, 'martygeocoderlatlng', true); ?>, 
								info : document.getElementById('item<?php echo $i; ?>'),
                                marker_img : "restaurant"
						},
						<?php endif; ?>
					<?php $i++; endwhile; ?>
				];
			</script>
            
            
            
            
            
                <div id="map" style="width:100%;"></div>
            <div class="clear"></div>
        </div>
    </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>