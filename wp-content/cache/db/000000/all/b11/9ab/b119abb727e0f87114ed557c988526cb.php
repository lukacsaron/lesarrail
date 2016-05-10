Î[2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:406:"
			SELECT MAX(p.post_modified_gmt) AS lastmod
			FROM	ls_posts AS p
			INNER JOIN ls_term_relationships AS term_rel
				ON		term_rel.object_id = p.ID
			INNER JOIN ls_term_taxonomy AS term_tax
				ON		term_tax.term_taxonomy_id = term_rel.term_taxonomy_id
				AND		term_tax.taxonomy = 'category'
				AND		term_tax.term_id = 8
			WHERE	p.post_status IN ('publish','inherit')
				AND		p.post_password = ''
		";s:11:"last_result";a:1:{i:0;O:8:"stdClass":1:{s:7:"lastmod";s:19:"2016-04-30 00:19:18";}}s:8:"col_info";a:1:{i:0;O:8:"stdClass":13:{s:4:"name";s:7:"lastmod";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:1;s:10:"return_val";i:1;}