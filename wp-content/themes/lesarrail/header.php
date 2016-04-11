<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php echo get_theme_mod( 'understrap_theme_script_code_setting' ); ?>
    <style>
      #map {
        height: 100%;
      }
    </style>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhr54CGMVgdD-WiPGP-jgYNFUhjHJUl4g"></script>
<script>
var infowindow = new google.maps.InfoWindow();
var markers = [];
function initialize() {
	map = new google.maps.Map(document.getElementById('map'), { 
		zoom: 10, 
		center: new google.maps.LatLng(43.174677, 2.151427), 
		mapTypeId: google.maps.MapTypeId.ROADMAP,
        backgroundColor: "#002e4d"
	});
    var styles = [
  {
    "stylers": [
      { "saturation": -63 }
    ]
  },{
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      { "color": "#002e4d" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "color": "#002e4d" },
      { "lightness": 26 }
    ]
  },{
    "featureType": "road",
    "elementType": "labels.icon"  },{
    "elementType": "labels.text.stroke",
    "stylers": [
      { "color": "#ffffff" }
    ]
  },{
    "featureType": "administrative",
    "elementType": "labels.text.fill"  },{
    "featureType": "landscape.natural",
    "stylers": [
      { "saturation": 29 },
      { "gamma": 0.53 }
    ]
  },{
    "featureType": "landscape.natural.terrain",
    "stylers": [
      { "lightness": 40 },
      { "color": "#80a580" }
    ]
  }
];
    map.setOptions({styles: styles});
    var latlng = new google.maps.LatLng(43.174677, 2.151427);
    var marker_lesarrail = new google.maps.Marker ({
        position: latlng,
        map: map,
        icon: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAAAoCAMAAAB95dzmAAABklBMVEUAAAAAL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL03///8AME4ALUsACy4AMU4BK0oAIkIAHT5tiJkfSGMAKkgAJEQAI0MAGzsADTAFM1AAGDkACCwOOFYANlQINlMAM1EAIEAAFDYAEDPg5up9lqUQPFiPpLGInqyFmqlphZYwVm8kTGYAJ0YAEzUAAB37/Py7x8+qusRkgZNPb4Q2W3MnUGkSPloAACEAABn8/f3v8/Tr7/Hl6e3R2d+1w8yhs76XrLiSp7RhfpBaeo1XdYlTdIhKZ30AKEcABSjz+/zz9ffn7O/h4+fZ4OXEzdSKoa5+l6ZzjZ6WjJpdd4tJbYM6XnYXQl0MLUsAABT2+Pn19/jK1Nq/0diyx9CuvceyvMVbcYZCZ31EX3YuVW0zU2s8UWotSGMTRF85PlkmPVgeN1QnLUkAFzFFEYWNAAAAInRSTlMAr6Twm+cN+eHAgE8mHu3RtT7XyqWQdGEH++CoeW5bRBYPeVWkkQAAAqtJREFUSMek0EkKgDAQBdFWMzskClFwIfLvf0h3giSRtL4bVNGb2TV+N0uIvaIv1Opxm+JIbIfEg3bEJJCwJ3FYZEhOTECWrL/qUGCp0oCiLfutTRgU6TYhCL9Rd7E6X1luAkEUQD+8k340OUgEIyEBAgTKOefR5Bycc/a+jezxzALsj+4+/U7VrfpX4cl/IjheoAzh9gRN2OPSkCFqXkkDJY0Zqgoanz6aoPJMWhtrZPdTOCrw3OMWjE52t21bOt0JBvVENcfHtrprsu1MPkd0SzeEHKcoepx26gxNz+MWzrooi6TgjkYHpQIhNHN53E8T1j1sFVRrPNh/bWXbxcH+9FalTn10kxGsorSVi6vkgchKaBvErGGzilRCBB64LMkJX8WEFT3Mv6Lea0H6hFPTkQF/m++gVGlDYh+IwgKyQ7Mz1E5aBiG8GFRPmpp5VlxDNr2+/6Na70UIv6FkmpNaCJp4cLtlLEzK/CUa6LBKtt5/u7jRCFGs95+nuKoM8Sod5j17jqHCfsABjvOOjsFLLCud38Sqq3L3BNvA4dHV3QRvaoFISaaM8Rjfm/AvXuCWR7jBpnuNawkfK1MEF0MkNvxeGdUj16F/CEGWgnn0s3V+Ol/mKaFx2Z9F2WZYuPPcL7EkJ9La6Ei2eP7OaCy3vXbwlA+jjNU4mzXFe+JXc3WzgiAQBHB8pA8FP6KUMiqioUYTwhVj0XqZ3v8p2ttQGrHjxd9hT3ubGf5NSRWVWpm3btCMvaB7rYvqolvKM7qeSekX3XJq9eOZNYoQqdB5RaTM98lIFhwHg8TpcvGHldOVQB8f+0WpMAFsCRZi7LEHG6cZduzATrDFLzHYOoozxDb4IQAma5oPTFb3NchwnacgtuAaS809NLwUBggjRDeEQQK+DDH/AH+8Ab4h5+Z0E6QrAAAAAElFTkSuQmCC"

    })

	for (var i = 0; i < locations.length; i++) {  
		var marker = new google.maps.Marker({
	    	position: locations[i].latlng,
			map: map,
            icon: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAoCAMAAACo9wirAAAA3lBMVEUAAAAAL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL00AL03///8ALEsAKkkAGDkAJkUAHj4AGzxVc4cAFTcAEjQ4XHQAIkLx9ParusWGnauAl6dZeIvm6+7h6evS2t/CztW9ydGhsr6hsb1wippohpdieo1SbYJFa4BIaX8wWXEqTGUlSmQiR2EYPloQNFEGChv/AAAAJXRSTlMA/MwxGNN7dBEHsaeVZV8D7eq4jH9BOObDu6Gbh1VPSNza1m8ocl0I6wAAAVVJREFUOMt9k+eWgjAQRocmFgR7L9uiAQTbur33ff8X8sRjMgGC9xcn9zvDMBNAouM6DV3vDeypB1lKdo8IrFEx7ScWSdC1k75JMjRM1F6ZKNDxNegTWLxGi+RQhgMGyaUKjD5B5pTOCVJjbbQl7Yc0WIQEaQFAhXCCxWq3fXr5jbGIVYJiV/j19YyxeQsx0YGOqL9g/kDkS226/NH/mnFu/wN+6kBBFNjNBB8xD1REgNItBm6WYiMYCJ5VAaxA4lcMrESXQxjzx/Bvw/3DmvJTW9qEHx393Q8O04DSOQ7i/Z75x28cw4UH4BBMaJ9RtFpLyyikth3Ey6VPpW2agNvKvw9XWp7X8Uor0Qz+z+jqwCVwzJr6yiJTRRtWESTcjK+bkGCUbrANKZxkwIUMfdk3ZaP42AGoMOtigh4oMY6JMxNyaGs4YTUTFhjDCarsFp6kNYQke+8sfQQE1cw9AAAAAElFTkSuQmCC"
		});
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
		  return function() {
		    infowindow.setContent(locations[i].info);
		    infowindow.open(map, marker);
		  }
		})(marker, i));
        // Push the marker to the 'markers' array
            markers.push(marker);
	}

}

    function myClick(id){
        google.maps.event.trigger(markers[id], 'click');
    }    
</script>
</head>

<body <?php body_class(); ?>>    
    <?php wp_nav_menu(
        array(
            'theme_location' => 'primary',
            'container_class' => 'navmenu navmenu-default navmenu-fixed-right offcanvas',
            'menu_class' => 'nav navmenu-nav',
            'fallback_cb' => '',
            'menu_id' => 'mobile-main-menu',
            'walker' => new wp_bootstrap_navwalker()
        )
    ); ?>

    <div class="navbar navbar-default navbar-fixed-top hide-md">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">LE SARRAIL</a>
        </div>
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>


<div id="page" class="hfeed site">
    
    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar hide-sm" id="wrapper-navbar">
	   <div id="nav-spacer"></div>
        <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            
            <div class="navbar navbar-default navbar-fixed-top">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="navbar-header">

                                <!-- Your site title as branding in the menu -->
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">LE SARRAIL</a>

                            </div>

                            <!-- The WordPress Menu goes here -->
                            <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'menu_id' => 'main-menu',
                                        'walker' => new wp_bootstrap_navwalker()
                                    )
                            ); ?>

                        </div> <!-- .col-md-11 or col-md-12 end -->

                    </div> <!-- .row end -->

                </div> <!-- .container -->
                
            </div><!-- .navbar -->
            
        </nav><!-- .site-navigation -->
        
    </div><!-- .wrapper-navbar end -->






