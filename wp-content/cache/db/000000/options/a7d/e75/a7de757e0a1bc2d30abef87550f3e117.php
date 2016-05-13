¦c2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:333:"	SELECT element_id, language_code
						FROM ls_icl_translations
						WHERE trid =
							(SELECT trid
							 FROM ls_icl_translations
							 WHERE element_type = 'post_page'
							 AND element_id = (SELECT option_value
											   FROM ls_options
											   WHERE option_name='page_for_posts'
											   LIMIT 1))
						";s:11:"last_result";a:0:{}s:8:"col_info";a:2:{i:0;O:8:"stdClass":13:{s:4:"name";s:10:"element_id";s:5:"table";s:19:"ls_icl_translations";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:1;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:13:"language_code";s:5:"table";s:19:"ls_icl_translations";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}