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
    <div id="area-container" class="container mobile-nopadding">
        <div class="col-md-12 mobile-nopadding">
        <?php $args = array( 'post_type' => 'activity', 'posts_per_page' => 12 );
              $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); $count ++; ?> 
            <?php $image = get_image_custom($post->ID, 'medium'); ?>
                                
            <a class="area col-md-4 col-sm-6 col-xs-12 small-nopadding" href="<?php the_permalink(); ?>">
                <div class="box-wrapper" style="background-image:url('<?php echo $image; ?>');">
                    <h2 class="title transition"><?php echo get_the_title(); ?></h2>
                </div>
            </a>
                                       
				<?php endwhile; wp_reset_query(); ?>
            </div>
    </div>
    <div id="map-container" class="container">
        <div class="col-md-12 full-height">
            <div class="col-md-5 panel-group-container">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <?php echo __('Restaurants','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                          <div class="global-description"><?php echo __('In each house at Le Sarrail you will find a comprehensive restaurant guide to the best restaurants in the area, from pavement cafes where you can sit & watch French life go by to elegant French restaurants like Le Domaine dAuriac and Michelin-starred La Barbacane in the Cité of Carcassonne.','lesarrail_text');?></div>
                                <?php $i = 1; ?>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'restaurants', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                  <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                          <?php echo __('Animal Parks','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('No matter what the weather, children love visiting animal parks. The African Reserve at Sigean, near Narbonne, is where they will delight in seeing big game animals roaming free over a 300 hectare reserve. At Esperaza, about 30 minutes drive, you will find the interactive Dinosaur Museum which holds an impressive collection of dinosaur fossils found in and around Esperaza. You can also take llama rides in the Black Mountains, see the birds of prey at the sanctuary in Carcassonne, or visit the House of Wolves in the Ariege.','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'animal-parks', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                           <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                    <div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <?php echo __('Flying','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('A flying lesson, wether you are a total beginner or in the process of gaining more hours for your private pilots licence, is an incredible experience.
                                It is easy to book lessons at Carcassonne airport - no long waiting lists. It is also much less expensive than the UK and of course the scenery is spectacular. We can arrange lessons for you and even accompany you on the flight in case any language translation is needed. And for a really special occasion, why not hire a light aircraft with pilot, enjoy the view and pop down to Spain for lunch? However, if your interests lie with the mysteries of the Cathar castles, but you dont want to hike up the mountain to see them, then we can arrange a flight to view them from the air.','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'flying', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                            <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                    <div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <?php echo __('Sporting Activities','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('Whether you consider yourself sporty or not, it is easy to enjoy the many outdoor activities to be found locally; cycling, horse-riding, sailing, canoeing, rafting, kayaking, climbing and tennis are just a few of the exciting activities this area has to offer.','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'sporting-activities', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                    <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                        <!-- PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          <?php echo __('Wine Tasting','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('We are in the middle of a huge wine growing area, the Languedoc Roussillon, which produces many fabulous wines. There are some especially good vineyards close by where you are able to sample award winning wines, alternatively, we can arrange a private wine-tasting for you at Le Sarrail.','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'wine-tasting', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                    <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                    <!-- PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          Golf
                        </a>
                      </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('There are many golf courses in the region, most of which are pay and play. Domaine dAurriac in Carcassonne has a stunning 18 hole course set in the grounds of a 4 star hotel with a top class restaurant and bistro.','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'golf', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                    <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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
                    <!-- PANEL -->
                    <div class="panel panel-map">
                    <div class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                          <?php echo __('Toulouse & Cité despace','lesarrail_text');?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven">
                        <div class="panel-body">
                            <div class="global-description"><?php echo __('The Space City is just outside Toulouse (45 minutes drive), home to the Ariane rocket and is a great day out for all the family. There is a life size replica of the Ariane launch vehicle 5,53 meters tall, ready for take off. The Imax Space Station film is a must (the first ever 3D film shot in space), there is also a Planetarium and an animated film for children explaining the constellations. Toulouse center itself is also well worth a visit - cosmopolitan with great restaurants and shopping, and wonderful architecture','lesarrail_text');?></div>
                                <?php   $args = array( 'post_type' => 'poi', 'category_name' => 'toulouse-cite despace', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                    <?php $address = get_post_meta($post->ID, 'martygeocoderaddress', true); ?>
                                    <?php $img = get_image_custom($post->ID, 'thumbnail'); ?>
                                    <?php $url = get_post_meta($post->ID, 'wpcf-poi-url', true); ?>
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
                                            <div class="poi-det-cont">
                                            <div class="poi-details"><?php the_content(); ?></div>
                                            <div class="poi-url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></div>
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