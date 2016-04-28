<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

<?php get_template_part('widget-templates/footerfull'); ?>

<div class="wrapper" id="wrapper-footer">
    
    <div class="container">

        <div class="row">

            <div class="col-md-12">
    
                <footer id="colophon" class="site-footer" role="contentinfo">

                    <div class="site-info">
                        <div class="col-md-5 col-xs-6 footer-contacts nopadding">
                            <div class="col-md-5 col-md-push-4 footer-socials">
                            <a href="https://www.facebook.com/Le-Sarrail-593654507463494/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/lesarrail" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/le_sarrail/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                            <div class="col-md-6 col-md-pull-5">
                                <span>T: +33 (0)468 765 966</span><br>
                                <span>E: info@lesarrail.com</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-2 hide-sm footer-form">
                            <span><?php echo __('Sign up to our newsletter for special offers','lesarrail_text');?></span><br>
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
                        <div class="col-xs-6 col-md-2 col-md-push-5 col-lg-2 col-lg-push-1">
                            <span class="copyright">© 2016 Le Sarrail All Rights Reserved</span>
                        </div>
                    </div><!-- .site-info -->

                </footer><!-- #colophon -->

            </div><!--col end -->

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div><!-- wrapper end -->

</div><!-- #page -->
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/js/TweenMax.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/ScrollToPlugin.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>
</body>

</html>
