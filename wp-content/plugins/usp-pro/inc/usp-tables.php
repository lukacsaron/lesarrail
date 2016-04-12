<?php // USP Pro - Tables for Tools > Shortcodes & Template Tags 

/*
	Table content - Form Shortcodes
*/
if (!function_exists('usp_table_form_shortcodes')) : 
function usp_table_form_shortcodes() {
ob_start(); ?>
<h4>Form Shortcodes</h4>
<p>The following shortcodes serve to display forms and form content.</p>
<table class="usp-table">
	<tr>
		<th>Shortcode Name</th>
		<th>Shortcode Description</th>
		<th>Attribute Definitions</th>
	</tr>
	<tr>
		<td><code>[usp_form id="example"]</code></td>
		<td>Displays the USP Form specified by it&rsquo;s ID or slug. Each form&rsquo;s shortcode is displayed in the &ldquo;Shortcode&rdquo; column of the &ldquo;USP Forms&rdquo; screen.</td>
		<td><ul>
				<li><code>id</code> &ndash; (required) the form ID or slug</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_fieldset]</code><code>[#usp_fieldset]</code></td>
		<td>Wraps any form content with a fieldset element <code>&lt;fieldset&gt;</code>. While creating a form, click the &ldquo;USP:Fieldset&rdquo; quicktag to include the opening fieldset, then again to include the closing fieldset.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_name]</code></td>
		<td>Displays a form input for the user&rsquo;s name. Additional user options available in the General Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Your Name&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Your Name&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_url]</code></td>
		<td>Displays a form input for the user&rsquo;s <abbr title="Uniform Resource Locator">URL</abbr>.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Your URL&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Your URL&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_title]</code></td>
		<td>Displays a form input for the submitted post title.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Title&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Title&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_tags]</code></td>
		<td>Displays a form input for the submitted post tags. Additional tag options available in the General Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
				
				<li><code>tags</code> &ndash; additional tags to include (comma-separated list of tag IDs)</li>
				<li><code>size</code> &ndash; size of the select menu (applies only to &ldquo;select&rdquo; menu option)</li>
				<li><code>multiple</code> &ndash; allow users to select multiple options (&ldquo;yes&rdquo; or &ldquo;no&rdquo;). Does not apply to checkbox menu.</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_captcha]</code></td>
		<td>
			Displays a form input for the antispam challenge question/captcha. Always required when included. Additional captcha options available in the General Settings. 
			Note: as of version 1.3, Google reCAPTCHA may be used instead of the default challenge question. After reCAPTCHA is enabled in the General Settings, 
			it may be added to any form using the shortcode <code>[usp_captcha]</code> (i.e., without any attributes).
		</td>
		<td>
			<p>Note that these attributes apply only to the default challenge question.</p>
			<ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_category]</code></td>
		<td>Displays the a form input for the post category. Additional category options available in the General Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				
				<li><code>cats</code> &ndash; additional categories to include (comma-separated list of cat IDs)</li>
				<li><code>size</code> &ndash; size of the select menu (applies only to &ldquo;select&rdquo; menu option)</li>
				<li><code>multiple</code> &ndash; allow users to select multiple options (&ldquo;yes&rdquo; or &ldquo;no&rdquo;). Does not apply to checkbox menu.</li>
				
				<li><code>exclude</code> &ndash; comma-separated list of categories to exclude (overrides categories selected in General &gt; Categories)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_taxonomy]</code></td>
		<td>Displays the a form input for the specified terms of a custom taxonomy.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				
				<li><code>tax</code> &ndash; specifies the taxonomy (e.g., &ldquo;animals&rdquo;)</li>
				<li><code>size</code> &ndash; size of the select menu (applies only to &ldquo;select&rdquo; menu option)</li>
				<li><code>terms</code> &ndash; specifies which tax terms to include (comma-separated list of term IDs)</li>
				<li><code>type</code> &ndash; specifies the type of field to display (checkbox or dropdown)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_content]</code></td>
		<td>Displays a form input for the post content. Additional content options available in the General Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Content&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Content&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
				
				<li><code>cols</code> &ndash; number of columns for the textarea/content (default: &ldquo;30&rdquo;)</li>
				<li><code>rows</code> &ndash; number of rows for the textarea/content (default: &ldquo;3&rdquo;)</li>
				<li><code>richtext</code> &ndash; nnable WP richtext editor (&ldquo;on&rdquo; or &ldquo;off&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_files]</code></td>
		<td>Displays a form input for file-upload(s). Additional file/upload options available in the Uploads Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Content&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Content&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;255&rdquo;)</li>
				
				<li><code>link</code> &ndash; text for the &ldquo;Add another file&rdquo; link (when included)</li>
				<li><code>multiple</code> &ndash; enable multiple file uploads (default true)</li>
				<li><code>method</code> &ndash; file-selection method: &ldquo;select&rdquo; = select multiple files from the &ldquo;Choose files&rdquo; prompt; or leave blank to use the &ldquo;Add another file&rdquo; link</li>
				<li><code>key</code> &ndash; specify an optional numeric key value (applies only when &ldquo;multiple&rdquo; is set to false)</li>
				<li><code>types</code> &ndash; comma-separated list of allowed file types (overrides default/global settings, see Uploads Settings)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_custom_field form="123" id="1"]</code></td>
		<td>Displays a custom input for form &ldquo;123&rdquo; (slug or ID), defined by custom field &ldquo;1&rdquo; (ID). Note that the custom field specified by the <code>id</code> must be defined. 
			You can grab the shortcode for existing custom fields from the &ldquo;Custom Fields&rdquo; panel on the &ldquo;USP Forms&rdquo; screen. Additional custom-field options available in the Advanced Settings. 
			See also the next table &ldquo;Custom Field Attributes&rdquo; for complete list of custom-field shortcode attributes.</td>
		<td><ul>
				<li><code>form</code> &ndash; (required) numerical ID of the form</li>
				<li><code>id</code> &ndash; (required) the ID of a custom field defined for the specified form ID</li>
				<li>See also the next table &ldquo;Custom Field Attributes&rdquo; for complete list of attributes.</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_email]</code></td>
		<td>Displays the a form input for the user&rsquo;s email addresss. Additional email options available in the Admin Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_subject]</code></td>
		<td>Displays a form input for the email subject line. Additional email options available in the Admin Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>placeholder</code> &ndash; placeholder text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Post Tags&rdquo;)</li>
				<li><code>required</code> &ndash; should the input be required (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
				<li><code>max</code> &ndash; maximum number of characters (default: &ldquo;99&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_submit]</code></td>
		<td>Displays a submit button for the form. See also the option &ldquo;Auto-include submit button&rdquo; in the Advanced Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>value</code> &ndash; text for submit button (default: &ldquo;Submit Post&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_reset_button]</code></td>
		<td>Displays a link to reset the form.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>value</code> &ndash; text for reset link (default: &ldquo;Reset form&rdquo;)</li>
				<li><code>url</code> &ndash; (required, no default) URL that displays the form, for example: <code>http://example.com/submit/</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_remember]</code></td>
		<td>Displays a checkbox to &ldquo;remember&rdquo; form values. See also the options &ldquo;Remember Form Values&rdquo; and &ldquo;Memory Strength&rdquo; in the Basic Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>label</code> &ndash; label text (default: &ldquo;Remember me&rdquo;)</li>
				<li><code>checked</code> &ndash; select/check the box by default (&ldquo;yes&rdquo; or &ldquo;no&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_cc]</code></td>
		<td>Displays a message intended for CC/email recipients. Could actually be used for any text. See also the options &ldquo;CC User Message&rdquo; and &ldquo;Contact&rdquo; in the Admin Settings.</td>
		<td><ul>
				<li><code>class</code> &ndash; any additional class names, comma-separated</li>
				<li><code>text</code> &ndash; label text (default: uses the plugin setting &ldquo;CC User Message&rdquo; in the Admin Settings)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_redirect]</code></td>
		<td>Redirects to specified URL on successful form submission (applies to current form only, overrides default setting)</td>
		<td><ul>
				<li><code>url</code> &ndash; any complete/full URL (e.g., <code>http://example.com/success/</code>)</li>
				<li><code>custom</code> &ndash; any custom attribute(s) using <strong>single quotes</strong> (e.g., <code>class='example classes' data-role='custom'</code>)</li>
			</ul>
		</td>
	</tr>
</table>
<?php $table = ob_get_contents();
ob_end_clean();
return $table;
}
endif;

/*
	Table content - Custom Field Attributes
*/
if (!function_exists('usp_table_custom_attributes')) : 
function usp_table_custom_attributes() {
ob_start(); ?>
<h4>Custom Field Attributes</h4>
<p>Here is a complete list of attributes for the custom-field shortcode, <code>[usp_custom_field]</code>. Refer to the previous table &ldquo;Form Shortcodes&rdquo; for more info about the <code>[usp_custom_field]</code> shortcode. 
	Note that when specifying HTML in attributes, replace angle brackets <code>&lt;</code> and <code>&gt;</code> with curly brackets <code>{</code> and <code>}</code>, such that <code>&lt;h3&gt;</code> is written as <code>{h3}</code></p>
<table class="usp-table">
	<tr>
		<th>Shortcode Name</th>
		<th>Shortcode Description</th>
		<th>Attribute Definitions</th>
	</tr>
	<tr>
		<td>Shortcode Attributes for <code>[usp_custom_field]</code></td>
		<td>Each custom shortcode accepts a variety of attributes defined as the value of its custom field. So for example, attributes for the shortcode <code>[usp_custom_field form="123" id="1"]</code> 
			may be customized by adding <code>attribute#value</code> pairs to the first custom field of form 123. Separate multiple attributes with vertical bars <code>|</code>.</td>
		<td><ul>
				<li>Syntax: <code>attribute#value</code>&ndash; custom attributes, where &ldquo;attribute&rdquo; is the name and &ldquo;value&rdquo; is the value. Supported attributes:
					<ul>
						<li><code>field</code> &ndash; input or textarea (default: input)</li>
						<li><code>type</code> (when <code>field</code> is set to <code>input</code>) &ndash; text (default), checkbox, password, radio (for select/option field, see the Tips &amp; Tricks section)</li>
						<li><code>data-required</code> &ndash; true or false (default: true)</li>
						<li><code>placeholder</code> &ndash; placeholder text</li>
						<li><code>class</code> &ndash; additional classes for input</li>
						<li><code>label</code> &ndash; label text</li>
						<li><code>for</code> &ndash; label attribute, must match input &ldquo;name&rdquo;</li>
						<li><code>name</code> &ndash; input attribute, must match label &ldquo;for&rdquo;</li>
						<li><code>label_class</code> &ndash; additional classes for label</li>
						<li><code>label_custom = </code> &ndash; custom string for label</li>
						<li><code>rows</code> &ndash; number of rows for textarea</li>
						<li><code>cols</code> &ndash; number of columns for textarea</li>
						<li><code>accept</code> &ndash; MIME type, eg: <code>audio/*</code>, <code>video/*</code>, 
							<a href="http://iana.org/assignments/media-types" target="_blank">more</a> (default: <code>image/*</code>)</li> 
						<li><code>custom_1</code> thru <code>custom_5</code> &ndash; custom field attributes (anything not listed above). 
							Syntax: <code>custom_1#attribute:value</code>, where &ldquo;attribute&rdquo; is the name and &ldquo;value&rdquo; is the value.</li>
						<li><code>checked</code> &ndash; adds a &ldquo;checked&rdquo; attribute to the field</li>
						<li><code>selected</code> &ndash; adds a &ldquo;selected&rdquo; attribute to the field</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>User Registration Attributes for <code>[usp_custom_field]</code></td>
		<td>In addition to the custom attributes defined above, here is a set of attributes that is useful when using a USP Form to register new users. They may be used in addition to any of the attributes defined above. 
			Separate multiple attributes with vertical bars <code>|</code>. Note that a full set of the user-registration shortcodes is available in the &ldquo;User Registration&rdquo; form demo.</td>
		<td><ul>
				<li>Syntax: <code>attribute#value</code>&ndash; custom attributes, where &ldquo;attribute&rdquo; is the name and &ldquo;value&rdquo; is the value. Supported attributes for user-registration forms:
					<ul>
						<li>Nicename:<br />
							<code>name#nicename</code><br />
							<code>for#nicename</code><br />
							<code>label#Nicename</code><br />
							<code>placeholder#Nicename</code>
						</li>
						<li>Display Name:
							<code>name#displayname</code><br />
							<code>for#displayname</code><br />
							<code>label#Display Name</code><br />
							<code>placeholder#Display Name</code>
						</li>
						<li>Nickname:<br />
							<code>name#nickname</code><br />
							<code>for#nickname</code><br />
							<code>label#Nickname</code><br />
							<code>placeholder#Nickname</code>
						</li>
						<li>First Name:<br />
							<code>name#firstname</code><br />
							<code>for#firstname</code><br />
							<code>label#First Name</code><br />
							<code>placeholder#First Name</code>
						</li>
						<li>Last Name:<br />
							<code>name#lastname</code><br />
							<code>for#lastname</code><br />
							<code>label#Last Name</code><br />
							<code>placeholder#Last Name</code>
						</li>
						<li>Description:<br />
							<code>name#description</code><br />
							<code>for#description</code><br />
							<code>label#Description</code><br />
							<code>placeholder#Description</code>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Post Format Attributes for <code>[usp_custom_field]</code></td>
		<td>In addition to the custom attributes defined above, you may also create a form field for setting the <a href="http://codex.wordpress.org/Post_Formats" target="_blank">Post Format</a>.</td>
		<td><ul>
				<li>Syntax: <code>attribute#value</code>&ndash; custom attributes, where &ldquo;attribute&rdquo; is the name and &ldquo;value&rdquo; is the value. Required attributes for Post-Format field:
					<ul>
						<li>Required hidden field with no label, setting the post-format to &ldquo;quote&rdquo;: <code>label#|type#hidden|name#format|for#format|value#quote|data-required#true</code></li>
						<li>Optional visible text-input field with label and placeholder: <code>label#Post Format|placeholder#Post Format|type#text|name#format|for#format|data-required#false</code></li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
</table>
<?php $table = ob_get_contents();
ob_end_clean();
return $table;
}
endif;

/*
	Table content - Post/Content Shortcodes
*/
if (!function_exists('usp_table_post_shortcodes')) : 
function usp_table_post_shortcodes() {
ob_start(); ?>
<h4>Content Shortcodes</h4>
<p>The following shortcodes serve to display submitted content. Note that when specifying HTML in attributes, replace angle brackets 
	<code>&lt;</code> and <code>&gt;</code> with curly brackets <code>{</code> and <code>}</code>, such that <code>&lt;h3&gt;</code> is written as <code>{h3}</code></p>
<table class="usp-table">
	<tr>
		<th>Shortcode Name</th>
		<th>Shortcode Description</th>
		<th>Attribute Definitions</th>
	</tr>
	<tr>
		<td><code>[usp_is_submission][/usp_is_submission]</code></td>
		<td>Used as a conditional shortcode, <code>usp_is_submission</code> displays enclosed content only if the post is submitted via USP.</td>
		<td><ul>
				<li><code>deny</code> &ndash; message to display when the post is not a submitted post</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_submitted]</code></td>
		<td>Displays a list of submitted file URLs for the specified/current post (gets all file types as custom fields)</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>link</code> &ndash; href value for optional link: <code>parent</code>, <code>http://example.com/custom/url/</code>, or empty for no link</li>
				<li><code>number</code> &ndash; the number of URLs to display</li>
				<li><code>before</code> &ndash; optional text/markup to display before each URL</li>
				<li><code>after</code> &ndash; optional text/markup to display after each URL</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_images]</code></td>
		<td>Displays formatted URLs for image attachments (gets only images from the Media Library)</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>number</code> &ndash; the number of URLs to display</li>
				<li><code>size</code> &ndash; image size: thumbnail, medium, large or full (or any defined image size)</li>
				<li><code>before</code> &ndash; optional text/markup to display before each URL</li>
				<li><code>after</code> &ndash; optional text/markup to display after each URL</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_file]</code></td>
		<td>Displays the formatted URLs for post attachments (gets all file types from the Media Library)</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>number</code> &ndash; the number of URLs to display</li>
				<li><code>before</code> &ndash; optional text/markup to display before each URL</li>
				<li><code>after</code> &ndash; optional text/markup to display after each URL</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_attachments]</code></td>
		<td>Displays links to attachment pages for each post</td>
		<td><ul>
				<li><code>id</code> &ndash; an optional post ID to use (default: uses global/current post)</li>
				<li><code>number</code> &ndash; number of links to display for each post (default: false = display all)</li>
				<li><code>file</code> &ndash; an optional, specific uploaded file (default: false = display all)</li>
				<li><code>beforeitem</code> &ndash; text/markup to display before each item (default: <code>{li}</code>)</li>
				<li><code>afteritem</code> &ndash; text/markup to display after each item (default: <code>{/li}</code>)</li>
				<li><code>beforelist</code> &ndash; text/markup to display before all items (default: <code>{ul}</code>)</li>
				<li><code>afterlist</code> &ndash; text/markup to display after all items (default: <code>{/ul}</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_filename]</code></td>
		<td>Displays the filename of the specified attachment</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>file</code> &ndash; optional custom-field ID of the file to display (default: ID = 1)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_latest]</code></td>
		<td>Displays optionally formatted URL(s) of the latest attachment(s)</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>url</code> &ndash; href value for optional link: <code>attachment</code>, <code>post</code>, or <code>file</code> (default: file = URL only, no link)</li>
				<li><code>number</code> &ndash; the number of recent attachments to display</li>
				<li><code>before</code> &ndash; text/markup to display before each URL (default: none)</li>
				<li><code>after</code> &ndash; text/markup to display after each URL (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_meta]</code></td>
		<td>Displays the value of the specified custom field</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>meta</code> &ndash; name of custom field to use (default: usp-author)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_all_meta]</code></td>
		<td>Displays all usp custom fields for current or specified post (key => value)</td>
		<td><ul>
				<li><code>id</code> &ndash; optional post id (uses current post if not specified)</li>
				<li><code>sep</code> &ndash; text/markup to appear between the custom field key and value (default: &ldquo; => &rdquo;)</li>
				<li><code>before</code> &ndash; text/markup to display before each key/value pair (default: <code>{div}</code>)</li>
				<li><code>after</code> &ndash; text/markup to display after each key/value pair (default: <code>{/div}</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_image]</code></td>
		<td>Displays formatted images from within post loop, or the same for specified images outside the loop (i.e., anywhere in the theme)</td>
		<td><ul>
				<li><code>ids</code> (note: plural) &ndash; comma-separated list of attachment IDs (default: empty = all images)</li>
				<li><code>number</code> &ndash; the number of images for which to retrieve data (default: empty = display all)</li>
				<li><code>size</code> &ndash; attachment size: thumbnail, medium, large full, or any defined size (default: thumbnail)</li>
				<li><code>icon</code> &ndash; whether to use a media icon for the attachment: true or false (default: false)</li>
				<li><code>link</code> &ndash; href value for link: <code>file</code>, <code>attachment</code>, <code>parent</code>, <code>image</code>, <code>http://example.com/</code> (default: empty = no link, image only)</li>
				<li><code>link_class</code> &ndash; additional classes (defaults to <code>lightbox</code>)</li>
				<li><code>link_att</code> &ndash; optional attribute(s) for links. Note: you can use <code>#id#"</code> to include the current post ID (default: <code>rel="lightbox"</code>)</li>
				<li><code>link_title</code> &ndash; title for links when enabled (default: use attachment description for title)</li>
				<li><code>img_class</code> &ndash; class name(s) for each image (default: <code>usp-image</code>)</li>
				<li><code>img_att</code> &ndash; optional attribute(s) for images. Note: you can use <code>#id#"</code> to include the current post ID (default: <code>target="_blank"</code>)</li>
				<li><code>beforeitem</code> &ndash; text/markup to display before each item (default: <code>{span class="usp-image-wrap"}</code>)</li>
				<li><code>afteritem</code> &ndash; text/markup to display after each item (default: <code>{/span}</code>)</li>
				<li><code>beforelist</code> &ndash; text/markup to display before all items (default: <code>{div class="usp-images-wrap"}</code>)</li>
				<li><code>afterlist</code> &ndash; text/markup to display after all items (default: <code>{/div}</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_author_name]</code></td>
		<td>Displays author name from custom field as a link (if URL provided) or plain text (if URL not provided)</td>
		<td><ul>
				<li>No attributes for this shortcode :)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_avatar]</code></td>
		<td>Displays the avatar (image) of the specified submitter</td>
		<td><ul>
				<li><code>postid</code> &ndash; an optional post ID to use (default: global/current post)</li>
				<li><code>userid</code> &ndash; an optional email to use (default: none)</li>
				<li><code>size</code> &ndash; size of avatar (max = 512, default: 96)</li>
				<li><code>default</code> &ndash; default image URL (defaults to WP's &ldquo;Mystery Man&rdquo;)</li>
				<li><code>alt</code> &ndash; alt-text for image att (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_video]</code></td>
		<td>Displays the specified video(s). This is basically a wrapper for WP&rsquo;s <code>[video]</code> shortcode. Currently supported video formats: mp4, m4v, webm, ogv, wmv, flv.
			<a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">Visit the Codex to learn more</a></td>
		<td><ul>
				<li><code>id</code> &ndash; an optional post ID to use (default: global/current post)</li>
				<li><code>file</code> &ndash; optional uploaded file ID (i.e., ID of custom field)</li>
				<li><code>poster</code> &ndash; defines image to show as placeholder before the media plays (default: none)</li>
				<li><code>loop</code> &ndash; allows for the looping of media: &ldquo;on&rdquo; or &ldquo;off&rdquo; (default: off)</li>
				<li><code>autoplay</code> &ndash; causes the media to automatically play as soon as the media file is ready (default: off)</li>
				<li><code>preload</code> &ndash; specifies if and how the video should be loaded when the page loads: <code>metadata</code>, <code>none</code>, or <code>auto</code> (default: metadata)</li>
				<li><code>height</code> &ndash; defines height of the media in pixels (default: detected video height)</li>
				<li><code>width</code> &ndash; defines width of the media in pixels (default: detected video width)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_audio loop="" autoplay="" preload=""]</code></td>
		<td>Displays the specified audio media. This is basically a wrapper for WP&rsquo;s <code>[audio]</code> shortcode. Currently supported audio formats: mp3, ogg, wma, m4a, wav.
			<a href="https://codex.wordpress.org/Audio_Shortcode" target="_blank">Visit the Codex to learn more</a></td>
		<td><ul>
				<li><code>id</code> &ndash; an optional post ID to use (default: global/current post)</li>
				<li><code>file</code> &ndash; optional uploaded file ID (i.e., ID of custom field)</li>
				<li><code>number</code> &ndash; the number of audio files to display (default: empty = display all)</li>
				<li><code>before</code> &ndash; text/markup to display before each item (default: none)</li>
				<li><code>after</code> &ndash; text/markup to display after each item (default: none)</li>
				<li><code>loop</code> &ndash; allows for the looping of media: &ldquo;on&rdquo; or &ldquo;off&rdquo; (default: off)</li>
				<li><code>autoplay</code> &ndash; causes the media to automatically play as soon as the media file is ready (default: off)</li>
				<li><code>preload</code> &ndash; specifies if and how the audio should be loaded when the page loads: <code>metadata</code>, <code>none</code>, or <code>auto</code> (default: metadata)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_access cap="read"][/usp_access]</code></td>
		<td>Require login based on capability to view content. For example, to display something to logged-in users who can edit posts, we could do this: 
			<code>[usp_access cap="edit_posts"]</code> something <code>[/usp_access]</code>. <a href="http://codex.wordpress.org/Roles_and_Capabilities" target="_blank">Learn more about WP Capabilities</a></td>
		<td><ul>
				<li><code>cap</code> &ndash; the capability required for the user to view the content (default: read)</li>
				<li><code>deny</code> &ndash; message to display when the user is not qualified (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_visitor][/usp_visitor]</code></td>
		<td>Display content to visitors only.</td>
		<td><ul>
				<li><code>deny</code> &ndash; message to display when the user is not qualified (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_member][/usp_member]</code></td>
		<td>Display content to members only.</td>
		<td><ul>
				<li><code>deny</code> &ndash; message to display when the user is not qualified (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_status]</code></td>
		<td>Display content to members only. Note: see the USP Post "Shortcode Demo" for an example of this shortcode.</td>
		<td><ul>
				<li><code>before</code> &ndash; text/markup to display before the status (default: none)</li>
				<li><code>after</code> &ndash; text/markup to display after the status (default: none)</li>
				<li><code>display</code> &ndash; the user info to display: <code>status</code>, <code>name</code>, <code>role</code>, <code>email</code>, or <code>id</code> (default: status)</li>
				<li><code>logintext</code> &ndash; text to display for logged-out status (when using display &ldquo;status&rdquo;) (default: &ldquo;logged in&rdquo;)</li>
				<li><code>logouttext</code> &ndash; text to display for logged-in status (when using display &ldquo;status&rdquo;) (default: &ldquo;logged out&rdquo;)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>[usp_get_posts]</code></td>
		<td>Display posts from given category or other query (basically a shortcode wrapper for WP&rsquo;s <code>get_posts()</code> function). 
			<a href="http://codex.wordpress.org/Template_Tags/get_posts" target="_blank">Check the Codex page for more info</a>. 
			Note: use curly brackets <code>{</code><code>}</code> instead of angle brackets <code>&lt;</code><code>&gt;</code> for the &ldquo;before&rdquo; and &ldquo;after&rdquo; attributes.</td>
		<td><ul>
				<li>get_posts() parameters &ndash; this shortcode accepts the same parameters as <code>get_posts()</code> (attribute name = parameter name)</li>
				<li><code>before</code> &ndash; text/markup to display before each post (default: none)</li>
				<li><code>after</code> &ndash; text/markup to display after the status (default: none)</li>
				<li><code>classes</code> &ndash; extra CSS classes for outer <code>&lt;div&gt;</code> (default: none)</li>
				<li><code>content</code> &ndash; display the post content (true or false)</li>
				<li><code>logouttext</code> &ndash; display basic post meta (true or false)</li>
			</ul>
		</td>
	</tr>
</table>
<?php $table = ob_get_contents();
ob_end_clean();
return $table;
}
endif;

/*
	Table content - Template Tags
*/
if (!function_exists('usp_table_template_tags')) : 
function usp_table_template_tags() {
ob_start(); ?>
<h4>Template Tags for displaying content and other info</h4>
<table class="usp-table">
	<tr>
		<th>Tag Name</th>
		<th>Tag Description</th>
		<th>Parameter Definitions</th>
	</tr>
	<tr>
		<td><code>display_usp_form()</code></td>
		<td>Displays a USP Form based on input ID (uses usp_form in usp-shortcodes.php). Syntax: <code>display_usp_form($id, $class);</code></td>
		<td><ul>
				<li><code>$id</code> &ndash; (string/integer/false) the id of the USP Form to display (required) (default: false)</li>
				<li><code>$class</code> &ndash; (string/false) optional custom classes as comma-sep list (displayed as class="aaa bbb ccc") (default: none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_is_submitted()</code></td>
		<td>Returns a boolean (true/false) value indicating whether the specified post is user-submitted. Shortcode available for this tag.</td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_submitted()</code></td>
		<td>Returns an array of submitted file URLs for the specified/current post.</td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_images()</code></td>
		<td>Returns an array of the formatted URLs for image attachments. Syntax: <code>$images = usp_get_images('thumbnail', '', '', false, false); foreach ($images as $image) echo $image;</code></td>
		<td><ul>
				<li><code>$size</code> &ndash; (string) image size as thumbnail, medium, large, full, or any defined size (default: thumbnail)</li>
				<li><code>$before</code> &ndash; (string) text/markup displayed before the image URL (default: <code>&lt;img src=&quot;</code>)</li>
				<li><code>$after</code> &ndash; (string) text/markup displayed after the image URL (default: <code>&quot; /&gt;</code>)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of images to display for each post (default: false = display all)</li>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_files()</code></td>
		<td>Returns an array of the formatted URLs for post attachments. Syntax: <code>$files = usp_get_files('', '', 3, false); foreach ($files as $file) echo $file;</code></td>
		<td><ul>
				<li><code>$before</code> &ndash; (string) text/markup displayed before the image URL (default: none)</li>
				<li><code>$after</code> &ndash; (string) text/markup displayed after the image URL (default: none)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of images to display for each post (default: false = display all)</li>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_ids()</code></td>
		<td>Returns an array of the IDs for post attachments. Syntax: <code>$ids = usp_ids(false, false); foreach ($ids as $id) echo $id;</code></td>
		<td><ul>
				<li><code>$number</code> &ndash; (string/integer/false) the number of IDs to retrieve (default: false = display all)</li>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_attachment_link()</code></td>
		<td>Returns a formatted set of links to attachment pages for each post. Syntax: <code>echo usp_attachment_link(false, false, false, false, false, false, false)</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$fieldId</code> &ndash; (string/integer/false) an optional, specific uploaded file (default: false = display all)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of links to retrieve (default: false = display all)</li>
				<li><code>$before_item</code> &ndash; (string) text/markup to display before each item (default: <code>{li}</code>)</li>
				<li><code>$after_item</code> &ndash; (string) text/markup to display after each item (default: <code>{/li}</code>)</li>
				<li><code>$before_list</code> &ndash; (string) text/markup to display before all items (default: <code>{ul}</code>)</li>
				<li><code>$after_list</code> &ndash; (string) text/markup to display after all items (default: <code>{/ul}</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_filename()</code></td>
		<td>Returns the filename of the specified attachment. Syntax: (in loop) <code>echo usp_get_filename(false, '2');</code>, (outside loop) <code>echo usp_get_filename('2544', '3');</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$fieldId</code> &ndash; (string/integer/false) an optional, specific uploaded file (default: false = display all)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_latest_attachment()</code></td>
		<td>Returns optionally formatted URL(s) of the latest attachment(s). Syntax: <code>echo usp_latest_attachment('', '', false, false, 'file');</code></td>
		<td><ul>
				<li><code>$before</code> &ndash; (string) text/markup displayed before the image URL (default: none)</li>
				<li><code>$after</code> &ndash; (string) text/markup displayed after the image URL (default: none)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of images to display for each post (default: 1)</li>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$url</code> &ndash; (string) attachment, post, or file (default: file = no link, URL only)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_meta()</code></td>
		<td>Returns the value of the specified custom field. Syntax: <code>usp_get_meta(false, false);</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$meta</code> &ndash; (string/false) name of custom field (default: usp-author)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_all_meta()</code></td>
		<td>Returns all usp custom fields for current or specified post. Example Syntax: <code>$usp_meta = usp_get_all_meta(false); foreach ($usp_meta as $key =&gt; $value) echo $key . ' => ' . $value . &quot;\n&quot;;</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
			</ul>
		</td>
	</tr>
		<tr>
		<td><code>usp_get_image()</code></td>
		<td>Returns formatted images from within post loop, or the same for specified images outside the loop (i.e., anywhere in the theme). 
			Syntax: <code>echo usp_get_image(false, false, false, false, false, '', '', '', '', false, false, false, false, false); </code></td>
		<td><ul>
				<li><code>ids</code> (note: plural) &ndash; (string/false) comma-separated list of attachment IDs (default: empty = all images)</li>
				<li><code>size</code> &ndash; (string/false) attachment size: thumbnail, medium, large full, or any defined size (default: thumbnail)</li>
				<li><code>icon</code> &ndash; (boolean) whether to use a media icon for the attachment (default: false)</li>
				<li><code>number</code> &ndash; (string/integer/false) the number of images for which to retrieve data (default: empty = display all)</li>
				<li><code>link</code> &ndash; (string/false) href value for link: <code>file</code>, <code>attachment</code>, <code>parent</code>, <code>image</code>, <code>http://example.com/</code> (default: empty = no link, image only)</li>
				<li><code>beforeitem</code> &ndash; (string) text/markup to display before each item (default: <code>{span class="usp-image-wrap"}</code>)</li>
				<li><code>afteritem</code> &ndash; (string) text/markup to display after each item (default: <code>{/span}</code>)</li>
				<li><code>beforelist</code> &ndash; (string) text/markup to display before all items (default: <code>{div class="usp-images-wrap"}</code>)</li>
				<li><code>afterlist</code> &ndash; (string) text/markup to display after all items (default: <code>{/div}</code>)</li>
				<li><code>link_class</code> &ndash; (string/false) additional classes (defaults to <code>lightbox</code>)</li>
				<li><code>link_att</code> &ndash; (string/false) optional attribute(s) for links. Note: you can use <code>#id#"</code> to include the current post ID (default: <code>rel="lightbox"</code>)</li>
				<li><code>link_title</code> &ndash; (string/false) title for links when enabled (default: use attachment description for title)</li>
				<li><code>img_class</code> &ndash; (string/false) class name(s) for each image (default: <code>usp-image</code>)</li>
				<li><code>img_att</code> &ndash; (string/false) optional attribute(s) for images. Note: you can use <code>#id#"</code> to include the current post ID (default: <code>target="_blank"</code>)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_author_link()</code></td>
		<td>Returns author name from custom field as a link (if URL exists) or plain text (if URL not available). Syntax: <code>echo usp_get_author_link();</code></td>
		<td><ul>
				<li>No parameters for this template tag.</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_avatar()</code></td>
		<td>Returns the avatar (image) of the specified submitter. Syntax: <code>echo usp_get_avatar(false, false, false, false, false);</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) an optional post ID to use (default: false/none or current ID when used in loop)</li>
				<li><code>$id_or_email</code> &ndash; (integer/string) an optional email to use (default: false/none)</li>
				<li><code>$size</code> &ndash; (integer) optional size of avatar (max: 512, default: 96)</li>
				<li><code>$default</code> &ndash; (string/false) optional default image URL (default: WP &ldquo;Mystery Man&rdquo;)</li>
				<li><code>$alt</code> &ndash; (string/false) optional alt-text for image alt attribute (default: false/none)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_video_url()</code></td>
		<td>Returns url(s) of uploaded video(s). Currently supported video formats: mp4, m4v, webm, ogv, wmv, flv. 
			Syntax: <code>$video_urls = usp_video_url(false, false, false); foreach ($video_urls as $video_url) echo $video_url;</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$fieldId</code> &ndash; (string/integer/false) an optional, specific uploaded file (default: false = display all)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of video URLs to retrieve (default: false = display all)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_audio_url()</code></td>
		<td>Returns url(s) of uploaded audio file(s). Currently supported audio formats: mp3, ogg, wma, m4a, wav.
			Syntax: <code>$audio_urls = usp_audio_url(false, false, false); foreach ($audio_urls as $audio_url) echo $audio_url;</code></td>
		<td><ul>
				<li><code>$postId</code> &ndash; (string/integer/false) the post to check (default: none or current ID when used in loop)</li>
				<li><code>$fieldId</code> &ndash; (string/integer/false) an optional, specific uploaded file (default: false = display all)</li>
				<li><code>$number</code> &ndash; (string/integer/false) the number of audio URLs to retrieve (default: false = display all)</li>
			</ul>
		</td>
	</tr>
</table>
<h4>Further USP Template Tags</h4>
<table class="usp-table">
	<tr>
		<th>Tag Name</th>
		<th>Tag Description</th>
		<th>Parameter Definitions</th>
	</tr>
	<tr>
		<td><code>usp_get_form_id()</code></td>
		<td>Returns the post ID based on id or slug. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$form_id = usp_get_form_id($form_id);</code></td>
		<td><ul>
				<li><code>$form_id</code> &ndash; (string/integer) (required) the post ID (id or slug)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_ip()</code></td>
		<td>Returns the current IP address. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$ip_address = usp_get_ip();</code></td>
		<td><ul>
				<li>No parameters for this template tag.</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_is_contact()</code></td>
		<td>Checks if form is contact form, returns true or false. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$is_contact = usp_is_contact($form_id);</code></td>
		<td><ul>
				<li><code>$form_id</code> &ndash; (string/integer) (required) the post ID (id or slug)</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_check_malicious()</code></td>
		<td>Checks string for malicious input, returns true or false. Meant for use with email input, see source. 
			Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$is_malicious = usp_check_malicious($input);</code></td>
		<td><ul>
				<li><code>$input</code> &ndash; (string) (required) string to check</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_clean()</code></td>
		<td>Cleans up input strings. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$clean_string = usp_clean($string);</code></td>
		<td><ul>
				<li><code>$string</code> &ndash; (string) (required) string to clean</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_return_bytes()</code></td>
		<td>Returns number in bytes. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$bytes = usp_return_bytes($value);</code></td>
		<td><ul>
				<li><code>$value</code> &ndash; (string) (required) string to convert</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_return_bool()</code></td>
		<td>Returns boolean response, &ldquo;Enabled&rdquo; or &ldquo;Disabled&rdquo;. Located in <code>/inc/usp-forms.php</code>. Syntax: <code>$boolean = usp_return_bool($value);</code></td>
		<td><ul>
				<li><code>$value</code> &ndash; (string) (required) string to convert</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><code>usp_get_art_directed()</code></td>
		<td>Includes any art-directed content for the current post. Usage: automatic functionality; just attach to a post any of the custom-fields listed in the next column. 
			Tip: you can auto-attach art-directed custom-fields to submitted posts using a hidden custom input with the following value (for example): 
			<code>label#|name#001|for#001|type#hidden|value# body { color: red; }</code></td>
		<td><ul>
				<li><code>usp-custom-001</code> &ndash; any art-directed CSS (will be wrapped with <code>&lt;style&gt;</code> tags)</li>
				<li><code>usp-custom-002</code> &ndash; any art-directed JavaScript (will be wrapped with <code>&lt;script&gt;</code> tags)</li>
				<li><code>usp-custom-003</code> &ndash; any art-directed text/HTML (will not be wrapped with anything)</li>
			</ul>
		</td>
	</tr>
</table>
<?php $table = ob_get_contents();
ob_end_clean();
return $table;
}
endif;
