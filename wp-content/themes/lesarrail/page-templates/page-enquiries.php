<?php
/**
 * Template Name: Enquiries Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container">
        <div class="row">
            <div class="col-md-12">
        
           <div id="primary" class="col-md-6 content-area">

                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :

                                comments_template();

                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->
                <div id="secondary" class="col-md-6 content-area">
                    <table>
                        <tbody>
                            <tr>
                                <td>
<div>&nbsp;
<table border="1"  align="center">
<tbody>
<tr>
<td class="table-title"><span><strong><span>Olive</span></strong></span></td>
</tr>
</tbody>
</table>
</div>
<table cellspacing="-1" cellpadding="-1" align="center">
<tbody>
<tr >
<td ><?php echo __('7th - 28th May','lesarrail_text');?></td>
<td >€1500</td>
</tr>
<tr >
<td ><span ><?php echo __('28th May - 2nd July','lesarrail_text');?></span></td>
<td ><span >€1900</span></td>
</tr>
<tr>
<td ><?php echo __('2nd July - 3rd September','lesarrail_text');?></td>
<td >€2850</td>
</tr>
<tr>
<td ><span ><?php echo __('3rd September - 2nd October','lesarrail_text');?></span></td>
<td ><span >€1900</span></td>
</tr>
</tbody>
</table>
<div>&nbsp;
<table border="1"  align="center">
<tbody>
<tr>
<td class="table-title"><span ><strong><span>Figue</span></strong></span></td>
</tr>
</tbody>
</table>
</div>
<table class="rates" align="center">
<tbody>
<td ><span ><?php echo __('7th - 28th May','lesarrail_text');?></span></td>
<td >€1700</td>
</tr>
<tr>
<td ><span ><?php echo __('28th May - 2 July','lesarrail_text');?></span></td>
<td ><span >€2150</span></td>
</tr>
<tr>
<td ><span ><?php echo __('2nd July - 3rd September','lesarrail_text');?></span></td>
<td ><span >€3000</span></td>
</tr>
<tr>
<td ><span ><?php echo __('3rd September - 2nd October','lesarrail_text');?></span></td>
<td >€2150</td>
</tr>
</tbody>
</table>
<div>&nbsp;</div>
<div>
<table border="1" align="center">
<tbody>
<tr>
<td class="table-title"><span ><strong>Citron</strong></span></td>
</tr>
</tbody>
</table>
</div>
<table class="rates" align="center">
<tbody>

<tr>
<td ><span ><?php echo __('7th - 28th May','lesarrail_text');?></span></td>
<td >€1800</td>
</tr>
<tr>
<td ><span ><?php echo __('28th May - 2nd July','lesarrail_text');?></span></td>
<td >€2250</td>
</tr>
<tr>
<td ><span ><?php echo __('2nd July - 3rd September','lesarrail_text');?></span></td>
<td ><span >€3150</span></td>
</tr>
<tr>
<td ><span ><?php echo __('3rd September - 2nd October','lesarrail_text');?></span></td>
<td ><span >€2250</span></td>
</tr>
</tbody>
</table>
<div>&nbsp;</div>
<div>
<table border="1"  align="center">
<tbody>
<tr>
<td class="table-title"><span ><strong>Cypres </strong></span></td>
</tr>
</tbody>
</table>
</div>
<table align="center">
<tbody>

<tr>
<td ><?php echo __('7th - 28th May','lesarrail_text');?></td>
<td >€2200</td>
</tr>
<tr>
<td ><?php echo __('28th May - 2nd July','lesarrail_text');?></td>
<td >€2950</td>
</tr>
<tr>
<td ><?php echo __('2nd July - 3rd September','lesarrail_text');?></td>
<td >€3700</td>
</tr>
<tr>
<td ><?php echo __('3rd September - 2nd October','lesarrail_text');?></td>
<td >€2950</td>
</tr>
</tbody>
</table>
<br>
<table border="0" lign="center">
<tbody>
<tr>
<td>Rates are per house per week&nbsp;<br style="color: #000000;">Linen, towels (including pool towels) &amp; end of stay cleaning is included.&nbsp;<br style="color: #000000;">Check-in Saturday after 4pm and check-out Saturday by 10am.&nbsp;<br style="color: #000000;">Please note: Bookings during the winter period (including alternative arrival and departure days and long weekends) may be arranged by prior arrangement, please enquire.</td>
</tr>
</tbody>
</table>
&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>