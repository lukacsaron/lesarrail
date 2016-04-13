$vph = jQuery(window).height();
$lch = jQuery(".activity-featured").width();
$isMobile = window.matchMedia("only screen and (max-width: 768px)");

function resizeContent() {
    if (jQuery('body').hasClass('page-template-fullwidthpage') ) {
        var safezone = 220;
        var currentsize = jQuery('#primary').height;
        jQuery('.entry-content').css({'max-height': $vph - safezone + 'px'});
    }
}

function wrapperMaxHeight() {
    if (jQuery('body').hasClass('page-template-fullwidthpage') ) {
        var safezone = 80;
        jQuery('#page-wrapper').css({'height': $vph - safezone + 'px'});
    }
}

function areaMaxHeight() {
    if (jQuery('body').hasClass('page-template-page-area') ) {
        var safezone = 80;
        if ($isMobile.matches) {
            
        }
        else {
            jQuery('#page-wrapper').css({'height': $vph - safezone + 'px'});
        }
       // jQuery('#map-container').css({'height': $vph - safezone - 80 + 'px'});
    }
}

function slideshow_start() {
    $('#slideshow .slideshow-item:gt(0)').hide();
    setInterval(function(){
      $('#slideshow :first-child').fadeTo(1500,0)
         .next('.slideshow-item').fadeTo(1500,1)
         .end().appendTo('#slideshow');}, 
      3000);
}


function ApartmentSlide() {
    if (jQuery('body').hasClass('page-template-page-home') ) {
        $('#apartment-slider .apartment:gt(0)').hide();
        setInterval(function(){
          $('#apartment-slider .apartment:nth-child(1)').fadeTo(1500,0)
             .next('#apartment-slider .apartment').fadeTo(1500,1)
             .end().appendTo('#apartment-slider');}, 
          3000);
    }
}
 

function appearBox() {
    jQuery(window).on("load", function() {
        if (jQuery('body').hasClass('page-template-fullwidthpage') || jQuery('body').hasClass('single-apartment')) {
            console.log("window is loaded");
            var box = document.getElementById("primary");
            TweenMax.to(box, 1, {marginTop:"0px", opacity:"1", ease:Power4.easeOut});
        }
    });
}

function setFeatureHeight() {
    if (jQuery('body').hasClass('single-apartment') || jQuery('body').hasClass('page-template-page-accomodation') ) {
        $( ".type-apartment .features").each(function() {
            $features_height = jQuery(this).height();
            $(this).next().css({'height': $features_height + 'px'});
        });
        var safezone = 80;
        jQuery('#single-wrapper').css({'min-height': $vph - safezone + 'px'});
}
}

function setContentHeight() {
    if (jQuery('body').hasClass('page-template-page-accomodation')) {
        $content_heights = [];
        $( ".type-apartment .entry-content" ).each(function() {
            var height = $(this).height();
            $content_heights.push(height);
            if ($isMobile.matches) {
                $(this).parent().css({'height': height + 70 + 'px'});
            }
            else {
                $(this).parent().css({'height': height + 50 + 'px'});
            }
        });
    }
}

function appearHome() {
    
    jQuery(window).on("load", function() {
         console.log("window is loaded");
         setFeatureHeight();
         setContentHeight();
        if (jQuery('body').hasClass('page-template-page-home') ) {
            var element = jQuery(".home-bottom");
            TweenMax.to(element, 1, {opacity:1,marginTop:"-50px", ease:Power4.easeOut});
        }
    });
}

function appearHomeContent() {
        if (jQuery('body').hasClass('page-template-page-home') ) {
            var element = jQuery(".primary-container");
            TweenMax.to(element, 1, {marginTop:"0px", opacity: "1", ease:Power4.easeOut});
        }
}

function ifHome() {
    if (jQuery('body').hasClass('page-template-page-home') ) {
        if ($isMobile.matches) {
            var safezone = 80;
            var width_slide = jQuery("#slideshow").width();
            var height_slide = width_slide / 1.66;
            jQuery("#slideshow").css({'min-height': height_slide + 'px'});
            jQuery("#slideshow").css({'max-height': height_slide + 'px'});
        }
        else {
           var safezone = 80; 
        }
        
        jQuery('#slideshow').css({'height': $vph - safezone + 'px'});
        jQuery('.page-link .apartment').css({'width': $lch + 'px'});
    }
}

// change links if localhost

function hashchange() {
    if(window.location.href.indexOf("8888") > -1) {
       console.log("you are on localhost");
        $('a').each(function() { 
    var $this = $(this),
    aHref = $this.attr('href');  //get the value of an attribute 'href'
    $this.attr('href', aHref.replace('beta.lesarrail.co.uk','lesarrail:8888')); //set the value of an attribute 'href'
           console.log("links are changed");
}); 
    }
    else {
       console.log("you are on remote");
    }
}

jQuery(document).ready(function() {
    if (jQuery('body').hasClass('page-template-page-area') ) {
        var safezone = 200;
        var safezone_dt = 180;
        jQuery('#map').css({'min-height': $vph - safezone_dt + 'px'});
        jQuery('#map').css({'max-height': $vph - safezone + 'px'});
    }
    
});

jQuery(document).ready(function() {
    if (jQuery('body').hasClass('page-template-page-home') ) {
    var links = document.getElementById('brand-ident').getElementsByTagName('a'),
    options = {
        // Start an automatic slideshow with a delay of 5 seconds between slides:
                 interval: 5000,
        // Set to true to initialize the Gallery with carousel specific options:
                  carousel: false,
                controlsClass: 'blueimp-gallery-controls',
                singleClass: 'blueimp-gallery-single',                  
                leftEdgeClass: 'blueimp-gallery-left',
                rightEdgeClass: 'blueimp-gallery-right',
                enableKeyboardNavigation: true,
                closeOnEscape: true,
                   }
    }
});

// ON READY
jQuery(document).ready(function() {
    ifHome();
    ApartmentSlide();
    resizeContent();
    wrapperMaxHeight();
    areaMaxHeight();
    slideshow_start();
    appearHome();
    appearBox();
    initialize();
});

// ON RESIZE
jQuery(window).resize(function(){
    // change variables
    $vph = jQuery(window).height();
    $lch = jQuery(".activity-featured").width();
    $isMobile = window.matchMedia("only screen and (max-width: 768px)");
    // run functions
    ifHome();
    resizeContent();
    areaMaxHeight();
    setFeatureHeight();
    setContentHeight();
    wrapperMaxHeight();
});

// ON CLICK
jQuery('.scroll-btn').on("click", function() {
    TweenLite.to(window, 2, {scrollTo:{y:$vph-40}, ease:Power2.easeOut});
});

jQuery('.opener-btn').on("click", function() {
      jQuery(this).toggleClass('closer');
      jQuery(this).next().toggleClass('closed');
      jQuery(this).delay(1000).next().next().toggleClass('visible');
});

// ON SCROLL
$(document).scroll(function(){
    if($(this).scrollTop() > $vph - $vph/1.5)
    { 
        appearHomeContent();
    }
    if($(this).scrollTop() > 0)
    { 
        $('.navbar-fixed-top').addClass('scrolled');
    }
    else {
        $('.navbar-fixed-top').removeClass('scrolled');
    }
});

// ADD ACTIVE TO PANEL HEADING

jQuery('.collapse').on('hide.bs.collapse', function () {
  jQuery(this).prev().removeClass('active-heading');
});

jQuery('.collapse').on('show.bs.collapse', function () {
  jQuery(this).prev().addClass('active-heading');
});

