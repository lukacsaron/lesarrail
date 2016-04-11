<?php
// Add Shortcode
function enjoyinstagram_mb_shortcode($atts) {
	$shortcode_content = '';
STATIC $i = 1;
	
	
	if(get_option('enjoyinstagram_client_id') || get_option('enjoyinstagram_client_id') != '') {
	extract( shortcode_atts( array(
		'n' => '4',
	), $atts ) );
?>

<?php

if(get_option('enjoyinstagram_user_or_hashtag')=='hashtag'){
	$result = get_hash(urlencode(get_option('enjoyinstagram_hashtag')),20);
	$result = $result['data'];
}else{
	$result = get_user(urlencode(get_option('enjoyinstagram_user_username')),20);
	$result = $result['data'];
}
$pre_shortcode_content = "<div id=\"owl-".$i."\" class=\"owl-example\" style=\"display:none;\">";


		if (isHttps()) {
			foreach ($result as $entry) {
				$entry['images']['thumbnail']['url'] = str_replace('http://', 'https://', $entry['images']['thumbnail']['url']);
				$entry['images']['small_resolution']['url'] = str_replace('http://', 'https://', $entry['images']['small_resolution']['url']);
			}
		}




foreach ($result as $entry) {
	if(!empty($entry['caption'])) {
		$caption = $entry['caption']['text'];
	}else{
		$caption = '';
	}
	if(get_option('enjoyinstagram_carousel_items_number')!='1'){
    $shortcode_content .=  "<div class=\"box\"><a title=\"{$caption}\" rel=\"gallery_swypebox\" class=\"swipebox\" href=\"{$entry['images']['small_resolution']['url']}\"><img  src=\"{$entry['images']['small_resolution']['url']}\"></a></div>";
	}else{
	    $shortcode_content .=  "<div class=\"box\"><a title=\"{$caption}\" rel=\"gallery_swypebox\" class=\"swipebox\" href=\"{$entry['images']['standard_resolution']['url']}\"><img style=\"width:100%;\" src=\"{$entry['images']['small_resolution']['url']}\"></a></div>";
	}
  }
  
$post_shortcode_content = "</div>";



}
$i++;

$shortcode_content = $pre_shortcode_content.$shortcode_content.$post_shortcode_content;

return $shortcode_content;

}
add_shortcode( 'enjoyinstagram_mb', 'enjoyinstagram_mb_shortcode' );




?>