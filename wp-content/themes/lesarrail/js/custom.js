$vph = jQuery(window).height();
$lch = jQuery(".activity-featured").width();
$isMobile = window.matchMedia("only screen and (max-width: 768px)");

function resizeContent() {
    if (jQuery('body').hasClass('fadein') ) {
        var safezone = 220;
        var currentsize = jQuery('#primary').height();
        jQuery('.entry-content').css({'max-height': $vph - safezone + 'px'});
        jQuery('#secondary').css({'height': $vph - safezone + 69 + 'px'});
    }
}

function wrapperMaxHeight() {
    if (jQuery('body').hasClass('fadein') ) {
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
        if (jQuery('body').hasClass('fadein')) {
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

jQuery(document).ready(function() {
    jQuery('.apartment-description').readmore({
        speed: 75,
        collapsedHeight: 106,
        afterToggle: function(trigger, element, expanded) {
        if(expanded) { // The "Close" link was clicked
            setContentHeight();
        }
            if(! expanded) { // The "Close" link was clicked
            setContentHeight();
        }
  }
    });
});

function appearHome() {
    
    jQuery(window).on("load", function() {
         console.log("window is loaded");
         // setFeatureHeight();
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
       // jQuery('.page-link .apartment').css({'width': $lch + 'px'});
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
    if (jQuery('body').hasClass('fadein') ) {
    var links = jQuery("a[rel^=attachment]"),
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
  //  ApartmentSlide();
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
   // setFeatureHeight();
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

/*!
 * @preserve
 *
 * Readmore.js jQuery plugin
 * Author: @jed_foster
 * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license
 *
 * Debounce function from http://davidwalsh.name/javascript-debounce-function
 */
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";function e(t,e,i){var a;return function(){var n=this,o=arguments,r=function(){a=null,i||t.apply(n,o)},s=i&&!a;clearTimeout(a),a=setTimeout(r,e),s&&t.apply(n,o)}}function i(t){var e=++h;return String(null==t?"rmjs-":t)+e}function a(t){var e=t.clone().css({height:"auto",width:t.width(),maxHeight:"none",overflow:"hidden"}).insertAfter(t),i=e.outerHeight(),a=parseInt(e.css({maxHeight:""}).css("max-height").replace(/[^-\d\.]/g,""),10),n=t.data("defaultHeight");e.remove();var o=a||t.data("collapsedHeight")||n;t.data({expandedHeight:i,maxHeight:a,collapsedHeight:o}).css({maxHeight:"none"})}function n(t){if(!d[t.selector]){var e=" ";t.embedCSS&&""!==t.blockCSS&&(e+=t.selector+" + [data-readmore-toggle], "+t.selector+"[data-readmore]{"+t.blockCSS+"}"),e+=t.selector+"[data-readmore]{transition: height "+t.speed+"ms;overflow: hidden;}",function(t,e){var i=t.createElement("style");i.type="text/css",i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),t.getElementsByTagName("head")[0].appendChild(i)}(document,e),d[t.selector]=!0}}function o(e,i){this.element=e,this.options=t.extend({},s,i),n(this.options),this._defaults=s,this._name=r,this.init(),window.addEventListener?(window.addEventListener("load",l),window.addEventListener("resize",l)):(window.attachEvent("load",l),window.attachEvent("resize",l))}var r="readmore",s={speed:100,collapsedHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,blockCSS:"display: block; width: 100%;",startOpen:!1,beforeToggle:function(){},afterToggle:function(){}},d={},h=0,l=e(function(){t("[data-readmore]").each(function(){var e=t(this),i="true"===e.attr("aria-expanded");a(e),e.css({height:e.data(i?"expandedHeight":"collapsedHeight")})})},100);o.prototype={init:function(){var e=t(this.element);e.data({defaultHeight:this.options.collapsedHeight,heightMargin:this.options.heightMargin}),a(e);var n=e.data("collapsedHeight"),o=e.data("heightMargin");if(e.outerHeight(!0)<=n+o)return!0;var r=e.attr("id")||i(),s=this.options.startOpen?this.options.lessLink:this.options.moreLink;e.attr({"data-readmore":"","aria-expanded":this.options.startOpen,id:r}),e.after(t(s).on("click",function(t){return function(i){t.toggle(this,e[0],i)}}(this)).attr({"data-readmore-toggle":"","aria-controls":r})),this.options.startOpen||e.css({height:n})},toggle:function(e,i,a){a&&a.preventDefault(),e||(e=t('[aria-controls="'+_this.element.id+'"]')[0]),i||(i=_this.element);var n=t(i),o="",r="",s=!1,d=n.data("collapsedHeight");n.height()<=d?(o=n.data("expandedHeight")+"px",r="lessLink",s=!0):(o=d,r="moreLink"),this.options.beforeToggle(e,n,!s),n.css({height:o}),n.on("transitionend",function(i){return function(){i.options.afterToggle(e,n,s),t(this).attr({"aria-expanded":s}).off("transitionend")}}(this)),t(e).replaceWith(t(this.options[r]).on("click",function(t){return function(e){t.toggle(this,i,e)}}(this)).attr({"data-readmore-toggle":"","aria-controls":n.attr("id")}))},destroy:function(){t(this.element).each(function(){var e=t(this);e.attr({"data-readmore":null,"aria-expanded":null}).css({maxHeight:"",height:""}).next("[data-readmore-toggle]").remove(),e.removeData()})}},t.fn.readmore=function(e){var i=arguments,a=this.selector;return e=e||{},"object"==typeof e?this.each(function(){if(t.data(this,"plugin_"+r)){var i=t.data(this,"plugin_"+r);i.destroy.apply(i)}e.selector=a,t.data(this,"plugin_"+r,new o(this,e))}):"string"==typeof e&&"_"!==e[0]&&"init"!==e?this.each(function(){var a=t.data(this,"plugin_"+r);a instanceof o&&"function"==typeof a[e]&&a[e].apply(a,Array.prototype.slice.call(i,1))}):void 0}});