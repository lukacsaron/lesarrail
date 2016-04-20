<?php
/**
 * Template Name: Area Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">    
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
                          <!-- HIDDEN -->
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
                            <?php $img = get_image_custom($post->ID, 'small'); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                        <div style="display:none;">
                                        <div id="item<?php echo $i; ?>" class="map-info">
                                            <a class="poi-title" style="font-weight:600;font-size: 15px;display: block;margin-bottom: 5px;text-align: center;"><?php the_title(); ?></a>
                                                <div class="poi-address" style="font-weight:300;max-width: 60%;margin: 0 auto;text-align: center;"><?php echo $address; ?></div>
                                        </div>
                                            </div>
                                        <div class="map-info">
                                            <div class="poi-image"><img src="<?php echo $img; ?>"></div>
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
					<?php  $i = 1;$args = array( 'post_type' => 'poi', 'posts_per_page' => 40 );
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