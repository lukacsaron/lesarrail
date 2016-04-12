<?php
/*
	USP Pro - Quicktags
	QTags.addButton(id, display, arg1, arg2, access_key, title, priority, instance);
	@ http://codex.wordpress.org/Quicktags_API
*/

if (!defined('ABSPATH')) die();

global $post; ?>
<script type="text/javascript">
	// fieldset
	QTags.addButton('usp_fieldset', 'USP:Fieldset', usp_fieldset_prompt, '', '', '', 1);
	function usp_fieldset_prompt(e, c, ed) {
		var prmt, t = this;
		prmt = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		if (ed.canvas.selectionStart !== ed.canvas.selectionEnd) {
			prmt = prompt(prmt);
			if (prmt === null) return;
			t.tagStart = '[usp_fieldset class="' + prmt + '"]';
			t.tagEnd = '[#usp_fieldset]';
		} else if (ed.openTags) {
			var ret = false, i = 0, t = this;
			while (i < ed.openTags.length) {
				ret = ed.openTags[i] == t.id ? i : false;
				i ++;
			}
			if (ret === false) {
				prmt = prompt(prmt);
				if (prmt === null) return;
				t.tagStart = '[usp_fieldset class="' + prmt + '"]';
				t.tagEnd = false;
				if (!ed.openTags) {
					ed.openTags = [];
				}
				ed.openTags.push(t.id);
				e.value = '/' + e.value;
			} else {
				ed.openTags.splice(ret, 1);
				t.tagStart = '[#usp_fieldset]';
				e.value = t.display;
			}
		} else {
			prmt = prompt(prmt);
			if (prmt === null) return;
			t.tagStart = '[usp_fieldset class="' + prmt + '"]';
			t.tagEnd = false;
			if (!ed.openTags) {
				ed.openTags = [];
			}
			ed.openTags.push(t.id);
			e.value = '/' + e.value;
		}
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// name input
	QTags.addButton('usp_name', 'USP:Name', usp_name_prompt, '', '', '', 2);
	function usp_name_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Your Name")';
		prmt3 = 'Enter the label text (leave blank for default: "Your Name")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;

		t.tagStart = '[usp_name class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// url input
	QTags.addButton('usp_url', 'USP:URL', usp_url_prompt, '', '', '', 3);
	function usp_url_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Your URL")';
		prmt3 = 'Enter the label text (leave blank for default: "Your URL")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		t.tagStart = '[usp_url class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// title input
	QTags.addButton('usp_title', 'USP:Title', usp_title_prompt, '', '', '', 4);
	function usp_title_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Post Title")';
		prmt3 = 'Enter the label text (leave blank for default: "Post Title")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		t.tagStart = '[usp_title class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// tags input
	QTags.addButton('usp_tags', 'USP:Tags', usp_tags_prompt, '', '', '', 5);
	function usp_tags_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, prmt6, prmt7, prmt8, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Post Tags")';
		prmt3 = 'Enter the label text (leave blank for default: "Post Tags")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		prmt6 = 'Include any default tags? (comma-separated list of tag IDs) (will not be seen by user)';
		prmt7 = 'Specify the size of the select menu (applies only to "select" menu)';
		prmt8 = 'Allow users to select multiple options? Type "yes" or "no" (without the quotes). Note: does not apply to checkbox menu; leave blank to use default setting.';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		prmt = prompt(prmt6);
		if (prmt === null) return;
		else prmt6 = prmt;
		prmt = prompt(prmt7);
		if (prmt === null) return;
		else prmt7 = prmt;
		prmt = prompt(prmt8);
		if (prmt === null) return;
		else prmt8 = prmt;
		t.tagStart = '[usp_tags class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '" tags="' + prmt6 + '" size="' + prmt7 + '" multiple="' + prmt8 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// captcha input
	QTags.addButton('usp_captcha', 'USP:Captcha', usp_captcha_prompt, '', '', '', 6);
	function usp_captcha_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Antispam Question")';
		prmt3 = 'Enter the label text (leave blank for default: "Antispam Question")';
		prmt4 = 'Maximum number of characters (default: 99)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		t.tagStart = '[usp_captcha class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" max="' + prmt4 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// category input
	QTags.addButton('usp_category', 'USP:Category', usp_category_prompt, '', '', '', 7);
	function usp_category_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, prmt6, prmt7, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter the label text (leave blank for default: "Post Category")';
		prmt3 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt4 = 'Include any default categories? (comma-separated list of cat IDs) (will not be seen by user)';
		prmt5 = 'Specify the size of the select menu (applies only to "select" menu)';
		prmt6 = 'Allow users to select multiple options? Type "yes" or "no" (without the quotes). Note: does not apply to checkbox menu; leave blank to use default setting.';
		prmt7 = 'Exclude any categories? (comma-separated list of cat IDs)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		prmt = prompt(prmt6);
		if (prmt === null) return;
		else prmt6 = prmt;
		prmt = prompt(prmt7);
		if (prmt === null) return;
		else prmt7 = prmt;
		t.tagStart = '[usp_category class="' + prmt1 + '" label="' + prmt2 + '" required="' + prmt3 + '" cats="' + prmt4 + '" size="' + prmt5 + '" multiple="' + prmt6 + '" exclude="' + prmt7 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// content input
	QTags.addButton('usp_content', 'USP:Content', usp_content_prompt, '', '', '', 8);
	function usp_content_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, prmt6, prmt7, prmt8, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Post Content")';
		prmt3 = 'Enter the label text (leave blank for default: "Post Content")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum length in characters (default: 999)';
		prmt6 = 'Number of columns (default: 30)';
		prmt7 = 'Number of rows (default: 3)';
		prmt8 = 'Enable WP richtext editor? Type "on" or "off" (without the quotes)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		prmt = prompt(prmt6);
		if (prmt === null) return;
		else prmt6 = prmt;
		prmt = prompt(prmt7);
		if (prmt === null) return;
		else prmt7 = prmt;
		prmt = prompt(prmt8);
		if (prmt === null) return;
		else prmt8 = prmt;
		t.tagStart = '[usp_content class="'+ prmt1 +'" placeholder="'+ prmt2 +'" label="'+ prmt3 +'" required="'+ prmt4 +'" max="'+ prmt5 +'" cols="'+ prmt6 +'" rows="'+ prmt7 +'" richtext="'+ prmt8 +'"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// file input
	QTags.addButton('usp_files', 'USP:Files', usp_files_prompt, '', '', '', 9);
	function usp_files_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, prmt6, prmt7, prmt8, prmt9, prmt10, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Upload File")';
		prmt3 = 'Enter the label text (leave blank for default: "Upload File")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 255)';
		prmt6 = 'Link text for "add-another file" (default: "Add another file")';
		prmt7 = 'Enable multiple file uploads for this field? (default true)';
		prmt8 = 'If enabled, how should multiple files be selected? Enter "select" to allow users to select multiple files from the "Choose file(s)" prompt; or leave blank to use the "Add another file" link (default)';
		prmt9 = 'If not allowing multiple file uploads, specify a numeric key value for this field (leave blank to use default)';
		prmt10 = 'Specify the allowed file types (comma-separated list). Leave blank to use global defaults.';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		prmt = prompt(prmt6);
		if (prmt === null) return;
		else prmt6 = prmt;
		prmt = prompt(prmt7);
		if (prmt === null) return;
		else prmt7 = prmt;
		prmt = prompt(prmt8);
		if (prmt === null) return;
		else prmt8 = prmt;
		prmt = prompt(prmt9);
		if (prmt === null) return;
		else prmt9 = prmt;
		prmt = prompt(prmt10);
		if (prmt === null) return;
		else prmt10 = prmt;
		t.tagStart = '[usp_files class="'+ prmt1 +'" placeholder="'+ prmt2 +'" label="'+ prmt3 +'" required="'+ prmt4 +'" max="'+ prmt5 +'" link="'+ prmt6 +'" multiple="'+ prmt7 +'" method="'+ prmt8 +'" key="'+ prmt9 +'" types="'+ prmt10 +'"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// custom input
	QTags.addButton('usp_custom', 'USP:Custom', usp_custom_prompt, '', '', '', 10);
	function usp_custom_prompt(e, c, ed) {
		var prmt1, t = this;
		prmt1 = 'Enter the id of the custom field you would like to use (e.g., 1)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		t.tagStart = '[usp_custom_field form="' + <?php echo $post->ID; ?> + '" id="' + prmt1 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// email input
	QTags.addButton('usp_email', 'USP:Email', usp_email_prompt, '', '', '', 11);
	function usp_email_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Post Title")';
		prmt3 = 'Enter the label text (leave blank for default: "Post Title")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		t.tagStart = '[usp_email class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// email subject input
	QTags.addButton('usp_subject', 'USP:Subject', usp_subject_prompt, '', '', '', 12);
	function usp_subject_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter placeholder text (leave blank for default: "Post Title")';
		prmt3 = 'Enter the label text (leave blank for default: "Post Title")';
		prmt4 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt5 = 'Maximum number of characters (default: 99)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		t.tagStart = '[usp_subject class="' + prmt1 + '" placeholder="' + prmt2 + '" label="' + prmt3 + '" required="' + prmt4 + '" max="' + prmt5 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// submit button
	QTags.addButton('usp_submit', 'USP:Submit', user_submit_prompt, '', '', '', 13);
	function user_submit_prompt(e, c, ed) {
		var prmt1, prmt2, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter label text (leave blank for default: "Submit Post")';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		t.tagStart = '[usp_submit class="' + prmt1 + '" value="' + prmt2 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// reset button
	QTags.addButton('usp_reset', 'USP:Reset', user_reset_prompt, '', '', '', 14);
	function user_reset_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter link text (leave blank for default: "Reset form")';
		prmt3 = 'Enter URL that displays the form (required; example: "http://example.com/submit/")';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		t.tagStart = '[usp_reset_button class="' + prmt1 + '" value="' + prmt2 + '" url="' + prmt3 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// remember button
	QTags.addButton('usp_remember', 'USP:Remember', user_remember_prompt, '', '', '', 15);
	function user_remember_prompt(e, c, ed) {
		var prmt1, prmt2, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter label text (leave blank for default: "Remember me")';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		t.tagStart = '[usp_remember class="' + prmt1 + '" label="' + prmt2 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// cc message
	QTags.addButton('usp_cc', 'USP:CC', user_cc_prompt, '', '', '', 16);
	function user_cc_prompt(e, c, ed) {
		var prmt1, prmt2, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter custom CC message (overrides default setting)';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		t.tagStart = '[usp_cc class="' + prmt1 + '" text="' + prmt2 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// custom redirect
	QTags.addButton('usp_redirect', 'USP:Redirect', user_redirect_prompt, '', '', '', 17);
	function user_redirect_prompt(e, c, ed) {
		var prmt1, prmt2, t = this;
		prmt1 = 'Enter a complete URL for custom redirect on successful form submission (applies to this form only)';
		prmt2 = 'Enter any custom attributes using *single quotes*, for example: class=\'example classes\' data-role=\'custom\'';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		t.tagStart = '[usp_redirect url="' + prmt1 + '" custom="' + prmt2 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
	// taxonomy input
	QTags.addButton('usp_taxonomy', 'USP:Taxonomy', usp_taxonomy_prompt, '', '', '', 7);
	function usp_taxonomy_prompt(e, c, ed) {
		var prmt1, prmt2, prmt3, prmt4, prmt5, prmt6, prmt7, prmt8, t = this;
		prmt1 = 'Enter class name(s), comma-separated (e.g., class1,class2,class3)';
		prmt2 = 'Enter the label text (leave blank for default: "Post Taxonomy")';
		prmt3 = 'Require this input? Type "yes" or "no" (without the quotes)';
		prmt4 = 'Specify the taxonomy to use for this input (e.g., "people")';
		prmt5 = 'Specify the size of the select menu (applies only to "select" menu)';
		prmt6 = 'Allow users to select multiple options? Type "yes" or "no" (without the quotes). Note: does not apply to checkbox menu; leave blank to use default setting.';
		prmt7 = 'Specify the taxonomy terms (comma-separated list of term IDs)';
		prmt8 = 'How should this field be displayed? ("checkbox" or "dropdown")';
		prmt = prompt(prmt1);
		if (prmt === null) return;
		else prmt1 = prmt;
		prmt = prompt(prmt2);
		if (prmt === null) return;
		else prmt2 = prmt;
		prmt = prompt(prmt3);
		if (prmt === null) return;
		else prmt3 = prmt;
		prmt = prompt(prmt4);
		if (prmt === null) return;
		else prmt4 = prmt;
		prmt = prompt(prmt5);
		if (prmt === null) return;
		else prmt5 = prmt;
		prmt = prompt(prmt6);
		if (prmt === null) return;
		else prmt6 = prmt;
		prmt = prompt(prmt7);
		if (prmt === null) return;
		else prmt7 = prmt;
		prmt = prompt(prmt8);
		if (prmt === null) return;
		else prmt8 = prmt;
		t.tagStart = '[usp_taxonomy class="' + prmt1 + '" label="' + prmt2 + '" required="' + prmt3 + '" tax="' + prmt4 + '" size="' + prmt5 + '" multiple="' + prmt6 + '" terms="' + prmt7 + '" type="' + prmt8 + '"]';
		t.tagEnd = false;
		QTags.TagButton.prototype.callback.call(t, e, c, ed);
	}
</script>