@\2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:591:"
			SELECT COUNT(ID)
			FROM ls_posts
			 JOIN ls_icl_translations t
							ON ls_posts.ID = t.element_id
								AND t.element_type = CONCAT('post_', ls_posts.post_type) 
			WHERE post_status IN ('publish','inherit')
				AND post_password = ''
				AND post_date != '0000-00-00 00:00:00'
				AND post_type = 'post'
				 AND ( ( t.language_code = 'en' AND ls_posts.post_type  IN ('post','page','attachment','apartment','poi','endorsement','testimonial','activity' )  ) OR ls_posts.post_type  NOT  IN ('post','page','attachment','apartment','poi','endorsement','testimonial','activity' )  )
		";s:11:"last_result";a:1:{i:0;O:8:"stdClass":1:{s:9:"COUNT(ID)";s:1:"2";}}s:8:"col_info";a:1:{i:0;O:8:"stdClass":13:{s:4:"name";s:9:"COUNT(ID)";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:1;s:10:"return_val";i:1;}