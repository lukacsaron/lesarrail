=== USP Pro ===

Contributors: specialk
Donate link: http://plugin-planet.com/usp-pro/
Tags: front-end, forms, usp, user-submit, user-register, contact-form, uploads, files, images, posts
Requires at least: 3.5
Tested up to: 3.9.1
Stable tag: trunk
License: GPL (see license section below for details)
License URI: http://plugin-planet.com/wp/files/usp-pro/license.txt

Create unlimited forms and let visitors submit content, register, and much more from the front-end of your site.

== Description ==

USP Pro is your complete front-end forms solution, enabling you to create unlimited forms and let visitors submit content, register, and much more.

== Installation ==

Installing USP Pro is simple:

1. Unzip the downloaded plugin and upload the `/usp-pro/` folder to the WordPress `/wp-content/plugins/` directory.
2. Done. Visit the Plugins screen in the WP Admin to activate the plugin, then visit the USP Pro settings to configure the plugin and get started.

Note: The USP Pro settings page includes complete information about configuring USP Pro. Visit the Tools tab for more information.

Additional documentation available at [Plugin-Planet.com](http://plugin-planet.com/usp-pro/).

== Frequently Asked Questions ==

Getting started:

* [USP Pro Quick-Start Guide](http://plugin-planet.com/usp-pro-quick-start/)
* [USP Pro Settings](http://plugin-planet.com/usp-pro-settings/)
* [USP Pro Shortcodes](http://plugin-planet.com/usp-pro-shortcodes/)
* [USP Pro Template Tags](http://plugin-planet.com/usp-pro-template-tags/)
* [USP Pro FAQs](http://plugin-planet.com/usp-pro-faqs/)

Further resources:

* [USP Pro Docs](http://plugin-planet.com/usp-pro/docs/)
* [USP Pro Forum](http://plugin-planet.com/usp-pro/forum/)
* [USP Pro Tutorials](http://plugin-planet.com/usp-pro/tuts/)
* [USP Pro News](http://plugin-planet.com/usp-pro/news/)

Feedback and downloads:

* [Bug reports, help requests, and feedback](http://plugin-planet.com/usp-pro/#contact)
* [Log in to your account for current downloads](http://plugin-planet.com/wp/wp-login.php)

You can learn more about USP Pro at [Plugin-Planet.com](http://plugin-planet.com/usp-pro/).

== Screenshots ==

Screenshots and more available at [Plugin-Planet.com](http://plugin-planet.com/usp-pro/).

== Changelog ==

= 1.7 =

* Bugfix: custom field names now properly recognized for all field types
* Bugfix: multiple category select fields now remember values (when enabled)
* Bugfix: custom fields now included properly in contact emails (when enabled)
* Bugfix: "no mail" setting now includes email alerts (so possible to disable all mail)
* Bugfix: custom user fields now may be required or not required (e.g., nicename, firstname, et al)
* Bugfix: for combo submit/register forms, post was being submitted even when registration fails
* New feature: use hidden field to make any form a submit, register, contact form, or combo form
* New feature: support for custom taxonomies (custom categories), includes shortcode and quicktag
* New feature: set submitted posts to "Publish Private" status
* New feature: set submitted posts to "Publish with Password" status (auto-sends password)
* New feature: added custom post status for the Posts screen (sort by custom status)
* New feature: custom email recipients for individual contact forms (via hidden field)
* New feature: carbon copy emails for admin submission, approval, and denied alerts
* New feature: shortcodes for email alerts (submitted, approved, denied)
* New feature: email alerts for submitter and admins when post is approved (published)
* New feature: email alerts for submitter and admins when post is denied (moved to trash)
* New feature: contact-form emails may include custom content with dynamic post variables
* New feature: customize all error messages (visit new "More" settings tab)
* Enhancement: post ID now included in return URL query string
* Enhancement: post ID now attached to submitted posts as custom field "usp-post-id"
* Enhancement: approval email alerts now work for scheduled/future-published posts
* Enhancement: contact email includes custom user fields if included in the form (e.g., nicename, firstname, et al)
* Enhancement: improved data handling in session variable and post content
* Enhancement: streamlined insert_post function for better performance
* Enhancement: increased textarea widths in plugin settings
* Enhancement: error class added to primary form fields for custom styling
* Enhancement: now using wp_generate_password() for user registration passwords
* Enhancement: replaced sanitize_text_field() with sanitize_email() for the email field
* Enhancement: added width and height to allowed attributes in post content
* Enhancement: tweaked the settings description for external stylesheet and JavaScript files
* Enhancement: tweaked the inline styles used for the USP Filter button on Trash screen
* Added localization for French (Thanks to Christophe Glaudel @ http://dnl.chrisglaudel.com/)
* Updated form demos with new hidden fields for register and contact
* Updated localization templates (mo/po) files
* Updated plugin documentation in plugin and on site
* Advance testing on WP 4.0 (alpha)
* General code check and clean

= 1.6 =

* Added support for unlimited custom post types (per-form post types)
* New feature: specify your own prefix for custom fields
* Added field support for parsley.js form validation
* Added support for Garlic (remember form values via jQuery)
* Bugfix: added conditional check to usp_get_art_directed (resolves an error with BuddyPress)
* Bugfix: tweaked code for excluding categories (resolved Illegal string offset error)
* Custom field names may now include dashes/hyphens
* Cleaned up custom field processing and field remembering
* Bugfix: added headers to approval emails (thanks to Mike Edwards @ http://leanintuit.com/)
* Bugfix: corrected wording of "from" options in contact form settings
* Updated localization templates (mo/po) files
* Updated plugin documentation in plugin and on site
* Further testing with WP version 3.9
* General code check and clean

= 1.5 =

* Renamed "usp_init" to "usp_pro_init" in usp-pro.php
* Added "exclude" parameter to category shortcode and quicktag
* Bugfix: defined default category-level class in category field
* Added display_usp_form template tag for displaying USP Forms
* Now supports forms that post content and send email via usp-send-mail
* Added option to include or not any custom fields in email content
* Bugfix: nested shortcodes for usp_is_submission, usp_access, usp_visitor, usp_member
* Added html_entity_decode to email message for post approvals, admin alerts, user alerts
* Bugfix: usp_error_post parameter was not being cleared on successful form submission
* Added fallback functionality for exif_imagetype
* New feature: create new categories on form submission
* Bugfix: textarea custom fields remember their input values
* Increased the maximum number of images from 20 to 99
* Updated plugin documentation in plugin and on site
* Advance testing on development WP version 3.9-beta2
* General code check and clean

= 1.4 =

* Bugfix: renamed "init" to "usp_init" in usp-pro.php
* usp_require_wp_version() now runs only on plugin activation
* Bugfix: removed "'test '." string from usp_get_meta() output
* Changed "POST NAME" to "AUTHOR NAME" in process.php line 882
* Bugfix: resolved error when using "No Limit" for file uploads
* New Feature: WP Visual Editor now works with custom textareas
* New Feature: Now can has multiple Visual Editors per USP Form
* New Feature: Option to use the Name field as the post author
* Advance testing on development WP version 3.9-alpha-nightly
* Updated localization mo/po templates
* General code check and clean

= 1.3 =

* New feature: added option to use Google reCAPTCHA instead of default Challenge Question
* New feature: added option to require post titles to be unique
* New feature: added option to specify the "From" address for contact forms
* Bugfix: max_files setting now updates correctly
* Bugfix: files input now handles single-file uploads properly
* Bugfix: custom fields work with any alphanumeric value for input "name" attribute
* Bugfix: auto-display images now applies only to user-submitted
* Bugfix: contact form now working properly for multiple forms and custom fields
* Improved code for min_files setting for better functionality
* Improved logic for error handling and markup for default messages
* Increased default number of characters for file upload input field
* Replaced sanitize_text_field with htmlspecialchars for custom field input
* Retested email/alert functionality with Gmail
* Updated inline and online documentation
* Generated new translation (mo/po) files
* General code check and clean

= 1.2 =

* New feature: let users choose their own password when registering
* New feature: custom form redirects (overrides default setting) - includes new USP Quicktag and Shortcode
* New feature: option to use unique file names or overwrite existing files - more info @ http://m0n.co/usp-1
* Bugfix: WYSIWYG Editor was not displaying correctly - more info @ http://m0n.co/usp-2
* Added `href`, `rel`, and `target` attributes to `$allowed_atts` in `usp-pro.php`
* Resolved some lingering PHP strict notices
* General code check and clean

= 1.1 =

* Testing automatic updates

= 1.0 =

* Initial release

== Upgrade Notice ==

Upgrades: Your purchase of USP Pro includes free lifetime upgrades, which include new features, bug fixes, and other improvements. 

__Important!__ Things may have changed in new versions of the plugin. Please copy/paste your current USP settings to a safe place. Then update the plugin as usual. If any settings have changed (they shouldn't), use your backup settings to restore your original configuration.

== License ==

License: USP Pro is comprised of two parts:

* Part 1: Its PHP code is licensed under the GPL license, like WordPress. More info @ http://www.gnu.org/licenses/
* Part 2: Everything else (e.g., CSS, HTML, JavaScript, images, design) is licensed according to the purchased license. More info @ http://plugin-planet.com/usp-pro/store/
	
Without prior written consent from Monzilla Media, you must NOT directly or indirectly: license, sub-license, sell, resell, or provide for free any aspect or component of Part 2.

Copyright 2014 [Monzilla Media](http://monzilla.biz/)