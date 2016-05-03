
/* custom.js */

/* 1   */ $vph = jQuery(window).height();
/* 2   */ $lch = jQuery(".activity-featured").width();
/* 3   */ $isMobile = window.matchMedia("only screen and (max-width: 768px)");
/* 4   */ 
/* 5   */ function resizeContent() {
/* 6   */     if (jQuery('body').hasClass('fadein')  || jQuery('body').hasClass('single-activity') ) {
/* 7   */         var safezone = 220;
/* 8   */         var currentsize = jQuery('#primary').height();
/* 9   */         jQuery('.entry-content').css({'max-height': $vph - safezone + 'px'});
/* 10  */         jQuery('#secondary').css({'height': $vph - safezone + 69 + 'px'});
/* 11  */     }
/* 12  */ }
/* 13  */ 
/* 14  */ function wrapperMaxHeight() {
/* 15  */     if (jQuery('body').hasClass('fadein')  || jQuery('body').hasClass('single-activity') ) {
/* 16  */         var safezone = 80;
/* 17  */         jQuery('#page-wrapper').css({'height': $vph - safezone + 'px'});
/* 18  */     }
/* 19  */ }
/* 20  */ 
/* 21  */ function areaMaxHeight() {
/* 22  */     if (jQuery('body').hasClass('page-template-page-area') ) {
/* 23  */         var safezone = 80;
/* 24  */         if ($isMobile.matches) {
/* 25  */             
/* 26  */         }
/* 27  */         else {
/* 28  */             jQuery('#page-wrapper').css({'height': $vph - safezone + 'px'});
/* 29  */         }
/* 30  */        // jQuery('#map-container').css({'height': $vph - safezone - 80 + 'px'});
/* 31  */     }
/* 32  */ }
/* 33  */ 
/* 34  */ function slideshow_start() {
/* 35  */     $('#slideshow .slideshow-item:gt(0)').hide();
/* 36  */     setInterval(function(){
/* 37  */       $('#slideshow :first-child').fadeTo(1500,0)
/* 38  */          .next('.slideshow-item').fadeTo(1500,1)
/* 39  */          .end().appendTo('#slideshow');}, 
/* 40  */       3000);
/* 41  */ }
/* 42  */ 
/* 43  */ 
/* 44  */ function ApartmentSlide() {
/* 45  */     if (jQuery('body').hasClass('page-template-page-home') ) {
/* 46  */         $('#apartment-slider .apartment:gt(0)').hide();
/* 47  */         setInterval(function(){
/* 48  */           $('#apartment-slider .apartment:nth-child(1)').fadeTo(1500,0)
/* 49  */              .next('#apartment-slider .apartment').fadeTo(1500,1)
/* 50  */              .end().appendTo('#apartment-slider');}, 

/* custom.js */

/* 51  */           3000);
/* 52  */     }
/* 53  */ }
/* 54  */  
/* 55  */ 
/* 56  */ function appearBox() {
/* 57  */     jQuery(window).on("load", function() {
/* 58  */         if (jQuery('body').hasClass('fadein')  || jQuery('body').hasClass('single-activity') ) {
/* 59  */             console.log("window is loaded");
/* 60  */             var box = document.getElementById("primary");
/* 61  */             TweenMax.to(box, 1, {marginTop:"0px", opacity:"1", ease:Power4.easeOut});
/* 62  */         }
/* 63  */     });
/* 64  */ }
/* 65  */ 
/* 66  */ function setFeatureHeight() {
/* 67  */     if (jQuery('body').hasClass('single-apartment') || jQuery('body').hasClass('page-template-page-accomodation') ) {
/* 68  */         $( ".type-apartment .features").each(function() {
/* 69  */             $features_height = jQuery(this).height();
/* 70  */             $(this).next().css({'height': $features_height + 'px'});
/* 71  */         });
/* 72  */         var safezone = 80;
/* 73  */         jQuery('#single-wrapper').css({'min-height': $vph - safezone + 'px'});
/* 74  */ }
/* 75  */ }
/* 76  */ 
/* 77  */ function setContentHeight() {
/* 78  */     if (jQuery('body').hasClass('page-template-page-accomodation')) {
/* 79  */         $content_heights = [];
/* 80  */         $( ".type-apartment .entry-content" ).each(function() {
/* 81  */             var height = $(this).height();
/* 82  */             $content_heights.push(height);
/* 83  */             if ($isMobile.matches) {
/* 84  */                 $(this).parent().css({'height': height + 70 + 'px'});
/* 85  */             }
/* 86  */             else {
/* 87  */                 $(this).parent().css({'height': height + 50 + 'px'});
/* 88  */             }
/* 89  */         });
/* 90  */     }
/* 91  */ }
/* 92  */ 
/* 93  */ jQuery(document).ready(function() {
/* 94  */     jQuery('.apartment-description').readmore({
/* 95  */         speed: 75,
/* 96  */         collapsedHeight: 106,
/* 97  */         afterToggle: function(trigger, element, expanded) {
/* 98  */         if(expanded) { // The "Close" link was clicked
/* 99  */             setContentHeight();
/* 100 */         }

/* custom.js */

/* 101 */             if(! expanded) { // The "Close" link was clicked
/* 102 */             setContentHeight();
/* 103 */         }
/* 104 */   }
/* 105 */     });
/* 106 */ });
/* 107 */ 
/* 108 */ function appearHome() {
/* 109 */     
/* 110 */     jQuery(window).on("load", function() {
/* 111 */          console.log("window is loaded");
/* 112 */          // setFeatureHeight();
/* 113 */          setContentHeight();
/* 114 */         if (jQuery('body').hasClass('page-template-page-home') ) {
/* 115 */             var element = jQuery(".home-bottom");
/* 116 */             TweenMax.to(element, 1, {opacity:1,marginTop:"-50px", ease:Power4.easeOut});
/* 117 */         }
/* 118 */     });
/* 119 */ }
/* 120 */ 
/* 121 */ function appearHomeContent() {
/* 122 */         if (jQuery('body').hasClass('page-template-page-home') ) {
/* 123 */             var element = jQuery(".primary-container");
/* 124 */             TweenMax.to(element, 1, {marginTop:"0px", opacity: "1", ease:Power4.easeOut});
/* 125 */         }
/* 126 */ }
/* 127 */ 
/* 128 */ function ifHome() {
/* 129 */     if (jQuery('body').hasClass('page-template-page-home') ) {
/* 130 */         if ($isMobile.matches) {
/* 131 */             var safezone = 80;
/* 132 */             var width_slide = jQuery("#slideshow").width();
/* 133 */             var height_slide = width_slide / 1.66;
/* 134 */             jQuery("#slideshow").css({'min-height': height_slide + 'px'});
/* 135 */             jQuery("#slideshow").css({'max-height': height_slide + 'px'});
/* 136 */         }
/* 137 */         else {
/* 138 */            var safezone = 80; 
/* 139 */         }
/* 140 */         
/* 141 */         jQuery('#slideshow').css({'height': $vph - safezone + 'px'});
/* 142 */        // jQuery('.page-link .apartment').css({'width': $lch + 'px'});
/* 143 */     }
/* 144 */ }
/* 145 */ 
/* 146 */ // change links if localhost
/* 147 */ 
/* 148 */ function hashchange() {
/* 149 */     if(window.location.href.indexOf("8888") > -1) {
/* 150 */        console.log("you are on localhost");

/* custom.js */

/* 151 */         $('a').each(function() { 
/* 152 */     var $this = $(this),
/* 153 */     aHref = $this.attr('href');  //get the value of an attribute 'href'
/* 154 */     $this.attr('href', aHref.replace('beta.lesarrail.co.uk','lesarrail:8888')); //set the value of an attribute 'href'
/* 155 */            console.log("links are changed");
/* 156 */ }); 
/* 157 */     }
/* 158 */     else {
/* 159 */        console.log("you are on remote");
/* 160 */     }
/* 161 */ }
/* 162 */ 
/* 163 */ jQuery(document).ready(function() {
/* 164 */     if (jQuery('body').hasClass('page-template-page-area') ) {
/* 165 */         var safezone = 200;
/* 166 */         var safezone_dt = 180;
/* 167 */         jQuery('#map').css({'min-height': $vph - safezone_dt + 'px'});
/* 168 */         jQuery('#map').css({'max-height': $vph - safezone + 'px'});
/* 169 */     }
/* 170 */     
/* 171 */ });
/* 172 */ 
/* 173 */ jQuery(document).ready(function() {
/* 174 */     if (jQuery('body').hasClass('page-template-page-home') ) {
/* 175 */     var links = document.getElementById('brand-ident').getElementsByTagName('a'),
/* 176 */     options = {
/* 177 */         // Start an automatic slideshow with a delay of 5 seconds between slides:
/* 178 */                  interval: 5000,
/* 179 */         // Set to true to initialize the Gallery with carousel specific options:
/* 180 */                   carousel: false,
/* 181 */                 controlsClass: 'blueimp-gallery-controls',
/* 182 */                 singleClass: 'blueimp-gallery-single',                  
/* 183 */                 leftEdgeClass: 'blueimp-gallery-left',
/* 184 */                 rightEdgeClass: 'blueimp-gallery-right',
/* 185 */                 enableKeyboardNavigation: true,
/* 186 */                 closeOnEscape: true,
/* 187 */                    }
/* 188 */     }
/* 189 */     if (jQuery('body').hasClass('fadein') ) {
/* 190 */     var links = jQuery("a[rel^=attachment]"),
/* 191 */     options = {
/* 192 */         // Start an automatic slideshow with a delay of 5 seconds between slides:
/* 193 */                  interval: 5000,
/* 194 */         // Set to true to initialize the Gallery with carousel specific options:
/* 195 */                   carousel: false,
/* 196 */                 controlsClass: 'blueimp-gallery-controls',
/* 197 */                 singleClass: 'blueimp-gallery-single',                  
/* 198 */                 leftEdgeClass: 'blueimp-gallery-left',
/* 199 */                 rightEdgeClass: 'blueimp-gallery-right',
/* 200 */                 enableKeyboardNavigation: true,

/* custom.js */

/* 201 */                 closeOnEscape: true,
/* 202 */                    }
/* 203 */     }
/* 204 */ });
/* 205 */ 
/* 206 */ // ON READY
/* 207 */ jQuery(document).ready(function() {
/* 208 */     ifHome();
/* 209 */   //  ApartmentSlide();
/* 210 */   //  resizeContent();
/* 211 */   //  wrapperMaxHeight();
/* 212 */    // areaMaxHeight();
/* 213 */     slideshow_start();
/* 214 */     appearHome();
/* 215 */     appearBox();
/* 216 */     initialize();
/* 217 */     
/* 218 */ });
/* 219 */ 
/* 220 */ // ON RESIZE
/* 221 */ jQuery(window).resize(function(){
/* 222 */     // change variables
/* 223 */     $vph = jQuery(window).height();
/* 224 */     $lch = jQuery(".activity-featured").width();
/* 225 */     $isMobile = window.matchMedia("only screen and (max-width: 768px)");
/* 226 */     // run functions
/* 227 */     ifHome();
/* 228 */   // resizeContent();
/* 229 */   //  areaMaxHeight();
/* 230 */    // setFeatureHeight();
/* 231 */     setContentHeight();
/* 232 */   //  wrapperMaxHeight();
/* 233 */ });
/* 234 */ 
/* 235 */ // ON CLICK
/* 236 */ jQuery('.scroll-btn').on("click", function() {
/* 237 */     TweenLite.to(window, 2, {scrollTo:{y:$vph-40}, ease:Power2.easeOut});
/* 238 */ });
/* 239 */ 
/* 240 */ jQuery('.opener-btn').on("click", function() {
/* 241 */       jQuery(this).toggleClass('closer');
/* 242 */       jQuery(this).next().toggleClass('closed');
/* 243 */       jQuery(this).delay(1000).next().next().toggleClass('visible');
/* 244 */ });
/* 245 */ 
/* 246 */ // ON SCROLL
/* 247 */ $(document).scroll(function(){
/* 248 */     if($(this).scrollTop() > $vph - $vph/1.5)
/* 249 */     { 
/* 250 */         appearHomeContent();

/* custom.js */

/* 251 */     }
/* 252 */     if($(this).scrollTop() > 0)
/* 253 */     { 
/* 254 */         $('.navbar-fixed-top').addClass('scrolled');
/* 255 */     }
/* 256 */     else {
/* 257 */         $('.navbar-fixed-top').removeClass('scrolled');
/* 258 */     }
/* 259 */ });
/* 260 */ 
/* 261 */ // ADD ACTIVE TO PANEL HEADING
/* 262 */ 
/* 263 */ jQuery('.collapse').on('hide.bs.collapse', function () {
/* 264 */   jQuery(this).prev().removeClass('active-heading');
/* 265 */ });
/* 266 */ 
/* 267 */ jQuery('.collapse').on('show.bs.collapse', function () {
/* 268 */   jQuery(this).prev().addClass('active-heading');
/* 269 */ });
/* 270 */ 
/* 271 */ /*!
/* 272 *|  * @preserve
/* 273 *|  *
/* 274 *|  * Readmore.js jQuery plugin
/* 275 *|  * Author: @jed_foster
/* 276 *|  * Project home: http://jedfoster.github.io/Readmore.js
/* 277 *|  * Licensed under the MIT license
/* 278 *|  *
/* 279 *|  * Debounce function from http://davidwalsh.name/javascript-debounce-function
/* 280 *|  */
/* 281 */ !function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";function e(t,e,i){var a;return function(){var n=this,o=arguments,r=function(){a=null,i||t.apply(n,o)},s=i&&!a;clearTimeout(a),a=setTimeout(r,e),s&&t.apply(n,o)}}function i(t){var e=++h;return String(null==t?"rmjs-":t)+e}function a(t){var e=t.clone().css({height:"auto",width:t.width(),maxHeight:"none",overflow:"hidden"}).insertAfter(t),i=e.outerHeight(),a=parseInt(e.css({maxHeight:""}).css("max-height").replace(/[^-\d\.]/g,""),10),n=t.data("defaultHeight");e.remove();var o=a||t.data("collapsedHeight")||n;t.data({expandedHeight:i,maxHeight:a,collapsedHeight:o}).css({maxHeight:"none"})}function n(t){if(!d[t.selector]){var e=" ";t.embedCSS&&""!==t.blockCSS&&(e+=t.selector+" + [data-readmore-toggle], "+t.selector+"[data-readmore]{"+t.blockCSS+"}"),e+=t.selector+"[data-readmore]{transition: height "+t.speed+"ms;overflow: hidden;}",function(t,e){var i=t.createElement("style");i.type="text/css",i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),t.getElementsByTagName("head")[0].appendChild(i)}(document,e),d[t.selector]=!0}}function o(e,i){this.element=e,this.options=t.extend({},s,i),n(this.options),this._defaults=s,this._name=r,this.init(),window.addEventListener?(window.addEventListener("load",l),window.addEventListener("resize",l)):(window.attachEvent("load",l),window.attachEvent("resize",l))}var r="readmore",s={speed:100,collapsedHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,blockCSS:"display: block; width: 100%;",startOpen:!1,beforeToggle:function(){},afterToggle:function(){}},d={},h=0,l=e(function(){t("[data-readmore]").each(function(){var e=t(this),i="true"===e.attr("aria-expanded");a(e),e.css({height:e.data(i?"expandedHeight":"collapsedHeight")})})},100);o.prototype={init:function(){var e=t(this.element);e.data({defaultHeight:this.options.collapsedHeight,heightMargin:this.options.heightMargin}),a(e);var n=e.data("collapsedHeight"),o=e.data("heightMargin");if(e.outerHeight(!0)<=n+o)return!0;var r=e.attr("id")||i(),s=this.options.startOpen?this.options.lessLink:this.options.moreLink;e.attr({"data-readmore":"","aria-expanded":this.options.startOpen,id:r}),e.after(t(s).on("click",function(t){return function(i){t.toggle(this,e[0],i)}}(this)).attr({"data-readmore-toggle":"","aria-controls":r})),this.options.startOpen||e.css({height:n})},toggle:function(e,i,a){a&&a.preventDefault(),e||(e=t('[aria-controls="'+_this.element.id+'"]')[0]),i||(i=_this.element);var n=t(i),o="",r="",s=!1,d=n.data("collapsedHeight");n.height()<=d?(o=n.data("expandedHeight")+"px",r="lessLink",s=!0):(o=d,r="moreLink"),this.options.beforeToggle(e,n,!s),n.css({height:o}),n.on("transitionend",function(i){return function(){i.options.afterToggle(e,n,s),t(this).attr({"aria-expanded":s}).off("transitionend")}}(this)),t(e).replaceWith(t(this.options[r]).on("click",function(t){return function(e){t.toggle(this,i,e)}}(this)).attr({"data-readmore-toggle":"","aria-controls":n.attr("id")}))},destroy:function(){t(this.element).each(function(){var e=t(this);e.attr({"data-readmore":null,"aria-expanded":null}).css({maxHeight:"",height:""}).next("[data-readmore-toggle]").remove(),e.removeData()})}},t.fn.readmore=function(e){var i=arguments,a=this.selector;return e=e||{},"object"==typeof e?this.each(function(){if(t.data(this,"plugin_"+r)){var i=t.data(this,"plugin_"+r);i.destroy.apply(i)}e.selector=a,t.data(this,"plugin_"+r,new o(this,e))}):"string"==typeof e&&"_"!==e[0]&&"init"!==e?this.each(function(){var a=t.data(this,"plugin_"+r);a instanceof o&&"function"==typeof a[e]&&a[e].apply(a,Array.prototype.slice.call(i,1))}):void 0}});
