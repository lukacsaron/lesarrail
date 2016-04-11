$vph = jQuery(window).height();

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

function slideshow_start() {
    $('#slideshow .slideshow-item:gt(0)').hide();
    setInterval(function(){
      $('#slideshow :first-child').fadeTo(1500,0)
         .next('.slideshow-item').fadeTo(1500,1)
         .end().appendTo('#slideshow');}, 
      3000);
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
        $features_height = jQuery('.features').height();
        jQuery('.features_2').css({'height': $features_height + 'px'});
        var safezone = 80;
        jQuery('#single-wrapper').css({'min-height': $vph - safezone + 'px'});
    }
}

function appearHome() {
    
    jQuery(window).on("load", function() {
         console.log("window is loaded");
        if (jQuery('body').hasClass('page-template-page-home') ) {
            var element = jQuery(".home-bottom");
            TweenMax.to(element, 1, {marginTop:"-30px", ease:Power4.easeOut});
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
        var safezone = 80;
        jQuery('#slideshow').css({'height': $vph - safezone + 'px'});
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
};

// ON READY
jQuery(document).ready(function() {
    ifHome();
    resizeContent();
    wrapperMaxHeight();
    slideshow_start();
    appearHome();
    appearBox();
    setFeatureHeight();
    initialize();
});

// ON RESIZE
jQuery(window).resize(function(){
    // change variables
    $vph = jQuery(window).height();
    // run functions
    ifHome();
    resizeContent();
    wrapperMaxHeight();
});

// ON CLICK
jQuery('.scroll-btn').on("click", function() {
    TweenLite.to(window, 2, {scrollTo:{y:$vph-40}, ease:Power2.easeOut});
});

jQuery('.opener-btn').on("click", function() {
      jQuery(this).toggleClass('closer');
      jQuery(this).next().toggleClass('closed');
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