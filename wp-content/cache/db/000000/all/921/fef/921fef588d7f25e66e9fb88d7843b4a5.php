B\2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:422:"
			SELECT l.ID, post_title, post_content, post_name, post_parent, post_author, post_modified_gmt, post_date, post_date_gmt
			FROM (
				SELECT ID
				FROM ls_posts
				
				WHERE post_status = 'publish'
					AND post_password = ''
					AND post_type = 'usp_form'
					AND post_date != '0000-00-00 00:00:00'
					
				ORDER BY post_modified ASC LIMIT 100 OFFSET 0
			)
			o JOIN ls_posts l ON l.ID = o.ID ORDER BY l.ID
		";s:11:"last_result";a:2:{i:0;O:8:"stdClass":9:{s:2:"ID";s:3:"120";s:10:"post_title";s:17:"Contact Form Demo";s:12:"post_content";s:700:"[usp_name class="" placeholder="" label="" required="" max=""]
[usp_email class="" placeholder="" label="" required="" max=""]
[usp_custom_field form="120" id="1"]
[usp_custom_field form="120" id="2"]
[usp_custom_field form="120" id="3"]
[usp_custom_field form="120" id="4"]
[usp_custom_field form="120" id="5"]
[usp_custom_field form="120" id="6"]
[usp_custom_field form="120" id="8"]
[usp_content class="" placeholder=" " label="Comments" required="" max="" cols="" rows="" richtext=""]
[usp_captcha class="captcha" placeholder="?" label="3+2=" max="10"]
[usp_custom_field form="120" id="7"]
<input class="form-control col-md-6 col-xs-12" name="usp-send-mail" type="hidden" value="1" />";s:9:"post_name";s:9:"contact-2";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"2";s:17:"post_modified_gmt";s:19:"2016-05-10 21:44:59";s:9:"post_date";s:19:"2016-04-12 16:08:44";s:13:"post_date_gmt";s:19:"2016-04-12 16:08:44";}i:1;O:8:"stdClass":9:{s:2:"ID";s:3:"552";s:10:"post_title";s:17:"Contact Form Demo";s:12:"post_content";s:703:"[usp_name class="" placeholder="" label="Nom" required="" max=""]
[usp_email class="" placeholder="" label="" required="" max=""]
[usp_custom_field form="552" id="1"]
[usp_custom_field form="552" id="2"]
[usp_custom_field form="552" id="3"]
[usp_custom_field form="552" id="4"]
[usp_custom_field form="552" id="5"]
[usp_custom_field form="552" id="6"]
[usp_custom_field form="552" id="8"]
[usp_content class="" placeholder=" " label="Comments" required="" max="" cols="" rows="" richtext=""]
[usp_captcha class="captcha" placeholder="?" label="3+2=" max="10"]
[usp_custom_field form="552" id="7"]
<input class="form-control col-md-6 col-xs-12" name="usp-send-mail" type="hidden" value="1" />";s:9:"post_name";s:17:"contact-form-demo";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"2";s:17:"post_modified_gmt";s:19:"2016-05-10 21:57:39";s:9:"post_date";s:19:"2016-04-28 19:31:00";s:13:"post_date_gmt";s:19:"2016-04-28 19:31:00";}}s:8:"col_info";a:9:{i:0;O:8:"stdClass":13:{s:4:"name";s:2:"ID";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:3;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:10:"post_title";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:17;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:2;O:8:"stdClass":13:{s:4:"name";s:12:"post_content";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:703;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:3;O:8:"stdClass":13:{s:4:"name";s:9:"post_name";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:17;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:4;O:8:"stdClass":13:{s:4:"name";s:11:"post_parent";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:5;O:8:"stdClass":13:{s:4:"name";s:11:"post_author";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:6;O:8:"stdClass":13:{s:4:"name";s:17:"post_modified_gmt";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:7;O:8:"stdClass":13:{s:4:"name";s:9:"post_date";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:8;O:8:"stdClass":13:{s:4:"name";s:13:"post_date_gmt";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:2;s:10:"return_val";i:2;}