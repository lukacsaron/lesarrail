�\2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:816:"
			SELECT l.ID, post_title, post_content, post_name, post_parent, post_author, post_modified_gmt, post_date, post_date_gmt
			FROM (
				SELECT ID
				FROM ls_posts
				 JOIN ls_icl_translations t
							ON ls_posts.ID = t.element_id
								AND t.element_type = CONCAT('post_', ls_posts.post_type) 
				WHERE post_status = 'publish'
					AND post_password = ''
					AND post_type = 'poi'
					AND post_date != '0000-00-00 00:00:00'
					 AND ( ( t.language_code = 'en' AND ls_posts.post_type  IN ('post','page','attachment','apartment','poi','endorsement','testimonial','activity' )  ) OR ls_posts.post_type  NOT  IN ('post','page','attachment','apartment','poi','endorsement','testimonial','activity' )  )
				ORDER BY post_modified ASC LIMIT 100 OFFSET 0
			)
			o JOIN ls_posts l ON l.ID = o.ID ORDER BY l.ID
		";s:11:"last_result";a:14:{i:0;O:8:"stdClass":9:{s:2:"ID";s:2:"62";s:10:"post_title";s:12:"La Barbacane";s:12:"post_content";s:0:"";s:9:"post_name";s:12:"la-barbacane";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:41:03";s:9:"post_date";s:19:"2016-04-05 19:21:45";s:13:"post_date_gmt";s:19:"2016-04-05 19:21:45";}i:1;O:8:"stdClass":9:{s:2:"ID";s:2:"67";s:10:"post_title";s:19:"Restaurant L'Ecurie";s:12:"post_content";s:0:"";s:9:"post_name";s:18:"restaurant-lecurie";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-22 06:47:18";s:9:"post_date";s:19:"2016-04-08 01:13:53";s:13:"post_date_gmt";s:19:"2016-04-08 01:13:53";}i:2;O:8:"stdClass":9:{s:2:"ID";s:2:"68";s:10:"post_title";s:18:"Le Jardin en Ville";s:12:"post_content";s:0:"";s:9:"post_name";s:18:"le-jardin-en-ville";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:40:30";s:9:"post_date";s:19:"2016-04-08 01:14:59";s:13:"post_date_gmt";s:19:"2016-04-08 01:14:59";}i:3;O:8:"stdClass":9:{s:2:"ID";s:2:"69";s:10:"post_title";s:7:"Le Parc";s:12:"post_content";s:0:"";s:9:"post_name";s:7:"le-parc";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:40:12";s:9:"post_date";s:19:"2016-04-08 01:15:27";s:13:"post_date_gmt";s:19:"2016-04-08 01:15:27";}i:4;O:8:"stdClass":9:{s:2:"ID";s:2:"70";s:10:"post_title";s:12:"Côté Ferme";s:12:"post_content";s:0:"";s:9:"post_name";s:10:"cote-ferme";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:39:56";s:9:"post_date";s:19:"2016-04-08 01:15:58";s:13:"post_date_gmt";s:19:"2016-04-08 01:15:58";}i:5;O:8:"stdClass":9:{s:2:"ID";s:2:"71";s:10:"post_title";s:25:"L'Abbaye-Chateau de Camon";s:12:"post_content";s:0:"";s:9:"post_name";s:24:"labbaye-chateau-de-camon";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:28:27";s:9:"post_date";s:19:"2016-04-08 01:21:20";s:13:"post_date_gmt";s:19:"2016-04-08 01:21:20";}i:6;O:8:"stdClass":9:{s:2:"ID";s:2:"73";s:10:"post_title";s:13:"Domaine Gayda";s:12:"post_content";s:0:"";s:9:"post_name";s:13:"domaine-gayda";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:28:48";s:9:"post_date";s:19:"2016-04-08 01:20:41";s:13:"post_date_gmt";s:19:"2016-04-08 01:20:41";}i:7;O:8:"stdClass":9:{s:2:"ID";s:2:"74";s:10:"post_title";s:10:"Dinosauria";s:12:"post_content";s:0:"";s:9:"post_name";s:10:"dinosauria";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:41:17";s:9:"post_date";s:19:"2016-04-08 01:23:37";s:13:"post_date_gmt";s:19:"2016-04-08 01:23:37";}i:8;O:8:"stdClass":9:{s:2:"ID";s:2:"75";s:10:"post_title";s:28:"Réserve Africaine de Sigean";s:12:"post_content";s:0:"";s:9:"post_name";s:27:"reserve-africaine-de-sigean";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:20:48";s:9:"post_date";s:19:"2016-04-08 01:24:17";s:13:"post_date_gmt";s:19:"2016-04-08 01:24:17";}i:9;O:8:"stdClass":9:{s:2:"ID";s:2:"80";s:10:"post_title";s:19:"Lac de la Cavayère";s:12:"post_content";s:0:"";s:9:"post_name";s:18:"lac-de-la-cavayere";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-04-30 00:20:19";s:9:"post_date";s:19:"2016-04-08 01:28:24";s:13:"post_date_gmt";s:19:"2016-04-08 01:28:24";}i:10;O:8:"stdClass":9:{s:2:"ID";s:2:"83";s:10:"post_title";s:18:"Carcassone Airport";s:12:"post_content";s:0:"";s:9:"post_name";s:18:"carcassone-airport";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"1";s:17:"post_modified_gmt";s:19:"2016-05-03 09:53:17";s:9:"post_date";s:19:"2016-04-08 01:31:55";s:13:"post_date_gmt";s:19:"2016-04-08 01:31:55";}i:11;O:8:"stdClass":9:{s:2:"ID";s:3:"336";s:10:"post_title";s:22:"Château de Gourgazaud";s:12:"post_content";s:0:"";s:9:"post_name";s:21:"chateau-de-gourgazaud";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"2";s:17:"post_modified_gmt";s:19:"2016-04-30 00:19:18";s:9:"post_date";s:19:"2016-04-21 17:14:58";s:13:"post_date_gmt";s:19:"2016-04-21 17:14:58";}i:12;O:8:"stdClass":9:{s:2:"ID";s:3:"337";s:10:"post_title";s:19:"Golf de Carcassonne";s:12:"post_content";s:0:"";s:9:"post_name";s:19:"golf-de-carcassonne";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"2";s:17:"post_modified_gmt";s:19:"2016-04-30 00:19:01";s:9:"post_date";s:19:"2016-04-21 17:21:45";s:13:"post_date_gmt";s:19:"2016-04-21 17:21:45";}i:13;O:8:"stdClass":9:{s:2:"ID";s:3:"338";s:10:"post_title";s:25:"Toulouse & Cité d'espace";s:12:"post_content";s:0:"";s:9:"post_name";s:21:"toulouse-cite-despace";s:11:"post_parent";s:1:"0";s:11:"post_author";s:1:"2";s:17:"post_modified_gmt";s:19:"2016-04-30 00:18:43";s:9:"post_date";s:19:"2016-04-21 17:26:28";s:13:"post_date_gmt";s:19:"2016-04-21 17:26:28";}}s:8:"col_info";a:9:{i:0;O:8:"stdClass":13:{s:4:"name";s:2:"ID";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:3;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:10:"post_title";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:28;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:2;O:8:"stdClass":13:{s:4:"name";s:12:"post_content";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:3;O:8:"stdClass":13:{s:4:"name";s:9:"post_name";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:27;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:4;O:8:"stdClass":13:{s:4:"name";s:11:"post_parent";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:5;O:8:"stdClass":13:{s:4:"name";s:11:"post_author";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:6;O:8:"stdClass":13:{s:4:"name";s:17:"post_modified_gmt";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:7;O:8:"stdClass":13:{s:4:"name";s:9:"post_date";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:8;O:8:"stdClass":13:{s:4:"name";s:13:"post_date_gmt";s:5:"table";s:1:"l";s:3:"def";s:0:"";s:10:"max_length";i:19;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:8:"datetime";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:14;s:10:"return_val";i:14;}