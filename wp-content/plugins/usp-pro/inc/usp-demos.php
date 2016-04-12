<?php // USP Pro - Form Demos

if (!defined('ABSPATH')) die();

global $usp_advanced;
if (!$usp_advanced['submit_button']) $usp_submit = "\n" . '[usp_submit class="" value=""]' . "\n";
else $usp_submit = '';

$usp_form = '<p>This is a demo of a USP form that allows visitors to submit content. This is the same basic form provided by the "free" version of USP.</p>' . "\n\n" . 
'[usp_name class="" placeholder="" label="" required="" max=""]
[usp_email class="" placeholder="" label="" required="" max=""]
[usp_url class="" placeholder="" label="" required="" max=""]
[usp_title class="" placeholder="" label="" required="" max=""]
[usp_captcha class="" placeholder="" label="" max=""]
[usp_tags class="" placeholder="" label="" required="false" max=""]
[usp_category class="" label="" required=""]
[usp_content class="" placeholder="" label="" required="" max="" cols="" rows="" richtext=""]
[usp_files class="" placeholder="" label="" required="false" max="" link="" multiple="" method="" key="" types=""]' . $usp_submit;

$contact_form = '<p>This is a demo of a USP Form that enables visitors to contact you via email. See "Contact Form" (in General settings tab) for more options.</p>' . "\n\n" . 
'[usp_name class="" placeholder="" label="" required="" max=""]
[usp_email class="" placeholder="" label="" required="" max=""]
[usp_url class="" placeholder="" label="" required="" max=""]
[usp_subject class="" placeholder="" label="" required="" max=""]
[usp_content class="" placeholder="" label="" required="" max="" cols="" rows="" richtext=""]' . $usp_submit . "\n" . 
'<input class="form-control col-md-6 col-xs-12"  name="usp-send-mail" value="1" type="hidden" />';

$register_form = '<p>This is a demo of a USP Form that enables visitors to register without submitting content. Note that the option "Registration Only" must be enabled (see General settings tab).</p>' . "\n\n" . 
'[usp_name class="" placeholder="" label="" required="" max=""]
[usp_url class="" placeholder="" label="" required="" max=""]
[usp_captcha class="" placeholder="" label="" max=""]
[usp_email class="" placeholder="" label="" required="" max=""]
[usp_custom_field form="register" id="1"]
[usp_custom_field form="register" id="2"]
[usp_custom_field form="register" id="3"]
[usp_custom_field form="register" id="4"]
[usp_custom_field form="register" id="5"]
[usp_custom_field form="register" id="6"]'. $usp_submit . "\n" . 
'<input class="form-control col-md-6 col-xs-12"  name="usp-is-register" value="1" type="hidden" />';

$image_form = '<p>This basic form demo shows how to setup image previews with file uploads.</p>' . "\n\n" .
'[usp_title class="" placeholder="" label="" required="" max=""]
[usp_content class="" placeholder="" label="" required="" max="" cols="" rows="" richtext=""]
[usp_files class="" placeholder="" label="" required="false" max="" link="" multiple="yes" method="select" key="" types=""]' . $usp_submit;
