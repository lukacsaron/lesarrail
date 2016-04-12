<?php // USP Pro - Shortcodes

if (!defined('ABSPATH')) die();

if (!isset($_SESSION)) session_start();

/*
	Shortcode: Fieldset
		Displays opening/closing fieldset brackets
		Syntax: [usp_fieldset class="aaa,bbb,ccc"][...][#usp_fieldset]
		Attributes:
			class = classes comma-sep list (displayed as class="aaa bbb ccc") 
*/
if (!function_exists('usp_fieldset_open')) : 
function usp_fieldset_open($args) {
	$class = 'usp-fieldset,' . $args['class'];
	$classes = usp_classes($class);
	return '<fieldset class="'. $classes .'">'. "\n";
}
add_shortcode('usp_fieldset', 'usp_fieldset_open');
function usp_fieldset_close() { return '</fieldset>'. "\n"; }
add_shortcode('#usp_fieldset', 'usp_fieldset_close');
endif;

/*
	Shortcode: Name
	Displays name input field
	Syntax: [usp_name class="aaa,bbb,ccc" placeholder="Your Name" label="Your Name" required="yes" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_name')) : 
function usp_input_name($args) {
	global $current_user;
	
	if ($current_user->ID) $value = $current_user->user_login;
	elseif (isset($_SESSION['usp_form_session']['usp-name']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-name'];
	else $value = '';
	
	if (isset($args['class'])) $class = 'usp-input,usp-input-name,' . $args['class'];
	else $class = 'usp-input,usp-input-name';
	$classes = usp_classes($class, '1');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_1';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (empty($label)) $content = '';
	else $content = '<label for="usp-name" class="usp-label usp-label-name">'. $label .'</label>'. "\n";
	
	$content .= '<input class="form-control col-md-6 col-xs-12" name="usp-name" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-name-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_name', 'usp_input_name');
endif;

/*
	Shortcode: URL
	Displays URL input field
	Syntax: [usp_url class="aaa,bbb,ccc" placeholder="Your URL" label="Your URL" required="yes" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_url')) : 
function usp_input_url($args) {
	if (isset($_SESSION['usp_form_session']['usp-url']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-url'];
	else $value = '';
	
	if (isset($args['class'])) $class = 'usp-input,usp-input-url,' . $args['class'];
	else $class = 'usp-input,usp-input-url';
	$classes = usp_classes($class, '2');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_2';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (empty($label)) $content = '';
	else $content  = '<label for="usp-url" class="usp-label usp-label-url">'. $label .'</label>'. "\n";
	$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-url" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-url-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_url', 'usp_input_url');
endif;

/*
	Shortcode: Title
	Displays title input field
	Syntax: [usp_title class="aaa,bbb,ccc" placeholder="Post Title" label="Post Title" required="yes" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_title')) : 
function usp_input_title($args) {
	if (isset($_SESSION['usp_form_session']['usp-title']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-title'];
	else $value = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-title,' . $args['class'];
	else $class = 'usp-input,usp-input-title';
	$classes = usp_classes($class, '3');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_3';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (empty($label)) $content = '';
	else $content  = '<label for="usp-title" class="usp-label usp-label-title">'. $label .'</label>'. "\n";
	$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-title" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-title-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_title', 'usp_input_title');
endif;

/*
	Shortcode: Tags
	Displays tags input field
	Syntax: [usp_tags class="aaa,bbb,ccc" placeholder="Post Tags" label="Post Tags" required="yes" max="99" tags="" size="3" multiple="no"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
		tags        = specifies any default tags that should always be include with the form
		size        = specifies value for the size attribute of the select tag when using the select menu
		multiple    = specifies whether users should be allowed to select multiple tags
*/
if (!function_exists('usp_input_tags')) : 
function usp_input_tags($args) {
	global $usp_general;
	if (isset($_SESSION['usp_form_session']['usp-tags']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-tags'];
	else $value = '';

	$multiple = '';
	$brackets = '';
	$default  = '';
	if (isset($args['multiple']) && !empty($args['multiple'])) {
		if ($args['multiple'] == 'yes' || $args['multiple'] == 'true' || $args['multiple'] == 'on') {
			$default  = '<option value="" selected>'. __('Please select..', 'usp') .'</option>'. "\n";
			$multiple = ' multiple="multiple"';
			$brackets = '[]';
		}
	} else {
		if ($usp_general['tags_multiple']) {
			$multiple = ' multiple="multiple"';
			$brackets = '[]';
		} else {
			$default  = '<option value="" selected>'. __('Please select..', 'usp') .'</option>'. "\n";
		}
	}
	$size = '';
	if (isset($args['size']) && !empty($args['size']) && $multiple == ' multiple="multiple"') $size = ' size="'. $args['size'] .'"';

	$tag_array = array();
	if (isset($usp_general['tags']) && !empty($usp_general['tags'])) $tag_array = $usp_general['tags'];
	if (empty($tag_array)) $tag_array = get_popular_tags(5);

	if (isset($args['class'])) $class = 'usp-input,usp-input-tags,' . $args['class'];
	else $class = 'usp-input,usp-input-tags';
	$classes = usp_classes($class, '4');

	if (isset($args['tags'])) $tags = usp_tags($args['tags']);
	else $tags = '';

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_4';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (isset($usp_general['tags_menu'])) $display_tags = $usp_general['tags_menu'];
	else $display_tags = 'dropdown';

	if (isset($usp_general['hidden_tags']) && !empty($usp_general['hidden_tags'])) {
		$content = '';
		if (!empty($tags)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-tags-default" value="'. $tags .'" type="hidden" />'. "\n";
		return $content;
	} else {
		if ($display_tags == 'checkbox') {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-tags[]" class="usp-label usp-label-tags">'. $label .'</label>'. "\n";
			foreach ((array) $tag_array as $tag) {
				$the_tag = get_term_by('id', $tag, 'post_tag');
				if (!$the_tag) continue;
				$checked = '';
				if (is_array($value)) {
					if (in_array($tag, $value)) $checked = ' checked';
				}
				$content .= '<span class="usp-checkbox usp-tag"><input class="form-control col-md-6 col-xs-12"  type="checkbox" name="usp-tags[]" value="'. $tag .'" data-required="'. $required .'" class="'. $classes .'"'. $checked .' /> '. htmlentities($the_tag->name, ENT_QUOTES, 'UTF-8') .'</span>' . "\n";
			}
		} elseif ($display_tags == 'input') {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-tags" class="usp-label usp-label-tags">'. $label .'</label>'. "\n";
			$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-tags" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
		} else {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-tags'. $brackets .'" class="usp-label usp-label-tags">'. $label .'</label>'. "\n";
			$content .= '<select name="usp-tags'. $brackets .'" '. $parsley .'data-required="'. $required .'"'. $size . $multiple .' class="'. $classes .' usp-select">'. "\n";
			$content .= $default;
			foreach ((array) $tag_array as $tag) {
				$the_tag = get_term_by('id', $tag, 'post_tag');
				if (!$the_tag) continue;
				$selected = '';
				if (is_array($value)) {
					foreach ($value as $val) {
						if (intval($tag) === intval($val)) $selected = ' selected';
					}
				} else {
					if (intval($tag) === intval($value)) $selected = ' selected';
				}
				$content .= '<option value="'. $the_tag->term_id .'"'. $selected .'>'. htmlentities($the_tag->name, ENT_QUOTES, 'UTF-8') .'</option>'. "\n";
			}
			$content .= '</select>'. "\n";
		}
		if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-tags-required" value="1" type="hidden" />'. "\n";
		if (!empty($tags)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-tags-default" value="'. $tags .'" type="hidden" />'. "\n";
		return $fieldset_before . $content . $fieldset_after;
	}
}
add_shortcode('usp_tags', 'usp_input_tags');
endif;

/*
	Shortcode: Captcha
	Displays captcha input field
	Syntax: [usp_captcha class="aaa,bbb,ccc" placeholder="Antispam Question" label="Antispam Question" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_captcha')) : 
function usp_input_captcha($args) {
	global $usp_general;
	$required = 'true'; // always required when included in form
	if (isset($_SESSION['usp_form_session']['usp-captcha']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-captcha'];
	else $value = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-captcha,' . $args['class'];
	else $class = 'usp-input,usp-input-captcha';
	$classes = usp_classes($class, '5');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'captcha_question'; // overrides usp_error_5
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$max = usp_max_att($args, '99');
	
	$recaptcha_public = $usp_general['recaptcha_public'];
	$recaptcha_private = $usp_general['recaptcha_private'];
	if ((isset($recaptcha_public) && !empty($recaptcha_public)) && (isset($recaptcha_private) && !empty($recaptcha_private))) {
		$captcha = '<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k='. $recaptcha_public .'"></script>
		<noscript>
			<iframe src="http://www.google.com/recaptcha/api/noscript?k='. $recaptcha_public .'" height="300" width="500" frameborder="0"></iframe><br>
			<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
			<input class="form-control col-md-6 col-xs-12"  type="hidden" name="recaptcha_response_field" value="manual_challenge">
		</noscript>' . "\n";
	} else {
		$captcha = '<input class="form-control col-md-6 col-xs-12"  name="usp-captcha" type="text" value="'. $value .'" data-required="true" required="required" maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	}
	if (empty($label)) $content = '';
	else $content  = '<label for="usp-captcha" class="usp-label usp-label-captcha">'. $label .'</label>'. "\n";
	if ($required == 'true') $required = '<input class="form-control col-md-6 col-xs-12"  name="usp-captcha-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $captcha . $required . $fieldset_after;
}
add_shortcode('usp_captcha', 'usp_input_captcha');
endif;

/*
	Shortcode: Category
	Displays category input field
	Syntax: [usp_category class="aaa,bbb,ccc" label="Post Category" required="yes" cats="" size="3" multiple="no"]
	Attributes:
		class       = comma-sep list of classes
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		cats        = specifies any default cats that should always be include with the form (comma separated)
		size        = specifies value for the size attribute of the select tag when using the select menu
		multiple    = specifies whether users should be allowed to select multiple categories
		exclude     = specifies any cats that should be excluded from the form (comma separated)
*/
if (!function_exists('usp_input_category')) : 
function usp_input_category($args) {
	global $usp_general;
	
	$value = ''; // get_option('default_category');
	if (isset($_SESSION['usp_form_session']['usp-category']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-category'];

	$multiple = ''; $brackets = '';
	if (isset($args['multiple']) && !empty($args['multiple'])) {
		if ($args['multiple'] == 'yes' || $args['multiple'] == 'true' || $args['multiple'] == 'on') {
			$multiple = ' multiple="multiple"';
			$brackets = '[]';
		}
	} else {
		if ($usp_general['cats_multiple']) {
			$multiple = ' multiple="multiple"';
			$brackets = '[]';
		}
	}

	if (isset($args['size']) && !empty($args['size']) && $multiple == ' multiple="multiple"') $size = ' size="'. $args['size'] .'"';
	else $size = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-category,' . $args['class'];
	else $class = 'usp-input,usp-input-category';
	$classes = usp_classes($class, '6');
	
	if (isset($args['cats'])) $cats = usp_cats($args['cats']);
	else $cats = '';
	$categories = usp_get_cats();
	
	if (isset($args['exclude']) && !empty($args['exclude'])) {
		$exclude = trim($args['exclude']);
		$excluded = explode(",", $exclude);
		foreach($excluded as $exclude) {
			$excluded_cats[] = trim($exclude);
		}
		foreach($categories as $key => $value) {
			foreach($value as $k => $v) {
				if (in_array($v, $excluded_cats)) unset($categories[$key]);
			}
		}
	}
	
	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_6';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';

	if (isset($usp_general['cats_menu']) && !empty($usp_general['cats_menu'])) $display_cats = $usp_general['cats_menu'];
	else $display_cats = 'dropdown';

	if (isset($usp_general['hidden_cats']) && !empty($usp_general['hidden_cats'])) {
		$content = '';
		if (!empty($cats)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-cats-default" value="'. $cats .'" type="hidden" />'. "\n";
		return $content;
	} else {
		if ($display_cats == 'checkbox') {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-category[]" class="usp-label usp-label-category">'. $label .'</label>'. "\n";

			if (isset($usp_general['cats_nested']) && !empty($usp_general['cats_nested'])) {
				$content .= '<style type="text/css">';
				$content .= '.usp-cat { display: block; }';
				$content .= '.usp-cat-0 { margin-left: 0; } .usp-cat-1 { margin-left: 20px; } .usp-cat-2 { margin-left: 40px; } .usp-cat-3 { margin-left: 60px; } .usp-cat-4 { margin-left: 80px; }';
				$content .= '</style>'. "\n";
			}
			foreach ($categories as $cat) {
				$category = get_category($cat['id']);
				if (!$category) continue;
				$checked = '';
				if (is_array($value)) {
					if (in_array($cat['id'], $value)) $checked = ' checked';
				}
				$level = 'na';
				$cat_level = $cat['level'];
				if ($cat_level == 'parent') $level = '0';
				elseif ($cat_level == 'child') $level = '1';
				elseif ($cat_level == 'grandchild') $level = '2';
				elseif ($cat_level == 'great_grandchild') $level = '3';
				elseif ($cat_level == 'great_great_grandchild') $level = '4';
				$content .= '<span class="usp-checkbox usp-cat usp-cat-'. $level .'"><input class="form-control col-md-6 col-xs-12"  type="checkbox" name="usp-category[]" value="'. $cat['id'] .'" data-required="'. $required .'" class="'. $classes .'"'. $checked .' /> '. get_cat_name($cat['id']) .'</span>' . "\n";
			}
		} else {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-category'. $brackets .'" class="usp-label usp-label-category">'. $label .'</label>'. "\n";

			$content .= '<select name="usp-category'. $brackets .'" '. $parsley .'data-required="'. $required .'"'. $size . $multiple .' class="'. $classes .' usp-select">'. "\n";
			$content .= '<option value="">'. __('Please select..', 'usp') .'</option>'. "\n";
			
			foreach ($categories as $cat) {
				$category = get_category($cat['id']);
				if (!$category) continue;
				$selected = '';
				if (is_array($value)) {
					foreach ($value as $val) {
						if (intval($cat['id']) === intval($val)) $selected = ' selected';
					}
				} else {
					if (intval($cat['id']) === intval($value)) $selected = ' selected';
				}
				$indent = '';
				$cat_level = $cat['level'];
				if (isset($usp_general['cats_nested']) && !empty($usp_general['cats_nested'])) {
					if ($cat_level == 'parent') $indent = '';
					elseif ($cat_level == 'child') $indent = '&emsp;';
					elseif ($cat_level == 'grandchild') $indent = '&emsp;&emsp;';
					elseif ($cat_level == 'great_grandchild') $indent = '&emsp;&emsp;&emsp;';
					elseif ($cat_level == 'great_great_grandchild') $indent = '&emsp;&emsp;&emsp;&emsp;';
				}
				$content .= '<option value="'. $cat['id'] .'"'. $selected .'>'. $indent . get_cat_name($cat['id']) .'</option>'. "\n";
			}
			$content .= '</select>'. "\n";
		}
		if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-category-required" value="1" type="hidden" />'. "\n";
		if (!empty($cats)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-cats-default" value="'. $cats .'" type="hidden" />'. "\n";
		return $fieldset_before . $content . $fieldset_after;
	}
}
add_shortcode('usp_category', 'usp_input_category');
endif;

/*
	Shortcode: Taxonomy
	Displays taxonomy input field
	Syntax: [usp_taxonomy class="aaa,bbb,ccc" label="Post Taxonomy" required="yes" tax="" size="3" multiple="no" terms="123,456,789" type="checkbox"]
	Attributes:
		class       = comma-sep list of classes
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		tax         = specifies the taxonomy
		size        = specifies value for the size attribute of the select tag when using the select menu
		multiple    = specifies whether users should be allowed to select multiple categories
		terms       = specifies which tax terms to include (comma-separated list of term IDs)
		type        = specifies the type of field to display (checkbox or dropdown)
*/
if (!function_exists('usp_input_taxonomy')) : 
function usp_input_taxonomy($args) {

	$taxonomy = 'undefined';
	if (isset($args['tax'])) $taxonomy = $args['tax'];

	$value = '';
	if (isset($_SESSION['usp_form_session']) && isset($_COOKIE['remember'])) {
		foreach($_SESSION['usp_form_session'] as $session_key => $session_value) {
			if (preg_match("/^usp-taxonomy-$taxonomy$/i", $session_key, $match)) {
				$value = $session_value;
			}
		}
	}

	$multiple = ''; $brackets = '';
	if (isset($args['multiple']) && !empty($args['multiple'])) {
		if ($args['multiple'] == 'yes' || $args['multiple'] == 'true' || $args['multiple'] == 'on') {
			$multiple = ' multiple="multiple"';
			$brackets = '[]';
		}
	}

	$size = '';
	if (isset($args['size']) && !empty($args['size']) && $multiple == ' multiple="multiple"') $size = ' size="'. $args['size'] .'"';

	$class = 'usp-input,usp-input-taxonomy';
	if (isset($args['class'])) $class = 'usp-input,usp-input-taxonomy,' . $args['class'];
	$classes = usp_classes($class, '14');
	
	if (isset($args['terms'])) {
		$tax_terms = array();
		$terms = trim($args['terms']);
		$terms = explode(",", $terms);
		foreach($terms as $term) {
			$term = trim($term);
			$get_term = get_term($term, $taxonomy, ARRAY_A);
			if(!is_wp_error($get_term)) {
				$term_exists = term_exists($get_term['term_id'], $taxonomy);
				if ($term_exists !== 0 && $term_exists !== null) $tax_terms[] = $get_term; 
			}
		}
	}
	
	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = $taxonomy;
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';

	$type = 'dropdown';
	if (isset($args['type'])) $type = $args['type'];

	if (!empty($tax_terms)) {
		if ($type == 'checkbox') {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-taxonomy-'. $taxonomy .'[]" class="usp-label usp-label-taxonomy">'. $label .'</label>'. "\n";
			
			foreach ($tax_terms as $tax) {
				$checked = '';
				if (is_array($value)) {
					if (in_array($tax['term_id'], $value)) $checked = ' checked';
				} else {
					if (intval($tax['term_id']) === intval($value)) $checked = ' checked';
				}
				$content .= '<span class="usp-checkbox usp-tax"><input class="form-control col-md-6 col-xs-12"  type="checkbox" name="usp-taxonomy-'. $taxonomy .'[]" value="'. $tax['term_id'] .'" data-required="'. $required .'" class="'. $classes .'"'. $checked .' /> '. $tax['name'] .'</span>' . "\n";
			}
		} else {
			if (empty($label)) $content = '';
			else $content  = '<label for="usp-taxonomy-'. $taxonomy . $brackets .'" class="usp-label usp-label-taxonomy">'. $label .'</label>'. "\n";
	
			$content .= '<select name="usp-taxonomy-'. $taxonomy . $brackets .'" '. $parsley .'data-required="'. $required .'"'. $size . $multiple .' class="'. $classes .' usp-select">'. "\n";
			$content .= '<option value="">'. __('Please select..', 'usp') .'</option>'. "\n";
			
			foreach ($tax_terms as $tax) {
				$selected = '';
				if (is_array($value)) {
					if (in_array($tax['term_id'], $value)) $selected = ' selected';
				} else {
					if (intval($tax['term_id']) === intval($value)) $selected = ' selected';
				}
				$content .= '<option value="'. $tax['term_id'] .'"'. $selected .'>'. $tax['name'] .'</option>'. "\n";
			}
			$content .= '</select>'. "\n";
		}
		if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-taxonomy-'. $taxonomy .'-required" value="1" type="hidden" />'. "\n";
	} else {
		$content = 'No terms found for '. $taxonomy;
	}
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_taxonomy', 'usp_input_taxonomy');
endif;

/*
	Shortcode: Content
	Displays content textarea
	Syntax: [usp_content class="aaa,bbb,ccc" placeholder="Post Content" label="Post Content" required="yes" max="999" cols="3" rows="30" richtext="off"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
		cols        = sets the number of columns for the textarea
		rows        = sets the number of rows for the textarea
		richtext    = specifies whether or not to use WP rich-text editor
*/
if (!function_exists('usp_input_content')) : 
function usp_input_content($args) {
	if (isset($_SESSION['usp_form_session']['usp-content']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-content'];
	else $value = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-content,' . $args['class'];
	else $class = 'usp-input,usp-input-content';
	$classes = usp_classes($class, '7');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_7';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '999');
	
	if (isset($args['cols']) && !empty($args['cols'])) $cols = trim(intval($args['cols']));
	else $cols = '30';
	
	if (isset($args['rows']) && !empty($args['rows'])) $rows = trim(intval($args['rows']));
	else $rows = '5';
	
	if (isset($args['richtext']) && !empty($args['richtext']) && ($args['richtext'] == 'on' || $args['richtext'] == 'yes' || $args['richtext'] == 'true')) $richtext = 'on';
	else $richtext = 'off';

	if (empty($label)) $content = '';
	else $content = '<label for="usp-content" class="usp-label usp-label-content">'. $label .'</label>'. "\n";
	if ($richtext == 'on') {
		$settings = array(
		    'wpautop'       => true,          // enable rich text editor
		    'media_buttons' => true,          // enable add media button
		    'textarea_name' => 'usp-content', // name
		    'textarea_rows' => $rows,         // number of textarea rows
		    'tabindex'      => '',            // tabindex
		    'editor_css'    => '',            // extra CSS
		    'editor_class'  => $classes,      // class
		    'teeny'         => false,         // output minimal editor config
		    'dfw'           => false,         // replace fullscreen with DFW
		    'tinymce'       => true,          // enable TinyMCE
		    'quicktags'     => true,          // enable quicktags
		);
		ob_start(); // until get_wp_editor() is available..
		wp_editor($value, 'uspcontent', $settings);
		$get_wp_editor = ob_get_clean();
		$content .= $get_wp_editor;
	} else {
		$content .= '<textarea name="usp-content" rows="'. $rows .'" cols="'. $cols .'" maxlength="'. $max .'" data-required="'. $required .'" '. $parsley .'placeholder="'. $placeholder .'" class="'. $classes .'">'. $value .'</textarea>'. "\n";
	}
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-content-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_content', 'usp_input_content');
endif;

/*
	Shortcode: Files
	Displays file-upload input field
	Syntax: [usp_files class="aaa,bbb,ccc" placeholder="Upload File" label="Upload File" required="yes" max="99" link="Add another file" multiple="yes" key="single"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
		link        = specifies text for the add-another input link (when displayed)
		multiple    = specifies whether to display single or multiple file input fields
		key         = key to use for custom field for this image
		types       = allowed file types (overrides global defaults)
*/
if (!function_exists('usp_input_files')) : 
function usp_input_files($args) {
	global $usp_uploads;

	if (isset($args['class'])) $class = 'usp-input,usp-input-files,usp-clone,' . $args['class'];
	else $class = 'usp-input,usp-input-files,usp-clone';
	$classes = usp_classes($class, '8');
	
	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	if (isset($args['types'])) {
		$allow_types = trim($args['types']);
		$types = explode(",", $allow_types);
		$file_types = '';
		foreach ($types as $type) $file_types .= trim($type) . ',';
		$file_types = rtrim(trim($file_types), ',');
	} else {
		$file_types = '';
	}

	$field = 'usp_error_8';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	$max = usp_max_att($args, '255');
	
	$key = 'single';
	if (isset($args['key']) && is_numeric($args['key'])) $key = $args['key'];
	
	$multiple = true;
	if (isset($args['multiple'])) {
		if ($args['multiple'] == 'no' || $args['multiple'] == 'false' || $args['multiple'] == 'off') $multiple = false;
	}
	$method = '';
	if (isset($args['method'])) {
		if ($args['method'] == 'yes' || $args['method'] == 'true' || $args['method'] == 'on' || $args['method'] == 'select') $method = ' multiple="multiple"';
	}
	if (isset($args['link']) && !empty($args['link'])) $link = trim($args['link']);
	else $link = 'Add another file';

	if (isset($usp_uploads['max_files']) && $usp_uploads['max_files'] !== 0) {
		if ($usp_uploads['min_files'] < 1) $number_files = 1;
		else $number_files = $usp_uploads['min_files'];
		//
		$content = '';
		if ($multiple) {
			$content .= '<div class="usp-files">'. "\n";
			if (empty($label)) $content .= '';
			else               $content .= '<label for="usp-files[]" class="usp-label usp-label-files">'. $label .'</label>'. "\n";
			$content .= '<div class="usp-input-wrap">'. "\n";
			if (empty($method)) {
				for ( $i = 1; $i <= $number_files; $i++ ) {
					$content .= '<label class="tallozas"><div class="upload-img"></div>Tallózás<input class="form-control col-md-6 col-xs-12"  name="usp-files[]" type="file" maxlength="'. $max .'" data-required="'. $required .'" placeholder="'. $placeholder .'" class="'. $classes .'" /></label>'. "\n";
				}
				$content .= '<div class="usp-add-another"><a href="#">'. $link .'</a></div>'. "\n";
			} else {
				$content .= '<label class="tallozas"><div class="upload-img"></div>Tallózás<input class="form-control col-md-6 col-xs-12"  name="usp-files[]" type="file" maxlength="'. $max .'" data-required="'. $required .'" placeholder="'. $placeholder .'" class="'. $classes .'"'. $method .' id="usp-multiple-files" /></label>'. "\n";
				$content .= '<div class="usp-preview"></div>'. "\n";
			}
			$content .= '</div>'. "\n";
			$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-limit" id="usp-file-limit" value="'. $usp_uploads['max_files'] .'" type="hidden" />'. "\n";
			$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-count" id="usp-file-count" value="1" type="hidden" />'. "\n";
			if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-files-required" value="1" type="hidden" />'. "\n";
			if (!empty($file_types)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-types" value="'. $file_types .'" type="hidden" />'. "\n";
			$content .= '</div>'. "\n";
		} else {
			$content .= '<div class="usp-file">'. "\n";
			if (empty($label)) $content .= '';
			else               $content .= '<label for="usp-file-'. $key .'" class="usp-label usp-label-files usp-label-file usp-label-file-'. $key .'">'. $label .'</label>'. "\n";
			$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-'. $key .'" type="file" maxlength="'. $max .'" data-required="'. $required .'" placeholder="'. $placeholder .'" class="'. $classes .' usp-input-file usp-input-file-'. $key .'" />'. "\n";
			$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-key" value="'. $key .'" type="hidden" />'. "\n";
			if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-required-'. $key .'" value="1" type="hidden" />'. "\n";
			if (!empty($file_types)) $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-file-types" value="'. $file_types .'" type="hidden" />'. "\n";
			$content .= '</div>'. "\n";
		}
	} else {
		return __('File uploads not currently allowed. Please check your settings or contact the site administrator.', 'usp');
	}
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_files', 'usp_input_files');
endif;

/*
	Shortcode: Remember
	Displays "remember me" button
	Syntax: [usp_remember class="aaa,bbb,ccc" label="Remember me"]
	Attributes:
		class = comma-sep list of classes
		label = text for input label
		(set checked/unchecked in USP Settings)
*/
if (!function_exists('usp_remember')) : 
function usp_remember($args) {
	global $usp_general;
	if ($usp_general['sessions_default']) $checked = ' checked';
	else $checked = '';
	
	if (isset($_COOKIE['remember'])) $checked = ' checked';
	elseif (isset($_COOKIE['forget'])) $checked = '';

	if (isset($args['class'])) $class = 'usp-remember,usp-input,usp-input-remember' . $args['class'];
	else $class = 'usp-remember,usp-input,usp-input-remember';
	$classes = usp_classes($class);

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	if (isset($args['label']) && !empty($args['label'])) $label_text = trim($args['label']);
	else $label_text = __('Remember me', 'usp');
	$label = '<label for="usp-remember" class="usp-label usp-label-remember">'. $label_text .'</label>'. "\n";
	
	$content = '';
	$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-remember" id="usp-remember" type="checkbox" data-required="true" class="'. $classes .'" value="1"'. $checked .' /> '. "\n". $label;
	
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_remember', 'usp_remember');
endif;

/*
	Shortcode: Submit
	Displays submit button
	Syntax: [usp_submit class="aaa,bbb,ccc" value="Submit Post"]
	Attributes:
		class = comma-sep list of classes
		value = text to display on submit button
*/
if (!function_exists('usp_submit_button')) : 
function usp_submit_button($args) {
	if (isset($args['class'])) $class = 'usp-submit,' . $args['class'];
	else $class = 'usp-submit';
	$classes = usp_classes($class, 'submit');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	if (isset($args['value']) && !empty($args['value'])) $value = trim($args['value']);
	else $value = __('Submit Post', 'usp');

	return $fieldset_before . '<input class="form-control col-md-6 col-xs-12"  type="submit" class="'. $classes .'" value="'. $value .'" />'. "\n" . $fieldset_after;
}
add_shortcode('usp_submit', 'usp_submit_button');
endif;

/*
	Shortcode: Email
	Displays email input field
	Syntax: [usp_email class="aaa,bbb,ccc" placeholder="Your Email" label="Your Email" required="yes" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_email')) : 
function usp_input_email($args) {
	global $current_user;
	if ($current_user->user_email) $value = $current_user->user_email;
	elseif (isset($_SESSION['usp_form_session']['usp-email']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-email'];
	else $value = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-email,' . $args['class'];
	else $class = 'usp-input,usp-input-email';
	$classes = usp_classes($class, '9');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_9';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (empty($label)) $content = '';
	else $content  = '<label for="usp-email" class="usp-label usp-label-email col-md-6 col-xs-12">'. $label .'</label>'. "\n";
	$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-email" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-email-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_email', 'usp_input_email');
endif;

/*
	Shortcode: Email Subject
	Displays email subject input field
	Syntax: [usp_subject class="aaa,bbb,ccc" placeholder="Email Subject" label="Email Subject" required="yes" max="99"]
	Attributes:
		class       = comma-sep list of classes
		placeholder = text for input placeholder
		label       = text for input label
		required    = specifies if input is required (data-required attribute)
		max         = sets maximum number of allowed characters (maxlength attribute)
*/
if (!function_exists('usp_input_subject')) : 
function usp_input_subject($args) {
	if (isset($_SESSION['usp_form_session']['usp-subject']) && isset($_COOKIE['remember'])) $value = $_SESSION['usp_form_session']['usp-subject'];
	else $value = '';

	if (isset($args['class'])) $class = 'usp-input,usp-input-subject,'. $args['class'];
	else $class = 'usp-input,usp-input-subject';
	$classes = usp_classes($class, '10');

	$fieldset = usp_fieldset();
	$fieldset_before = $fieldset['fieldset_before'];
	$fieldset_after = $fieldset['fieldset_after'];

	$field = 'usp_error_10';
	$placeholder = usp_placeholder($args, $field);
	$label = usp_label($args, $field);
	$required = usp_required($args);
	if ($required == 'true') $parsley = 'required="required" ';
	else $parsley = '';
	$max = usp_max_att($args, '99');

	if (empty($label)) $content = '';
	else $content  = '<label for="usp-subject" class="usp-label usp-label-subject">'. $label .'</label>'. "\n";
	$content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-subject" type="text" value="'. $value .'" data-required="'. $required .'" '. $parsley .'maxlength="'. $max .'" placeholder="'. $placeholder .'" class="'. $classes .'" />'. "\n";
	if ($required == 'true') $content .= '<input class="form-control col-md-6 col-xs-12"  name="usp-subject-required" value="1" type="hidden" />'. "\n";
	return $fieldset_before . $content . $fieldset_after;
}
add_shortcode('usp_subject', 'usp_input_subject');
endif;

/*
	Shortcode: Reset form button
	Returns the markup for a reset-form button
	Syntax: [usp_reset_button class="aaa,bbb,ccc" value="Reset form" url="http://example.com/usp-pro/submit/"]
	Attributes:
		class = comma-sep list of classes
		value = text for input placeholder
		url   = full URL that the form is displayed on (not the form URL, unless you want to redirect there)
*/
if (!function_exists('usp_reset_button')) : 
function usp_reset_button($args) {
	if (isset($args['class'])) $class = 'usp-reset-button,' . $args['class'];
	else $class = 'usp-reset-button';
	$classes = usp_classes($class);

	if (isset($args['value']) && !empty($args['value'])) $value = trim($args['value']);
	else $value = 'Reset form';
	
	if (isset($args['url']) && !empty($args['url'])) $url = trim($args['url']);
	else $url = '#please-check-shortcode';

	$content = '<div class="'. $classes .'"><a href="'. $url .'?usp_reset_form=true">'. $value .'</a></div>'. "\n";
	return $content;
}
add_shortcode('usp_reset_button', 'usp_reset_button');
endif;

/*
	Shortcode: CC Message
	Returns the CC message
	Syntax: [usp_cc class="aaa,bbb,ccc" text=""]
	Attributes:
		class = comma-sep list of classes
		text  = custom cc message (overrides default)
*/
if (!function_exists('usp_cc')) : 
function usp_cc($args) {
	global $usp_admin;
	if (isset($args['class'])) $class = 'usp-contact-cc,' . $args['class'];
	else $class = 'usp-contact-cc';
	$classes = usp_classes($class);

	if (isset($usp_admin['contact_cc_note'])) $default = $usp_admin['contact_cc_note'];
	if (isset($args['text']) && !empty($args['text'])) $text = trim($args['text']);
	else $text = $default;
	
	$content = '<div class="'. $classes .'">'. $text .'</div>'. "\n";
	return $content;
}
add_shortcode('usp_cc', 'usp_cc');
endif;

/*
	Shortcode: Custom Redirect
	Redirects to specified URL on successful form submission
	Syntax: [usp_redirect url="http://example.com/" custom="class='example classes' data-role='custom'"]
	Attributes:
		url    = any complete/full URL
		custom = any custom attribute(s) using single quotes
*/
if (!function_exists('usp_redirect')) : 
function usp_redirect($args) {
	if (isset($args['custom']) && !empty($args['custom'])) $custom = ' '. stripslashes(trim($args['custom']));
	else $custom = '';

	if (isset($args['url']) && !empty($args['url'])) $url = esc_url(trim($args['url']));
	else $url = '';
	
	if (!empty($url)) return '<input class="form-control col-md-6 col-xs-12"  name="usp-redirect" type="hidden" value="'. $url .'"'. $custom .' />'. "\n";
	else return '<!-- please check URL shortcode attribute -->'. "\n";
}
add_shortcode('usp_redirect', 'usp_redirect');
endif;

/*
	Shortcode: Custom Fields
	Displays custom input and textarea fields
	Syntax: [usp_custom_field form="x" id="y"]
	Template tag: usp_custom_field(array('form'=>'y', 'id'=>'x'));
	Attributes:
		id   = id of custom field (1-9)
		form = id of custom post type (usp_form)
	Notes:
		shortcode must be used within USP custom post type
		template tag may be used anywhere in the theme template
*/
if (!class_exists('USP_Custom_Fields')) {
	class USP_Custom_Fields {
		function __construct() { 
			add_shortcode('usp_custom_field', array(&$this, 'usp_custom_field')); 
		}
		function usp_custom_field($args) {
			$fieldset = usp_fieldset();
			$fieldset_before = $fieldset['fieldset_before'];
			$fieldset_after = $fieldset['fieldset_after'];

			if (isset($args['id']) && !empty($args['id'])) $id = $args['id'];
			else return __('error:usp_custom_field:1:', 'usp') . $args['id'];

			if (isset($args['form']) && !empty($args['form'])) $form = usp_get_form_id($args['form']);
			else return __('error:usp_custom_field:2:', 'usp') . $args['form'];

			$custom_fields = get_post_custom($form);
			if (is_null($custom_fields) || empty($custom_fields)) return __('error:usp_custom_field:3:', 'usp') . $custom_fields;
			
			foreach ($custom_fields as $key => $value) {
				$key = trim($key);
				if ('_' == $key{0}) continue;
				if ($key !== '[usp_custom_field form="'.$args['form'].'" id="'.$id.'"]') continue;

				$get_value = '';
				
				if (isset($_COOKIE['remember'])) {
					if (preg_match("/name#([0-9a-z_-]+)/i", $value[0], $matches)) {
						if (isset($_SESSION['usp_form_session']['usp-custom-'.$matches[1]])) {
							$get_value = $_SESSION['usp_form_session']['usp-custom-'.$matches[1]];
						}
					} elseif (isset($_SESSION['usp_form_session']['usp-custom-'. $id])) {
						$get_value = $_SESSION['usp_form_session']['usp-custom-'. $id];
					}
				}
				if (preg_match("/usp_custom_field/i", $key)) {
					$default_atts = array(
						'field'         => 'input', // input or textarea
						'type'          => 'text',  // when field = input: text, checkbox, password, radio (not included: select/option)
						'value'         => $get_value, 
						'data-required' => 'true', 
						'placeholder'   => 'Example Input ' . $id, 
						'class'         => 'example-class-' . $id,
						'label'         => 'Example Label ' . $id,
						'for'           => $id, // label
						'name'          => $id, // = for
						'label_class'   => 'example-class-' . $id,
						'label_custom'  => '',
						'custom_1'      => '', 
						'custom_2'      => '', 
						'custom_3'      => '',
						'custom_4'      => '',
						'custom_5'      => '',
						'rows'          => '3',
						'cols'          => '30',
						'accept'        => 'image/*', // MIME types, eg: audio/*, video/*, image/* (more @ http://iana.org/assignments/media-types)
						'checked'       => '',
						'selected'      => '',
					);
					$atts = explode("|", $value[0]);
					
					foreach ($atts as $att) {
						$a = explode("#", $att); // eg: $a[0] = field, $a[1] = input
						if ($a[0] == 'atts' && $a[1] == 'defaults') continue; // use defaults
						if (isset($a[0])) $user_att_names[]  = $a[0];
						if (isset($a[1])) $user_att_values[] = $a[1];
					}
					if (!empty($user_att_names) && !empty($user_att_values)) $user_atts = array_combine($user_att_names, $user_att_values);
					else $user_atts = $default_atts;

					$field_atts = wp_parse_args($user_atts, $default_atts);
					if (isset($user_att_names)) unset($user_att_names);
					if (isset($user_att_values)) unset($user_att_values);

					$custom_att_names = array();
					$custom_att_values = array();
					foreach ($field_atts as $key => $value) {
						if (preg_match("/custom_/i", $key)) {
							$b = explode(":", $value);
							if (isset($b[0])) $custom_att_names[]  = $b[0];
							if (isset($b[1])) $custom_att_values[] = $b[1];
							if (isset($field_atts[$key])) unset($field_atts[$key]);
						}
					}
					foreach ($custom_att_names as $key => $value) {
						if (is_null($value) || empty($value)) unset($custom_att_names[$key]);
					}
					foreach ($custom_att_values as $key => $value) {
						if (is_null($value) || empty($value)) unset($custom_att_values[$key]);
					}
					if (!empty($custom_att_names) && !empty($custom_att_values)) $custom_atts = array_combine($custom_att_names, $custom_att_values);
					else $custom_atts = array();

					$field_atts = wp_parse_args($custom_atts, $field_atts);
					if (isset($custom_att_names)) unset($custom_att_names);
					if (isset($custom_att_values)) unset($custom_att_values);
					
					if ($field_atts) {
						
						if ($field_atts['data-required'] == 'true') {
							$field_hidden = '<input id="'. $field_atts['name'] .'" class="form-control col-md-6 col-xs-12"  name="usp-custom-'. $field_atts['name'] .'-required" value="1" type="hidden" />';
							$parsley = ' required="required"'; 
						} else {
							$field_hidden = '';
							$parsley = '';
						}
						
						if (isset($field_atts['data-richtext']) && $field_atts['data-richtext'] == 'true') {
							$settings = array(
							    'wpautop'       => true,                              // enable rich text editor
							    'media_buttons' => true,                              // enable add media button
							    'textarea_name' => 'usp-custom-'.$field_atts['name'], // name
							    'textarea_rows' => $field_atts['rows'],               // number of textarea rows
							    'tabindex'      => '',                                // tabindex
							    'editor_css'    => '',                                // extra CSS
							    'editor_class'  => $field_atts['class'],              // class
							    'teeny'         => false,                             // output minimal editor config
							    'dfw'           => false,                             // replace fullscreen with DFW
							    'tinymce'       => true,                              // enable TinyMCE
							    'quicktags'     => true,                              // enable quicktags
							);
							ob_start(); // until get_wp_editor() is available..
							wp_editor($field_atts['value'], 'uspcustom', $settings);
							$get_wp_editor = ob_get_clean();
							if (!empty($get_wp_editor)) return $fieldset_before . $get_wp_editor . $field_hidden . $fieldset_after;
						}
						
						if (!empty($field_atts['checked'])) $checked = ' checked="checked"';
						else $checked = '';
						
						if (!empty($field_atts['selected'])) $selected = ' selected="selected"';
						else $selected = '';
						
						$error = '';
						wp_parse_str(wp_strip_all_tags($_SERVER['QUERY_STRING']), $vars);
						if ($vars) {
							foreach ($vars as $var) {
								if (preg_match("/^usp_error_custom_([0-9a-z_-]+)$/i", $var, $match)) {
									if ($match[1] == $id) $error = 'usp-error-field usp-error-custom ';
									
								} elseif (preg_match("/^usp_error_([a-g]+)$/i", $var, $match)) {
									$user_fields = array('a' => 'nicename', 'b' => 'displayname', 'c' => 'nickname', 'd' => 'firstname', 'e' => 'lastname', 'f' => 'description', 'g' => 'password');
									foreach ($user_fields as $key => $value) {
										if (($field_atts['name'] == $value) && ($match[1] == $key)) $error = 'usp-error-field usp-error-register ';
									}
								}
							}
						}
						
						switch ($field_atts['field']) {
							case 'input':
								if ($field_atts['type'] == 'file' && !empty($field_atts['accept'])) $accept = 'accept="'. $field_atts['accept'] .'" ';
								else $accept = '';
								$field_start  = '<input id="'. $field_atts['name'] .'" class="form-control col-md-6 col-xs-12"  '. $accept .'name="usp-custom-'. $field_atts['name'] .'" ';
								$field_end    = 'class="'. $error . $field_atts['class'] .' usp-input usp-input-custom usp-form-'. $form .'"'. $checked . $selected . $parsley .' />'. "\n" . $field_hidden;
								$label_class  = 'class="'. $field_atts['label_class'] .' usp-label usp-label-input usp-label-custom usp-form-'. $form;
								break;
							case 'textarea':
								$field_start = '<textarea id="'. $field_atts['name'] .'" name="usp-custom-'. $field_atts['name'] .'" ';
								$field_end   = 'class="'. $error . $field_atts['class'] .' usp-input usp-textarea usp-textarea-custom usp-form-'. $form .'" rows="'. $field_atts['rows'] .'" cols="'. $field_atts['cols'] .'"'. $parsley .'>'. $field_atts['value'] .'</textarea>'. "\n" . $field_hidden;
								$label_class = 'class="'. $field_atts['label_class'] .' usp-label usp-label-textarea usp-label-custom usp-form-'. $form;
								break;
							default: 
								return __('error:usp_custom_field:4:', 'usp') . $field_atts['field'];
								break;
						}
						$label_for    = 'usp-custom-' . $field_atts['for'];
						$label_custom = $field_atts['label_custom'];
						$label        = $field_atts['label'];

						$label_start = '<label for="'. $label_for .'" '. $label_class .'" '. $label_custom;
						$label_end = '>'. $label  .'</label>';

						if ($field_atts['label'] == 'null') $label = '';
						else $label = trim($label_start) . trim($label_end) . "\n";

						unset($field_atts['field'], $field_atts['accept'], $field_atts['name'], $field_atts['checked'], $field_atts['selected'], $field_atts['class'], $field_atts['label_class'], $field_atts['rows'], $field_atts['cols']);
						unset($field_atts['for'], $field_atts['label_custom'], $field_atts['label']);

						$attributes = '';
						$content_start = $label . $field_start;
						$content_end = $field_end;
						foreach ($field_atts as $att_name => $att_value) {
							$attributes .= $att_name .'="'. $att_value .'" ';
						}
						$content = $content_start . $attributes . $content_end;

						return $fieldset_before . $content . $fieldset_after;
					} else {
						return __('error:usp_custom_field:5:', 'usp') . $field_atts;
					}
				}
			}
		}
	}
}

/*
	Template Tag: Custom Fields
	Displays custom input and textarea fields
	Syntax: [usp_custom_field id=x]
	Template tag: usp_custom_field(array('id'=>'x', 'form'=>'y'));
	Attributes:
		id   = id of custom field (1-9)
		form = id of custom post type (usp_form)
	Notes:
		shortcode must be used within USP custom post type
		template tag may be used anywhere in the theme template
*/
if (!function_exists('usp_custom_field')) : 
function usp_custom_field($args) {
	$USP_Custom_Fields = new USP_Custom_Fields();
	echo $USP_Custom_Fields->usp_custom_field($args);
}
endif;

/*
	Shortcode: USP Form
		Displays the specified USP Form by id attribute
		Syntax: [usp_form id="1" class="aaa,bbb,ccc"]
		Attributes:
			id    = id of form (post id or slug)
			class = classes comma-sep list (displayed as class="aaa bbb ccc") 
*/
if (!function_exists('usp_form')) : 
function usp_form($args) {
	global $usp_advanced;
	if (isset($args['id']) && !empty($args['id'])) $id = usp_get_form_id($args['id']);
	else return __('error:usp_form:1:', 'usp') . $args['id'];
	
	if (isset($args['class']) && !empty($args['class'])) {
		$class = 'usp-pro,usp-form-'. $id .',' . $args['class'];
		$classes = usp_classes($class);
	} else {
		$classes = '';
	}
	$content = get_post($id, ARRAY_A);
	$args = array('classes' => $classes, 'id' => $id);

	if (isset($_GET['usp_success'])) $success = true;
	else $success = false;
	$form_wrap = usp_form_wrap($args, $success);

	if (get_post_type() !== 'usp_form') {
		if ($success && $usp_advanced['success_form'] == '0') return $form_wrap['form_before'] . $form_wrap['form_after'];
		else return $form_wrap['form_before'] . do_shortcode($content['post_content']) . $form_wrap['form_after'];
	} else {
		return __('error:usp_form:2:', 'usp') . get_post_type();
	}
}
add_shortcode('usp_form', 'usp_form');
endif;


