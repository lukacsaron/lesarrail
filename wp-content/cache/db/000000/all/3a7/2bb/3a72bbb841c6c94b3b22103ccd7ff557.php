V$W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:330:"SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM ls_posts  JOIN ls_icl_translations t ON t.element_id = ls_posts.ID AND t.element_type='post_post' WHERE post_type = 'post' AND post_status = 'publish' AND language_code = 'en' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC ";s:11:"last_result";a:2:{i:0;O:8:"stdClass":3:{s:4:"year";s:4:"2016";s:5:"month";s:1:"4";s:5:"posts";s:1:"1";}i:1;O:8:"stdClass":3:{s:4:"year";s:4:"2014";s:5:"month";s:2:"10";s:5:"posts";s:1:"1";}}s:8:"col_info";a:3:{i:0;O:8:"stdClass":13:{s:4:"name";s:4:"year";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:4;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:5:"month";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:2;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:2;O:8:"stdClass":13:{s:4:"name";s:5:"posts";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:2;s:10:"return_val";i:2;}