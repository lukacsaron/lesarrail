�b2W<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:549:"SELECT  t.*, tt.* FROM ls_terms AS t  INNER JOIN ls_term_taxonomy AS tt ON t.term_id = tt.term_id LEFT JOIN ls_icl_translations icl_t
                                    ON icl_t.element_id = tt.term_taxonomy_id
                                        AND icl_t.element_type IN ('tax_category') WHERE tt.taxonomy IN ('category') AND ( ( icl_t.element_type IN ('tax_category')  AND icl_t.language_code = 'en'  )
                                    OR icl_t.element_type NOT IN ('tax_category') OR icl_t.element_type IS NULL )  ORDER BY tt.count DESC ";s:11:"last_result";a:8:{i:0;O:8:"stdClass":9:{s:7:"term_id";s:1:"3";s:4:"name";s:11:"Restaurants";s:4:"slug";s:11:"restaurants";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"3";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"7";}i:1;O:8:"stdClass":9:{s:7:"term_id";s:1:"1";s:4:"name";s:13:"Uncategorized";s:4:"slug";s:13:"uncategorized";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"1";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"2";}i:2;O:8:"stdClass":9:{s:7:"term_id";s:1:"4";s:4:"name";s:12:"Animal Parks";s:4:"slug";s:12:"animal-parks";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"4";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"2";}i:3;O:8:"stdClass":9:{s:7:"term_id";s:1:"5";s:4:"name";s:19:"Sporting Activities";s:4:"slug";s:19:"sporting-activities";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"5";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"1";}i:4;O:8:"stdClass":9:{s:7:"term_id";s:1:"6";s:4:"name";s:6:"Flying";s:4:"slug";s:6:"flying";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"6";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"1";}i:5;O:8:"stdClass":9:{s:7:"term_id";s:1:"7";s:4:"name";s:4:"Golf";s:4:"slug";s:4:"golf";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"7";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"1";}i:6;O:8:"stdClass":9:{s:7:"term_id";s:1:"8";s:4:"name";s:12:"Wine Tasting";s:4:"slug";s:12:"wine-tasting";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"8";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"1";}i:7;O:8:"stdClass":9:{s:7:"term_id";s:1:"9";s:4:"name";s:29:"Toulouse &amp; Cité d'espace";s:4:"slug";s:21:"toulouse-cite-despace";s:10:"term_group";s:1:"0";s:16:"term_taxonomy_id";s:1:"9";s:8:"taxonomy";s:8:"category";s:11:"description";s:0:"";s:6:"parent";s:1:"0";s:5:"count";s:1:"1";}}s:8:"col_info";a:10:{i:0;O:8:"stdClass":13:{s:4:"name";s:7:"term_id";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:1;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:4:"name";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:29;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:1;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:2;O:8:"stdClass":13:{s:4:"name";s:4:"slug";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:21;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:1;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:3;O:8:"stdClass":13:{s:4:"name";s:10:"term_group";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:4;O:8:"stdClass":13:{s:4:"name";s:16:"term_taxonomy_id";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:1;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:5;O:8:"stdClass":13:{s:4:"name";s:7:"term_id";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:1;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:6;O:8:"stdClass":13:{s:4:"name";s:8:"taxonomy";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:8;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:1;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:7;O:8:"stdClass":13:{s:4:"name";s:11:"description";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:8;O:8:"stdClass":13:{s:4:"name";s:6:"parent";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:9;O:8:"stdClass":13:{s:4:"name";s:5:"count";s:5:"table";s:2:"tt";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:8;s:10:"return_val";i:8;}