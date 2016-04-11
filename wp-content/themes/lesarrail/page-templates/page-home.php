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
<div class="container home-bottom">
    <div id="contact-home">
        <span class="tel">T: 432443</span>
        <span class="mail">M: info@lesarrail.com</span>
    </div>
    <div class="center scroll-btn"></div>
    <div id="subscribe">
        <span>T: 432443</span>
    </div>
</div>

<div class="wrapper" id="page-wrapper">    
    <div  id="content" class="container">
	   <div id="primary" class="col-md-8 col-md-offset-2 content-area">
            <main id="main" class="site-main" role="main">
                 <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title">Le Sarrail</h1>
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

            <div class="col-md-7 page-link transition">
                <a href="<?php echo get_page_link($maison_cypres); ?>">
                    <div class="box-wrapper" style="background-image:url('<?php echo get_image_custom($maison_cypres, 'medium'); ?>');">
                        <h2 class="title"><?php echo get_the_title($maison_cypres); ?></h2>
                    </div>
                </a>
            </div>

            <div class="col-md-7 page-link transition" >
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
            <div class="col-md-3 ident-item"><img class="grayscale opacity" src="<?php echo get_template_directory_uri(); ?>/img/bbfbh.png"></div>
            <div class="col-md-3 ident-item"><img class="grayscale opacity" src="<?php echo get_template_directory_uri(); ?>/img/Daily_Telegraph.svg"></div>
            <div class="col-md-3 ident-item"><img class="grayscale opacity" src="<?php echo get_template_directory_uri(); ?>/img/natgeo.jpg"></div>
            <div class="col-md-3 ident-item"><img class="grayscale opacity" src="<?php echo get_template_directory_uri(); ?>/img/times.gif"></div>
        </div>
    </div>
    
    <div id="insta" class="container center">
        <header class="entry-header">
            <h5>VISIT</h5>
            <h2 class="entry-title">Le Sarrail</h2>
        </header>
        <?php echo do_shortcode('[enjoyinstagram_mb_grid]'); ?>
    </div>
    
    <div id="map-container" class="container">
        <div class="col-md-12 full-height">
            <div class="col-md-5 panel-group-container">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Restaurants
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                                <?php $i = 1; ?>
                                <?php   $args = array( 'post_type' => 'poi', 'posts_per_page' => 40 );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if ( get_post_meta($post->ID, 'martygeocoderlatlng', true) !== '' ) : ?>
                                        <div style="display:none;">
                                        <div id="item<?php echo $i; ?>" class="map-info">
                                            <p><a><?php the_title(); ?></a></p>
                                            <?php the_content(); ?>
                                        </div>
                                            </div>
                                        <div class="map-info">
                                            <p><a onclick="myClick(<?php echo $i-1; ?>);"><?php the_title(); ?></a></p>
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endif;?>
                                    <?php $i++;	?>
                                <?php endwhile; ?>
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
            
        </div>
    </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>