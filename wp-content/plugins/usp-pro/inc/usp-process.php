<?php // USP Pro - Form Processing

if (!defined('ABSPATH')) die();

/*
	Class: Process submitted forms
*/
if (!class_exists('USP_Pro_Process')) {
	class USP_Pro_Process {
		public function __construct() {
			add_action('init', array(&$this, 'init'));
			//
			require_once (ABSPATH . '/wp-admin/includes/media.php');
			require_once (ABSPATH . '/wp-admin/includes/file.php');
			require_once (ABSPATH . '/wp-admin/includes/image.php');
		}
		public function init() {
			add_action('parse_request', array(&$this, 'insert_post'));
			add_action('new_to_publish', array(&$this, 'send_email_approval'));
			add_action('draft_to_publish', array(&$this, 'send_email_approval'));
			add_action('pending_to_publish', array(&$this, 'send_email_approval'));
			add_filter('query_vars', array(&$this, 'add_query_vars'));
			add_action('trash_post', array(&$this, 'send_email_denied'), 1, 1);
			add_action('transition_post_status', array(&$this, 'send_email_future'), 10, 3);
		}
		public function insert_post() {
			global $usp_admin, $usp_general;
			
			$use_author     = $usp_general['use_author'];
			$assign_author  = $usp_general['assign_author'];
			
			$args = $this->get_field_val();
			
			$fields       = $args['fields'];
			$errors       = $args['errors'];
			$contact      = $args['contact'];
			$register     = $args['register'];
			$post_submit  = $args['post_submit'];
			$send_mail    = $args['send_mail'];
			$logged_id    = $args['logged_id'];
			$logged_cats  = $args['logged_cats'];
			$default_tags = $args['default_tags'];
			$default_cats = $args['default_cats'];
			$usp_redirect = $args['usp_redirect'];
			$custom_type  = $args['usp_custom_type'];
			$contact_ids  = $args['contact_ids'];
			
			$errors_active = $errors;
			$errors_display = array();
			
			if (!isset($_POST['usp_form_submit']) || !isset($_POST['PHPSESSID']) || !empty($_POST['usp-verify']) || !wp_verify_nonce($_POST['usp_form_submit'], 'usp_form_submit')) {
				return false;
			} else {
				$user_id        = $assign_author;
				$redirect_type  = 'redirect_failure';
				$include_path   = ABSPATH . 'wp-admin/includes/user.php';
				$custom_content = '';
				$error_register = '';
				$error_post     = '';
				$error_mail     = '';
				$check_id       = '';
				$post_id        = '';
				
				$submitted_form = $_POST['usp_form_submit'];
				if ($submitted_form) $this->set_session_vars();
				
				$session_check = $_POST['PHPSESSID'];
				if ($session_check) $this->check_session();
				
				$errors_display = array();
				foreach ($errors_active as $error) {
					if (isset($error) && !empty($error)) {
						if (is_array($error)) {
							foreach ($error as $k => $v) $errors_display[(string)$k] = $v;
						} else {
							$errors_display[$error] = $error;
						}
					}
				}
				if (empty($errors_display)) {
					
					// register
					if ($register) {
						if (!empty($logged_id)) {
							if ($use_author) $user_id = $logged_id;
							$error_register = 'user_exists';
						} else {
							$user_data = $this->usp_register_user($fields);
							if (isset($user_data['usp_error_register']) && !empty($user_data['usp_error_register'])) {
								$error_register = $user_data['usp_error_register'];
							} else {
								if (isset($user_data['user_id']) && !empty($user_data['user_id'])) {
									$user_id  = $user_data['user_id'];
									$check_id = $user_data['user_id'];
								}
								$redirect_type = 'redirect_register';
							}
						}
					}
					
					// post
					if (empty($error_register) && !$contact) {
						if ($post_submit || !$register) {
							if (!$send_mail || ($send_mail && $post_submit)) {
								if (!empty($logged_id)) {
									if ($use_author) $user_id = $logged_id;
								}
								$post_id = $this->usp_submit_post($fields, $user_id, $logged_cats, $default_tags, $default_cats, $custom_type);
								if (!empty($post_id) && is_numeric($post_id)) {
									if ($redirect_type == 'redirect_register') $redirect_type = 'redirect_both';
									else $redirect_type = 'redirect_post';
								} else {
									if ($post_id == 'duplicate') $error_post = 'post_duplicate';
									else $error_post = 'post_required';
									$redirect_type  = 'redirect_failure';
									if (is_file($include_path) && is_numeric($check_id)) {
										require_once($include_path);
										wp_delete_user($check_id);
									}
								}
							}
						}
					}
					
					// contact
					if (empty($error_register) && empty($error_post)) {
						if ($contact || $send_mail) {
							if ($post_submit && is_numeric($post_id)) {
								$custom_content = $usp_admin['custom_content'];
							}
							$email_sent = $this->send_email_form($fields, $contact_ids, $custom_content, $post_id);
							if ($email_sent) {
								if ($redirect_type == 'redirect_register') $redirect_type = 'redirect_email_register';
								elseif ($redirect_type == 'redirect_post') $redirect_type = 'redirect_email_post';
								elseif ($redirect_type == 'redirect_both') $redirect_type = 'redirect_email_both';
								else $redirect_type = 'redirect_email';
							} else { 
								$error_mail = 'email_error';
							}
						}
					}
					
					// errors
					if (!empty($error_register)) $errors_display['usp_error_register'] = $error_register;
					if (!empty($error_post))     $errors_display['usp_error_post']     = $error_post;
					if (!empty($error_mail))     $errors_display['usp_error_mail']     = $error_mail;
				}
				
				$errors_args = array('errors_display' => $errors_display, 'redirect_type' => $redirect_type);
				$this->submission_redirect($usp_redirect, $errors_args, $post_id);
			}
		}
		// REGISTER
		public function usp_register_user($fields) {
			global $usp_general;
			$usp_role = $usp_general['assign_role'];
			$user_id = $usp_general['assign_author'];
			$usp_pass = $this->generate_password($fields);
			$error_register = '';
			$usp_user = array(
				'role'          => $usp_role,
				'user_pass'     => $usp_pass, 
				'user_login'    => $fields['usp_author'],
				'user_email'    => $fields['usp_email'], 
				'user_url'      => $fields['usp_url'],
				'user_nicename' => $fields['usp_nicename'],
				'display_name'  => $fields['usp_displayname'],
				'nickname'      => $fields['usp_nickname'],
				'first_name'    => $fields['usp_firstname'],
				'last_name'     => $fields['usp_lastname'],
				'description'   => $fields['usp_description'],
			);
			if (!username_exists($fields['usp_author'])) {
				if (!email_exists($fields['usp_email'])) {
					$user_id = wp_insert_user($usp_user);
					if (is_numeric($user_id)) wp_new_user_notification($user_id, $usp_pass);
				} else {
					$error_register = 'error_email';
				}
			} else {
				$error_register = 'error_username';
			}
			$args = array('user_id' => $user_id, 'usp_error_register' => $error_register);
			return $args;
		}
		// POST
		public function usp_submit_post($fields, $user_id, $logged_cats, $default_tags, $default_cats, $custom_type) {
			global $usp_advanced, $usp_general;
			if ($usp_general['titles_unique']) {
				$check_post = get_page_by_title($fields['usp_title'], OBJECT, $usp_advanced['post_type']);
				if ($check_post && $check_post->ID) return 'duplicate';
			}
			if (!empty($custom_type)) $post_type = $custom_type;
			else $post_type = $this->post_type();

			$post_tags = $this->post_tags($fields, $default_tags);
			$post_status = $this->post_status($fields);
			$post_id = $this->post_content($fields, $user_id, $post_tags, $post_status, $post_type);
			if (!empty($post_id)) {
				$post_meta = $this->post_meta($fields, $user_id, $post_id);
				$post_files = $this->insert_attachments($fields, $post_id);
				$post_categories = $this->post_categories($fields['usp_category'], $logged_cats, $default_cats, $post_id, $post_type);
				$post_taxonomies = $this->post_taxonomies($fields['usp_taxonomy'], $post_id);
				//
				$submit_email = $fields['usp_email'];
				$meta_email   = get_post_meta($post_id, 'usp-email', true);
				
				if (!empty($submit_email)) $user_email = $submit_email;
				elseif (!empty($meta_email)) $user_email = $meta_email;
				else $user_email = '';
				
				$this->send_email_alert(array('user_id' => $user_id, 'usp_email' => $user_email, 'post_id' => $post_id));
			} else {
				$post_id = '';
			}
			return $post_id;
		}
		public function post_taxonomies($taxonomy, $post_id) {
			if (!empty($taxonomy)) {
				$terms = array();
				$term_ids = array();
				foreach ($taxonomy as $key => $value) {
					if (is_array($value)) {
						foreach ($value as $val) {
							$terms[] = (int) $val;
						}
						$term_ids = wp_set_object_terms($post_id, $terms, $key);
					} else {
						$terms[] = (int) $value;
						$term_ids = wp_set_object_terms($post_id, $terms, $key);
					}
				}
				if (!is_wp_error($term_ids)) return $term_ids;
			}
		}
		public function post_type() {
			global $usp_advanced;
			if ($usp_advanced['post_type'] == 'other') {
				if (post_type_exists($usp_advanced['other_type'])) $post_type = $usp_advanced['other_type'];
				else $post_type = 'post';
			} else {
				$post_type = $usp_advanced['post_type'];
			}
			return $post_type;
		}
		public function post_tags($fields, $default_tags) {
			$post_tags = '';
			if (!empty($default_tags)) {
				$default_tags = trim($default_tags);
				$default_tags = explode("|", $default_tags);
				foreach ($default_tags as $default_tag) {
					$post_tag = get_term_by('id', intval(trim($default_tag)), 'post_tag', ARRAY_A);
					if (!$post_tag) continue;
					$post_tags .= $post_tag['name'] . ', ';
				}
			}
			if (!empty($fields['usp_tags'])) {
				$user_tags = $fields['usp_tags'];
				if (is_array($user_tags)) {
					foreach ($user_tags as $user_tag) {
						$post_tag = get_term_by('id', intval($user_tag), 'post_tag', ARRAY_A);
						if (!$post_tag) continue;
						$post_tags .= $post_tag['name'] . ', ';
					}
				} else {
					$user_tags = trim($fields['usp_tags']);
					$user_tags = explode(",", $user_tags);
					foreach ($user_tags as $user_tag) {
						if (is_numeric($user_tag)) {
							$post_tag = get_term_by('id', intval($user_tag), 'post_tag', ARRAY_A);
							$post_tags .= $post_tag['name'] . ', ';
						} else {
							$post_tags .= $user_tag . ', ';
						}
					}
				}
			}
			$post_tags = rtrim(trim($post_tags), ',');
			return $post_tags;
		}
		public function post_status($fields) {
			global $usp_general;
			$setting = $usp_general['number_approved'];
			$custom = $usp_general['custom_status'];
			if ($setting == -5) {
				$post_status = 'password';
			} elseif ($setting == -4) {
				$post_status = 'private';
			} elseif ($setting == -3) {
				$post_status = $custom;
			} elseif ($setting == -2) {
				$post_status = 'pending';
			} elseif ($setting == -1) {
				$post_status = 'draft';
			} elseif ($setting == 0) {
				$post_status = 'publish';
			} else {
				$counter = 0;
				$posts = get_posts(array('post_status' => 'publish', 'meta_key' => 'usp-author', 'meta_value' => $fields['usp_author']));
				foreach ($posts as $post) $counter++;
				if ($counter >= $setting) $post_status = 'publish';
				else $post_status = 'draft'; // default
			}
			return $post_status;
		}
		public function post_content($fields, $user_id, $post_tags, $post_status, $post_type) {
			global $usp_advanced;
			$args = $this->post_password($post_status, $fields);
			$content = $this->sanitize_content($fields['usp_content']);
			
			if ($usp_advanced['html_content'] !== '') {
				$usp_post = array(
					'post_author'   => $user_id,
					'post_content'  => $content,
					'post_type'     => $post_type,
					'tags_input'    => $post_tags,
					'post_title'    => $fields['usp_title'],
					'post_status'   => $args['post_status'],
					'post_password' => $args['password'],
				);
				remove_filter('content_save_pre', 'wp_filter_post_kses');
				remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
				$post_id = wp_insert_post($usp_post);
				add_filter('content_save_pre', 'wp_filter_post_kses');
				add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
			} else {
				$usp_post = array(
					'post_author'   => $user_id,
					'post_content'  => $content,
					'post_type'     => $post_type,
					'tags_input'    => $post_tags,
					'post_title'    => $fields['usp_title'],
					'post_status'   => $args['post_status'],
					'post_password' => $args['password'],
				);
				$post_id = wp_insert_post($usp_post);
			}
			if (isset($fields['usp_format']) && !empty($fields['usp_format'])) $post_format = strtolower($fields['usp_format']);
			else $post_format = 'standard';
			$set_format = set_post_format($post_id, $post_format);
			return $post_id;
		}
		public function post_password($post_status, $fields) {
			global $usp_admin;
			$password = '';
			if ($post_status == 'password') {
				$post_status = 'publish';
				$password = wp_generate_password();
				if ($usp_admin['send_mail'] !== 'no_mail') {
					$blog_name = get_bloginfo();
					$blog_url = trailingslashit(get_bloginfo('url'));
					
					$admin_name = trim($usp_admin['admin_name']);
					$admin_from = trim($usp_admin['admin_from']);
					
					$headers  = '';
					$headers .= 'From: '. $admin_name .' <'. $admin_from .'>'. "\r\n";
			
					if (isset($fields['usp_author'])) $post_author = $fields['usp_author'];
					else $post_author = __('Guest', 'usp');
					
					if (isset($_POST['usp-email']))      $email = sanitize_text_field($_POST['usp-email']);
					elseif (isset($fields['usp_email'])) $email = sanitize_text_field($fields['usp_email']);
					
					$subject  = __('Information about your submitted post.', 'usp');
					$message  = __('Hello ', 'usp') . $post_author . ', '. "\r\n\n";
					$message .= __('Here is the password for your submitted post: ', 'usp') . $password . "\r\n";
					$message .= __('Visit your post at ', 'usp') . $blog_name . ': ' .$blog_url . "\r\n";
					
					if ($usp_admin['send_mail'] == 'wp_mail') wp_mail($email, $subject, $message, $headers);
					else                                         mail($email, $subject, $message, $headers);
				}
			}
			return array('password' => $password, 'post_status' => $post_status);
		}
		public function post_meta($fields, $user_id, $post_id) {
			global $usp_general, $usp_advanced;
			
			$prefix = 'null___';
			if (isset($usp_advanced['custom_prefix']) && !empty($usp_advanced['custom_prefix'])) $prefix = $usp_advanced['custom_prefix'];
			
			if (!empty($fields['usp_custom'])) {
				foreach ($fields['usp_custom'] as $key => $value) {
					if (preg_match("/^usp-custom-([0-9a-z_-]+)$/i", $key, $match)) {
						if (strpos($match[1], '-required') === false) {
							if (is_array($value)) {
								foreach ($value as $k => $v) {
									if (!empty($v)) $post_meta = add_post_meta($post_id, 'usp-custom-'. $match[1], $v);
								}
							} else {
								if (!empty($value)) $post_meta = add_post_meta($post_id, 'usp-custom-'. $match[1], $value);
							}
						}
					} elseif (preg_match("/^$prefix([0-9a-z_-]+)$/i", $key, $match)) {
						if (strpos($match[1], '-required') === false) {
							if (is_array($value)) {
								foreach ($value as $k => $v) {
									if (!empty($v)) $post_meta = add_post_meta($post_id, $prefix . $match[1], $v);
								}
							} else {
								if (!empty($value)) $post_meta = add_post_meta($post_id, $prefix . $match[1], $value);
							}
						}
					}
				}
			}
			if (!empty($user_id))              $post_author_id = add_post_meta($post_id, 'usp-author-id', $user_id);
			if (!empty($fields['usp_author'])) $post_author    = add_post_meta($post_id, 'usp-author', $fields['usp_author']);
			if (!empty($fields['usp_email']))  $post_email     = add_post_meta($post_id, 'usp-email', $fields['usp_email']);
			if (!empty($fields['usp_url']))    $post_url       = add_post_meta($post_id, 'usp-url', $fields['usp_url']);
			$is_submission = add_post_meta($post_id, 'is_submission', true);
			$has_post_id = add_post_meta($post_id, 'usp-post-id', $post_id);
			
			if (isset($usp_general['enable_stats']) && !empty($usp_general['enable_stats'])) {
				$stats = $this->get_user_stats();
				if (!empty($stats)) {
					foreach ($stats as $meta_key => $meta_value) {
						if (!empty($meta_value)) $post_meta = add_post_meta($post_id, $meta_key, $meta_value);
					}
				}
			}
			if ($is_submission) return true;
			else return false;
		}
		public function insert_attachments($fields, $post_id) {	
			global $usp_uploads;
			
			if (isset($fields['usp_files'])) $files = $fields['usp_files'];
			else $files = '';
			
			if (isset($fields['usp_alt'])) $alt = $fields['usp_alt'];
			else $alt = '';

			if (isset($fields['usp_caption'])) $caption = $fields['usp_caption'];
			else $caption = '';
			
			if (isset($fields['usp_desc'])) $desc = $fields['usp_desc'];
			else $desc = '';
			
			if ($files !== '') {
				$file_data = $files;
				$loop_count = 0;
				
				if (isset($file_data['name'])) {
				
					for ($i = 0; $i < count($file_data['name']); $i++) {
						
						if (!empty($file_data['tmp_name'][$i])) $file_local = file_get_contents($file_data['tmp_name'][$i]);
						else continue;
						if (!empty($file_data['name'][$i])) $file_name = basename($file_data['name'][$i]);
						else continue;
						
						if (!isset($alt[$i])) $alt[$i] = '';
						if (!isset($caption[$i])) $caption[$i] = '';
						if (!isset($desc[$i])) $desc[$i] = '';
						
						$file_path = '/';
						if (defined('USP_UPLOAD_DIR')) $file_path = USP_UPLOAD_DIR;
					
						$upload_dir = wp_upload_dir();
						if (wp_mkdir_p($upload_dir['path'])) $file = $upload_dir['path'] . $file_path . $file_name;
						else $file = $upload_dir['basedir'] . $file_path . $file_name;
						
						$bytes = file_put_contents($file, $file_local);
						//@chmod($file, 0644);
						
						$wp_filetype = wp_check_filetype($file_name, null);
						$attachment = array(
						    'post_mime_type' => $wp_filetype['type'],
						    'post_title'     => sanitize_file_name($file_name),
						    'post_content'   => $desc[$i],
						    'post_excerpt'   => $caption[$i],
						    'post_status'    => 'inherit'
						);
						$attach_id = wp_insert_attachment($attachment, $file, $post_id);
						$attach_data = wp_generate_attachment_metadata($attach_id, $file);
						wp_update_attachment_metadata($attach_id, $attach_data);
						
						if ($usp_uploads['featured_image'] == 1) {
							if (!current_theme_supports('post-thumbnails')) add_theme_support('post-thumbnails');
							if (isset($usp_uploads['featured_key']) && $usp_uploads['featured_key'] !== '0') $image_key = intval($usp_uploads['featured_key']);
							else $image_key = 1;
							if (($i + 1) == $image_key) {
								set_post_thumbnail($post_id, $attach_id);
							}
						}
						if (!is_wp_error($attach_id)) {
							$attach_ids[] = $attach_id;
							$l = $i + 1;
							if (isset($file_data['key'][$i])) {
								if ($file_data['key'][$i] == '0') $file_key = $l;
								else $file_key = $file_data['key'][$i];
							}
							if (isset($file_data['key'][$i])) add_post_meta($post_id, 'usp-file-'. $file_key, wp_get_attachment_url($attach_id));
							else add_post_meta($post_id, 'usp-file', wp_get_attachment_url($attach_id));
							
							if (!empty($desc[$i]))    add_post_meta($post_id, 'usp-desc-'.$file_key, $desc[$i]);
							if (!empty($caption[$i])) add_post_meta($post_id, 'usp-caption-'.$file_key, $caption[$i]);
							if (!empty($alt[$i]))     update_post_meta($attach_id, '_wp_attachment_image_alt', $alt[$i]);
						} else {
							wp_delete_attachment($attach_id);
							return false;
						}
						$loop_count++;
					}
				} else {
					return false;
				}
				if (isset($_FILES)) unset($_FILES);
			} else {
				return false;
			}
			return true;
		}
		public function post_categories($user_cats, $logged_cats, $default_cats, $post_id, $post_type) {
			global $usp_general;
			$post_cats = array();
			if (isset($default_cats) && !empty($default_cats)) {
				$default_cats = trim($default_cats);
				$default_cats = explode("|", $default_cats);
				foreach ($default_cats as $default_cat) $post_cats[] = intval(trim($default_cat));
			}
			if (!empty($logged_cats) && $usp_general['use_cat']) {
				$logged_cats = trim($logged_cats);
				$logged_cats = explode("|", $logged_cats);
				foreach ($logged_cats as $logged_cat) $post_cats[] = intval(trim($logged_cat));
			}
			if (!empty($user_cats)) {
				if (is_array($user_cats)) {
					foreach ($user_cats as $user_cat) $post_cats[] = intval(trim($user_cat));
					
				} else {
					$new_cats[] = array();
					$delimiter = array(',', '|');
					$user_cats = trim($user_cats);
					$user_cats = str_replace($delimiter, ',', $user_cats);
					//
					if (strpos($user_cats, ',')) {
						$user_cats = explode(',', $user_cats);
						foreach ($user_cats as $user_cat) {
							$user_cat = trim($user_cat);
							if (is_numeric($user_cat)) {
								$post_cats[] = intval($user_cat);
							} else {
								$cat = get_term_by('name', $user_cat, 'category', ARRAY_A);
								if (!empty($cat)) {
									if (isset($cat['term_id'])) $post_cats[] = intval($cat['term_id']);
								} else {
									$new_cats[] = wp_insert_term($user_cat, 'category');
								}
							}
						}
					} else {
						if (is_numeric($user_cats)) {
							$post_cats[] = intval($user_cats);
						} else {
							$cat = get_term_by('name', $user_cats, 'category', ARRAY_A);
							if (!empty($cat)) {
								if (isset($cat['term_id'])) $post_cats[] = intval($cat['term_id']);
							} else {
								$new_cats[] = wp_insert_term($user_cats, 'category');
								
							}
						}
					}
					if (!empty($new_cats)) {
						foreach ($new_cats as $new_cat) {
							if (isset($new_cat['term_id']) && !empty($new_cat['term_id'])) {
								$post_cats[] = $new_cat['term_id'];
							}
						}
					}
				}
			}
			if ($post_type == 'post') {
				$post_categories = wp_set_post_categories($post_id, $post_cats);
			} else {
				$post_categories = wp_set_object_terms($post_id, $post_cats, 'category');	
			}
			if (is_array($post_categories) && !is_wp_error($post_categories)) return true;
			else return false;
		}
		public function send_email_form($fields, $contact_ids, $custom_content, $post_id) {
			global $usp_admin, $usp_advanced, $usp_general;
			
			$message_sent  = false;
			$from_prefix   = '';
			$custom_prefix = '';
			
			$from_url      = get_bloginfo('url');
			$charset       = get_option('blog_charset', 'UTF-8');
			
			$send_mail     = $usp_admin['send_mail'];
			$admin_email   = $usp_admin['admin_email'];
			$from_subject  = $usp_admin['contact_subject'];
			
			$from_email    = stripslashes($fields['usp_email']);
			$from_name     = stripslashes($fields['usp_author']);
			$message       = stripslashes($fields['usp_content']) . "\n\n";
			
			if (!empty($usp_admin['contact_from']))       $from_email    = $usp_admin['contact_from'];
			if (!empty($usp_admin['contact_sub_prefix'])) $from_prefix   = $usp_admin['contact_sub_prefix'];
			if (!empty($usp_advanced['custom_prefix']))   $custom_prefix = $usp_advanced['custom_prefix'];
			if (!empty($fields['usp_subject']))           $from_subject  = stripslashes($fields['usp_subject']);
			if (!empty($fields['usp_url']))               $from_url      = stripslashes($fields['usp_url']);
			
			// custom content
			if (!empty($post_id)) {
				$args = $this->get_email_info($post_id);
				$message .= "\n" . $this->regex_filter($custom_content, $args) . "\n";
			}
			
			// custom fields
			if ($usp_admin['contact_custom']) {
				$user_fields = array('usp_nicename', 'usp_displayname', 'usp_nickname', 'usp_firstname', 'usp_lastname', 'usp_description', 'usp_password');
				foreach ($user_fields as $user_field) {
					if (!empty($fields['usp_custom']) || !empty($user_field)) {
						$message .= "\n\n" . 'Additional Information' . "\n" . '----------------------' . "\n\n";
						break;
					}
				}
				foreach ($fields as $key => $value) {
					if (is_array($value)) {
						foreach ($value as $k => $v) {
							if (
								preg_match("/^usp-custom-([0-9a-z_-]+)$/i", $k, $matches) || 
								preg_match("/^$custom_prefix([0-9a-z_-]+)$/i", $k, $matches) || 
								preg_match("/^usp_(nicename|displayname|nickname|firstname|lastname|description|password)/i", $k, $matches)
							) {
								if (isset($usp_advanced['usp_label_c'.$matches[1]]) && !empty($usp_advanced['usp_label_c'.$matches[1]])) {
									if (isset($matches[1])) $data_key = $usp_advanced['usp_label_c'.$matches[1]];
								} else {
									if (isset($matches[1])) $data_key = $matches[1];
								}
								if (!empty($v)) {
									$message .= ucwords($data_key) . ': ' . stripslashes(htmlspecialchars_decode($v, ENT_QUOTES)) . "\n\n";
								}
							}
						}
					} else {
						if (
							preg_match("/^usp-custom-([0-9a-z_-]+)$/i", $key, $matches) || 
							preg_match("/^$custom_prefix([0-9a-z_-]+)$/i", $key, $matches) || 
							preg_match("/^usp_(nicename|displayname|nickname|firstname|lastname|description|password)/i", $key, $matches)
						) {
							if (isset($usp_advanced['usp_label_c'.$matches[1]]) && !empty($usp_advanced['usp_label_c'.$matches[1]])) {
								if (isset($matches[1])) $data_key = $usp_advanced['usp_label_c'.$matches[1]];
							} else {
								if (isset($matches[1])) $data_key = $matches[1];
							}
							if (!empty($value)) {
								$message .= ucwords($data_key) . ': ' . stripslashes(htmlspecialchars_decode($value, ENT_QUOTES)) . "\n\n";
							}
						}
					}
				}
			}
			
			// user stats
			if ($usp_admin['contact_stats']) {
				$stats = $this->get_user_stats();
				$message .=  "\n\n" . 'Message Details' . "\n" . '---------------' . "\n";
				$message .= 'Name: '. $from_name . "\n" .'Email: '. $from_email . "\n" .'URL: '. $from_url . "\n";
				$message .= 'Time: '. $stats['usp-time'] . "\n" .'IP Address: '. $stats['usp-address'] . "\n" .'Request: '. $stats['usp-request'] . "\n";
				$message .= 'Referrer: '. $stats['usp-referer'] . "\n" .'User Agent: '. $stats['usp-agent'] . "\n";
			}
			
			// headers
			$headers  = 'From: '. $from_name .' <'. $from_email .'>'. "\r\n";
			if ($usp_admin['contact_cc_user']) {
				$headers .= 'Cc: '. $from_email . "\r\n";
			}
			if ($usp_admin['contact_cc'] !== '') {
				$cc_emails = trim($usp_admin['contact_cc']);
				$cc_emails = explode(",", $cc_emails);
				foreach ($cc_emails as $email) $headers .= 'Bcc: '. trim($email) . "\r\n";
			}
			$headers .= 'Content-Type: text/plain; charset='. $charset . "\r\n";
			$headers .= 'Content-Transfer-Encoding: 8bit'. "\r\n";

			// recipients
			$contact_emails = array();
			$contact_ids = trim($contact_ids);
			$ids_array = explode(",", $contact_ids);
			foreach ($ids_array as $id) {
				$id = trim($id);
				if (!empty($usp_admin['custom_contact_'.$id])) $contact_emails[] = $usp_admin['custom_contact_'.$id];
			}
			
			// send mail
			if (empty($contact_emails)) {
				if ($send_mail == 'wp_mail') {
					$message_sent = wp_mail($admin_email, $from_prefix . $from_subject, $message, $headers);
				} else {
					if (mail($admin_email, $from_prefix . $from_subject, $message, $headers)) $message_sent = true;
				}
			} else {
				foreach ($contact_emails as $contact_email) {
					if ($send_mail == 'wp_mail') {
						$message_sent = wp_mail($contact_email, $from_prefix . $from_subject, $message, $headers);
					} else {
						if (mail($contact_email, $from_prefix . $from_subject, $message, $headers)) $message_sent = true;
					}
				}
			}
			return $message_sent;
		}
		public function send_email_alert($user) {
			global $usp_admin;
			
			if (isset($user['post_id'])) $post_id = $user['post_id'];
			$args = $this->get_email_info($post_id);
			
			if (isset($args['is_submission'])) $is_submission = $args['is_submission'];
			if (isset($args['admin_name']))    $admin_name    = $args['admin_name'];
			if (isset($args['admin_from']))    $admin_from    = $args['admin_from'];
			if (isset($args['admin_email']))   $admin_email   = $args['admin_email'];
			if (isset($args['user_email']))    $user_email    = $args['user_email'];
			if (isset($args['post_id']))       $post_id       = $args['post_id'];
			//
			if (isset($user['usp_email'])) $user_email = trim($user['usp_email']);
			if (isset($user['user_id']))   $user_id    = $user['user_id'];
			
			$headers  = '';
			$headers .= 'From: '. $admin_name .' <'. $admin_from .'>'. "\r\n";
			
			$subject_user = $usp_admin['alert_subject_user'];
			$message_user = html_entity_decode(stripslashes($usp_admin['post_alert_user']));
			$message_user = $this->regex_filter($message_user, $args);
			
			$subject_admin = $usp_admin['alert_subject_admin'];
			$message_admin = html_entity_decode(stripslashes($usp_admin['post_alert_admin']));
			$message_admin = $this->regex_filter($message_admin, $args);
			
			$cc_submit = trim(esc_attr($usp_admin['cc_submit']));
			$cc_submit_emails = explode(",", $cc_submit);
			$bcc = '';
			foreach ($cc_submit_emails as $email) $bcc .= 'Bcc: '.rtrim(trim($email)) . "\r\n";
			
			if ($usp_admin['send_mail_user'] || $usp_admin['send_mail_admin']) {
				if (isset($_POST['usp_form_submit']) && isset($_POST['usp-email'])) {
					$nonce = wp_verify_nonce($_POST['usp_form_submit'], 'usp_form_submit');
					if ($nonce !== false) $is_submission = '1';
					$user_email = sanitize_text_field($_POST['usp-email']);
				}
				if (!empty($is_submission)) {
					if (!wp_is_post_revision($post_id)) {
						if ($usp_admin['send_mail'] !== 'no_mail') {
							
							if ($usp_admin['send_mail'] == 'wp_mail') {
								if ($usp_admin['send_mail_admin']) wp_mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
								if ($usp_admin['send_mail_user'])  wp_mail($user_email, $subject_user, $message_user, $headers);
							} else {
								if ($usp_admin['send_mail_admin']) mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
								if ($usp_admin['send_mail_user'])  mail($user_email, $subject_user, $message_user, $headers);
							}
						}
					}
				}
			}
			return $post_id;
		}
		public function send_email_approval($post) { // post object
			global $usp_admin;
			
			$post_id = $post->ID;
			$args = $this->get_email_info($post_id);
			
			if (isset($args['is_submission'])) $is_submission = $args['is_submission'];
			if (isset($args['admin_name']))    $admin_name    = $args['admin_name'];
			if (isset($args['admin_from']))    $admin_from    = $args['admin_from'];
			if (isset($args['admin_email']))   $admin_email   = $args['admin_email'];
			if (isset($args['user_email']))    $user_email    = $args['user_email'];
			if (isset($args['post_id']))       $post_id       = $args['post_id'];
			
			$headers  = '';
			$headers .= 'From: '. $admin_name .' <'. $admin_from .'>'. "\r\n";
			
			$subject_user = $usp_admin['approval_subject'];
			$message_user = html_entity_decode(stripslashes($usp_admin['approval_message']));
			$message_user = $this->regex_filter($message_user, $args);
			
			$subject_admin = $usp_admin['approval_subject_admin'];
			$message_admin = html_entity_decode(stripslashes($usp_admin['approval_message_admin']));
			$message_admin = $this->regex_filter($message_admin, $args);
			
			$cc_approval = trim(esc_attr($usp_admin['cc_approval']));
			$cc_approval_emails = explode(",", $cc_approval);
			$bcc = '';
			foreach ($cc_approval_emails as $email) $bcc .= 'Bcc: '.rtrim(trim($email)) . "\r\n";
			
			if ($usp_admin['send_approval_user'] || $usp_admin['send_approval_admin']) {
				if (isset($_POST['usp_form_submit']) && isset($_POST['usp-email'])) {
					$nonce = wp_verify_nonce($_POST['usp_form_submit'], 'usp_form_submit');
					if ($nonce !== false) $is_submission = '1';
					$user_email = sanitize_text_field($_POST['usp-email']);
				}
				if (!empty($is_submission)) {
					if (!wp_is_post_revision($post_id)) {
						if ($usp_admin['send_mail'] !== 'no_mail') {
							if ($usp_admin['send_mail'] == 'wp_mail') {
								if ($usp_admin['send_approval_admin']) wp_mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
								if ($usp_admin['send_approval_user'])  wp_mail($user_email, $subject_user, $message_user, $headers);
							} else {
								if ($usp_admin['send_approval_admin']) mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
								if ($usp_admin['send_approval_user'])  mail($user_email, $subject_user, $message_user, $headers);
							}
						}
					}
				}
			}
			return $post_id;
		}
		public function send_email_denied($post_id) { // post ID
			global $usp_admin;
			
			$post_id = $post_id;
			$args = $this->get_email_info($post_id);
			
			if (isset($args['is_submission'])) $is_submission = $args['is_submission'];
			if (isset($args['admin_name']))    $admin_name    = $args['admin_name'];
			if (isset($args['admin_from']))    $admin_from    = $args['admin_from'];
			if (isset($args['admin_email']))   $admin_email   = $args['admin_email'];
			if (isset($args['user_email']))    $user_email    = $args['user_email'];
			if (isset($args['post_id']))       $post_id       = $args['post_id'];
			
			$headers = '';
			$headers .= 'From: '. $admin_name .' <'. $admin_from .'>'. "\r\n";
			
			$subject_user = $usp_admin['denied_subject'];
			$message_user = html_entity_decode(stripslashes($usp_admin['denied_message']));
			$message_user = $this->regex_filter($message_user, $args);
			
			$subject_admin = $usp_admin['denied_subject_admin'];
			$message_admin = html_entity_decode(stripslashes($usp_admin['denied_message_admin']));
			$message_admin = $this->regex_filter($message_admin, $args);
			
			$cc_denied = trim(esc_attr($usp_admin['cc_denied']));
			$cc_denied_emails = explode(",", $cc_denied);
			$bcc = '';
			foreach ($cc_denied_emails as $email) $bcc .= 'Bcc: '.rtrim(trim($email)) . "\r\n";
			
			if (did_action('trash_post')) {
				if ($usp_admin['send_denied_user'] || $usp_admin['send_denied_admin']) {
					
					if (isset($_POST['usp_form_submit']) && isset($_POST['usp-email'])) {
						$nonce = wp_verify_nonce($_POST['usp_form_submit'], 'usp_form_submit');
						if ($nonce !== false) $is_submission = '1';
						$user_email = sanitize_text_field($_POST['usp-email']);
					}
					if (!empty($is_submission)) {
						if (!wp_is_post_revision($post_id)) {
							if ($usp_admin['send_mail'] !== 'no_mail') {
								if ($usp_admin['send_mail'] == 'wp_mail') {
									if ($usp_admin['send_denied_admin']) wp_mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
									if ($usp_admin['send_denied_user'])  wp_mail($user_email, $subject_user, $message_user, $headers);
								} else {
									if ($usp_admin['send_denied_admin']) mail($admin_email, $subject_admin, $message_admin, $headers . $bcc);
									if ($usp_admin['send_denied_user'])  mail($user_email, $subject_user, $message_user, $headers);
								}
							}
						}
					}
				}
			}
			return $post_id;
		}
		public function send_email_future($new_status, $old_status, $post) {
			$post_id = $post->ID;
			if (($old_status == 'future') && ($new_status == 'publish')) {
				$this->send_email_approval($post);
			}
			return $post_id;
		}
		public function get_email_info($post_id) {
			global $usp_admin;
			
			$args = array();
			$args['is_submission'] = '';
			$args['blog_url']      = __('Blog URL', 'usp');
			$args['blog_name']     = __('Blog Name', 'usp');
			$args['admin_name']    = __('Admin Name', 'usp');
			$args['admin_from']    = __('Admin From', 'usp');
			$args['admin_email']   = __('Admin Email', 'usp');
			$args['user_name']     = __('User Name', 'usp');
			$args['user_email']    = __('User Email', 'usp');
			$args['post_date']     = __('Post Date', 'usp');
			$args['post_title']    = __('Post Title', 'usp');
			$args['post_url']      = __('Post URL', 'usp');
			$args['post_id']       = '';
			
			if (!empty($post_id) && is_numeric($post_id)) {
				
				if (get_post_meta($post_id, 'is_submission', true) != '') {
					$is_submission = get_post_meta($post_id, 'is_submission', true);
				}
				$blog_url    = get_bloginfo('url');
				$blog_name   = get_bloginfo('name');
				$admin_name  = trim($usp_admin['admin_name']);
				$admin_from  = trim($usp_admin['admin_from']);
				$admin_email = trim($usp_admin['admin_email']);
				
				$post = get_post($post_id);
				if (is_object($post)) {
					$user_id    = $post->post_author;
					$user_info  = get_userdata($user_id);
					$user_name  = $user_info->display_name;
					$user_email = $user_info->user_email;
					$post_date  = $post->post_date;
				}
				$post_title = get_the_title($post_id);
				$post_url   = get_permalink($post_id);
				
				if (!empty($is_submission)) $args['is_submission'] = $is_submission;
				if (!empty($blog_url))      $args['blog_url']      = $blog_url;
				if (!empty($blog_name))     $args['blog_name']     = $blog_name;
				if (!empty($admin_name))    $args['admin_name']    = $admin_name;
				if (!empty($admin_from))    $args['admin_from']    = $admin_from;
				if (!empty($admin_email))   $args['admin_email']   = $admin_email;
				if (!empty($user_name))     $args['user_name']     = $user_name;
				if (!empty($user_email))    $args['user_email']    = $user_email;
				if (!empty($post_date))     $args['post_date']     = $post_date;
				if (!empty($post_title))    $args['post_title']    = $post_title;
				if (!empty($post_url))      $args['post_url']      = $post_url;
				if (!empty($post_id))       $args['post_id']       = $post_id;
			}
			return $args;
		}
		public function regex_filter($string, $args) {
			$string = trim($string);
			
			$blog_url    = $args['blog_url'];
			$blog_name   = $args['blog_name'];
			$admin_name  = $args['admin_name'];
			$admin_email = $args['admin_email'];
			$user_name   = $args['user_name'];
			$user_email  = $args['user_email'];
			$post_title  = $args['post_title'];
			$post_date   = $args['post_date'];
			$post_url    = $args['post_url'];
			$post_id     = $args['post_id'];
			
			$patterns = array();
			$patterns[0] = "/%%blog_url%%/";
			$patterns[1] = "/%%blog_name%%/";
			$patterns[2] = "/%%admin_name%%/";
			$patterns[3] = "/%%admin_email%%/";
			$patterns[4] = "/%%user_name%%/";
			$patterns[5] = "/%%user_email%%/";
			$patterns[6] = "/%%post_title%%/";
			$patterns[7] = "/%%post_date%%/";
			$patterns[8] = "/%%post_url%%/";
			$patterns[9] = "/%%post_id%%/";
			
			$replacements = array();
			$replacements[0] = $blog_url;
			$replacements[1] = $blog_name;
			$replacements[2] = $admin_name;
			$replacements[3] = $admin_email;
			$replacements[4] = $user_name;
			$replacements[5] = $user_email;
			$replacements[6] = $post_title;
			$replacements[7] = $post_date;
			$replacements[8] = $post_url;
			$replacements[9] = $post_id;
			
			return html_entity_decode(preg_replace($patterns, $replacements, $string));
		}
		public function generate_password($fields, $length = 10) {
			if (!empty($fields['usp_password'])) {
				$password = $fields['usp_password'];
			} else {
				$password = wp_generate_password();
			}
			return $password;
		}
		public function challenge_question($input) {
			global $usp_general;
			$response = $usp_general['captcha_response'];
			$response = stripslashes(trim($response));
			if ($usp_general['captcha_casing'] == false) return (strtoupper($input) == strtoupper($response));
			else return ($input == $response);
		}
		public function submission_redirect($usp_redirect, $args, $post_id) {
			global $usp_general;
			
			$errors_cleared = $this->get_query_vars();
			$errors_display = $args['errors_display'];
			$redirect_type  = $args['redirect_type'];
			$redirect_fail  = $usp_general['redirect_failure'];
			
			if (isset($usp_general['redirect_post']) && !empty($usp_general['redirect_post'])) $redirect_post = $usp_general['redirect_post'];
			else $redirect_post = false;
			
			if (isset($usp_redirect) && !empty($usp_redirect)) {
				$redirect = $usp_redirect;
			} elseif (isset($usp_general['redirect_success']) && !empty($usp_general['redirect_success'])) {
				$redirect = $usp_general['redirect_success'];
			} else {
				$redirect = stripslashes($_SERVER['REQUEST_URI']);
			}
			
			if ($redirect_type == 'redirect_register') {
				if (empty($post_id) || !is_numeric($post_id)) $post_id = 'register';
				$add_query_arg = array('usp_success' => '1', 'action' => $post_id);
				
			} elseif ($redirect_type == 'redirect_post') {
				$add_query_arg = array('usp_success' => '2', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_both') {
				$add_query_arg = array('usp_success' => '3', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_email') {
				if (empty($post_id) || !is_numeric($post_id)) $post_id = 'contact';
				$add_query_arg = array('usp_success' => '4', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_email_register') {
				if (empty($post_id) || !is_numeric($post_id)) $post_id = 'email_register';
				$add_query_arg = array('usp_success' => '5', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_email_post') {
				if (empty($post_id) || !is_numeric($post_id)) $post_id = 'email_post';
				$add_query_arg = array('usp_success' => '6', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_email_both') {
				if (empty($post_id) || !is_numeric($post_id)) $post_id = 'email_both';
				$add_query_arg = array('usp_success' => '7', 'post_id' => $post_id);
				
			} elseif ($redirect_type == 'redirect_failure') {
				if (isset($redirect_fail) && !empty($redirect_fail)) $redirect = $redirect_fail;
				$add_query_arg = $errors_display;
			}
			
			if ($redirect_type !== 'redirect_failure') {
				if ($redirect_post && !empty($post_id)) $redirect = get_permalink($post_id);
				$this->clear_session_vars();
			}
			$redirect = remove_query_arg(array('usp_error_register', 'usp_success'), $redirect);
			$redirect = remove_query_arg(array('usp_error_post', 'usp_success'), $redirect);
			$redirect = remove_query_arg(array('usp_error_mail', 'usp_success'), $redirect);
			$redirect = remove_query_arg($errors_cleared, $redirect);
			$redirect = add_query_arg($add_query_arg, $redirect);
			wp_redirect($redirect);
			exit();
		}
		public static function get_query_vars() {
			$query = array();
			if (isset($_SERVER['QUERY_STRING'])) {
				if (preg_match("/usp_(.*)/i", $_SERVER['QUERY_STRING'], $match)) {
					if (isset($_POST['usp_form_submit'])) parse_str(sanitize_text_field($match[0]), $query);
				}
			}
			return $query;
		}
		public function add_query_vars($vars) {
			if (isset($_POST['usp_form_submit'])) {
				$query = $this->get_query_vars();
				if (!empty($query)) {
					foreach ($query as $key => $value) $vars[] = sanitize_text_field($key);
				}
			}
			return $vars;
		}
		public function process_files() {
			global $usp_uploads;
			$error_8 = '';
			$usp_files = '';
			if ((isset($_FILES['usp-files']) && $_FILES['usp-files'] !== '') || (isset($_POST['usp-file-key']) && !empty($_POST['usp-file-key']))) {
				
				if (isset($_POST['usp-file-key'])) {
					$usp_files = array();
					foreach ($_FILES as $key => $value) {
						if (preg_match("/^usp-file-([0-9a-zA-Z]+)$/i", $key, $match)) {
							if (!empty($_POST['usp-file-required-'.$match[1]])) {
								foreach ($value as $k => $v) $usp_files[$k][] = $v;
								$usp_files['key'][] = $match[1];
								$usp_files['req'][] = 'required';
							} else {
								foreach ($value as $k => $v) $usp_files[$k][] = $v;
								$usp_files['key'][] = $match[1];
								$usp_files['req'][] = 'optional';
							}
						}
					}
				} else {
					if (isset($_FILES['usp-files'])) {
						$usp_files = $_FILES['usp-files'];
						for ($i = 0; $i < count($usp_files['name']); $i++) {
							$usp_files['key'][] = '0';
							if (isset($_POST['usp-files-required'])) $usp_files['req'][] = 'required';
							else $usp_files['req'][] = 'optional';
						}
					}
				}
				$custom_allow = array();
				if (isset($_POST['usp-file-types'])) {
					$custom_types = rtrim(trim($_POST['usp-file-types']), ',');
					$custom_allow = explode(",", $custom_types);
					foreach ($custom_allow as $allow) $custom_allow[] = strtolower(rtrim(trim($allow), ','));
				}
				$global_allow = array();
				$global_types = rtrim(trim($usp_uploads['files_allow']), ',');
				$global_allow = explode(",", $global_types);
				foreach ($global_allow as $allow) $global_allow[] = strtolower(rtrim(trim($allow), ','));
				
				if (isset($usp_files['error']))    $error = $usp_files['error'];
				if (isset($usp_files['name']))     $name  = $usp_files['name'];
				if (isset($usp_files['size']))     $size  = $usp_files['size'];
				if (isset($usp_files['tmp_name'])) $tmp   = $usp_files['tmp_name'];
				if (isset($usp_files['type']))     $type  = $usp_files['type'];
				if (isset($usp_files['key']))      $key   = $usp_files['key'];
				if (isset($usp_files['req']))      $req   = $usp_files['req'];
				//
				$loop_count = 0;
				for ($i = 0; $i < count($tmp); $i++) {
					
					$filetype = wp_check_filetype($name[$i]);
					$extension = $filetype['ext'];
					
					if (in_array(strtolower($extension), $global_allow)) {
						if (!empty($custom_allow)) {
							if (!in_array(strtolower($extension), $custom_allow)) {
								if (!empty($extension)) {
									$error_8 = 'usp_error_8a-'. $key[$i];
									break;
								}
							}
						}
					} else {
						if (!empty($extension)) {
							$error_8 = 'usp_error_8a-'. $key[$i];
							break;
						}
					}
					if (!empty($tmp[$i]) && is_uploaded_file($tmp[$i]) && exif_imagetype($tmp[$i]) !== false) {
						$image = getimagesize($tmp[$i]);
						if ($image === false || !$this->check_dimensions($image[0], $image[1])) {
							$error_8 = 'usp_error_8b-'. $key[$i];
							break;
						}
					}
					if (!empty($size[$i])) {
						if (intval($size[$i]) > $usp_uploads['max_size']) {
							$error_8 = 'usp_error_8c-'. $key[$i];
							break;
						}
					}
					if (!empty($size[$i])) {
						if (intval($size[$i]) < $usp_uploads['min_size']) {
							$error_8 = 'usp_error_8d-'. $key[$i];
							break;
						}
					}
					if (!empty($error[$i])) {
						if ($req[$i] == 'required') {
							$error_8 = 'usp_error_8e-'. $key[$i];
							break;
						}
					}
					if (!empty($name[$i])) {
						$usp_files['name'][$i] = preg_replace("/[^0-9a-z\.\_\-]/i", "", $usp_files['name'][$i]);
						$usp_files['name'][$i] = preg_replace("/\.+/", ".", $usp_files['name'][$i]);
						$usp_files['name'][$i] = preg_replace("/\_+/", "_", $usp_files['name'][$i]);
						$usp_files['name'][$i] = preg_replace("/\-+/", "-", $usp_files['name'][$i]);
						if ($usp_uploads['unique_filename']) {
							$usp_files['name'][$i] = date('Y-m-d') . '_' . uniqid() . '_' . $usp_files['name'][$i];
						}
						if (strlen($usp_files['name'][$i]) > 250) { // < 255
							$error_8 = 'usp_error_8f-'. $key[$i];
							break;
						}
					}
					$loop_count++;
				}
				if (empty($error_8)) {
					if ($usp_uploads['min_files'] !== -1) {
						if ($loop_count < $usp_uploads['min_files']) $error_8 = 'usp_error_8g'; 
					}
					if ($usp_uploads['max_files'] !== -1) {
						if ($loop_count > $usp_uploads['max_files']) $error_8 = 'usp_error_8h';
					}
				}
			} else {
				if (isset($_POST['usp-files-required'])) {
					$error_8 = 'usp_error_8';
				} else {
					foreach ($_POST as $key => $value) {
						if (preg_match("/^usp-file-required-([0-9]+)$/i", $key, $match)) {
							$error_8 = 'usp_error_8-'. $match[1];
							break;
						}
					}
				}
			}
			$process_files = array('files' => $usp_files, 'error' => $error_8);
			return $process_files;
		}
		public function check_dimensions($width, $height) {
			global $usp_uploads;
			$width_fits  = ($width  <= intval($usp_uploads['max_width']))  && ($width  >= intval($usp_uploads['min_width']));
			$height_fits = ($height <= intval($usp_uploads['max_height'])) && ($height >= intval($usp_uploads['min_height']));
			return $width_fits && $height_fits;
		}
		public function sanitize_content($string) {
			global $usp_advanced;
			if ($usp_advanced['html_content'] !== '') {
				$allowed_tags = trim($usp_advanced['html_content']);
				$allowed_tags = explode(",", $allowed_tags);
				$allowed_atts = array('id'=>array(), 'class'=>array(), 'href'=>array(), 'src'=>array(), 'dir'=>array(), 'lang'=>array(), 'style'=>array(), 'alt'=>array(), 'title'=>array(), 'height'=>array(), 'width'=>array());
				$allowedposttags = array();
				foreach ($allowed_tags as $allowed_tag) {
					$allowedposttags[trim($allowed_tag)] = $allowed_atts;
				}
				$string = wp_kses($string, $allowedposttags);
			} else {
				$string = sanitize_text_field($string);
			}
			return $string;
		}
		public function set_session_vars() {
			global $usp_general;
			if (!isset($_SESSION)) session_start();
			if (isset($_POST)) $_POST = stripslashes_deep($_POST);
			//
			foreach ($_POST as $key => $value) {
				if (preg_match("/^usp-(.*)$/i", $key, $match)) {
					if ($key !== 'usp-remember') {
						unset($_SESSION['usp_form_session'][$key]);
						if (is_array($value)) {
							foreach ($value as $k => $v) {
								if (isset($usp_general['sessions_on']) && (isset($_COOKIE['remember']) || isset($_POST['usp-remember']))) {
									if ($key == 'usp-content') $_SESSION['usp_form_session'][$key][$k] = $this->sanitize_content($v);
									                      else $_SESSION['usp_form_session'][$key][$k] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
								} else {
									if (isset($_SESSION['usp_form_session'])) unset($_SESSION['usp_form_session']);
								}
							}
						} else {
							if (isset($usp_general['sessions_on']) && (isset($_COOKIE['remember']) || isset($_POST['usp-remember']))) {
								if ($key == 'usp-content') $_SESSION['usp_form_session'][$key] = $this->sanitize_content($value);
								                      else $_SESSION['usp_form_session'][$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
							} else {
								if (isset($_SESSION['usp_form_session'])) unset($_SESSION['usp_form_session']);
							}
						}
					}
				}
			}
			if (isset($usp_general['sessions_on'])) {
				if (isset($usp_general['sessions_default']) && !empty($usp_general['sessions_default'])) setcookie('remember', 'remember', time() + 86400*30);
				if (isset($_POST['usp-remember'])) {
					setcookie('forget', '', 1);
					setcookie('remember', 'remember', time() + 86400*30);
				} else {
					setcookie('remember', '', 1);
					setcookie('forget', 'forget', time() + 86400*30);
				}
			}
		}
		public function check_session() {
			if ($_COOKIE['PHPSESSID'] == session_id()) {
				return true;
			} else {
				session_unset();
				die(__('Please do not load this page directly. Thanks!', 'usp'));
			}
		}
		public function clear_session_vars() {
			global $usp_general;
			if (!isset($_SESSION)) session_start();
			if (isset($usp_general['sessions_scope']) && empty($usp_general['sessions_scope'])) {
				$this->unset_session();
			}
			// session_start(); 
			// session_destroy();
		}
		public function unset_session() {
			if (isset($_SESSION['usp_form_session'])) unset($_SESSION['usp_form_session']);
			setcookie('forget', '' , 1);
			setcookie('remember', '' , 1);
		}
		public function get_user_stats() {
			$time = current_time('mysql');
			
			if (isset($_SERVER['REQUEST_URI']) && isset($_SERVER["HTTP_HOST"])) $request = usp_clean('http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
			else $request = "undefined";
			
			if (isset($_SERVER['HTTP_REFERER'])) $referer = usp_clean($_SERVER['HTTP_REFERER']);
			else $referer = "undefined";

			$address = usp_get_ip();

			if (isset($_SERVER['HTTP_USER_AGENT'])) $agent = usp_clean($_SERVER['HTTP_USER_AGENT']);
			else $agent = "undefined";

			$stats = array('usp-time' => $time, 'usp-request' => $request, 'usp-referer' => $referer, 'usp-address' => $address, 'usp-agent' => $agent);
			return $stats;
		}
		public function get_field_val() {
			global $usp_general, $usp_advanced;
			if ((isset($_POST['usp_form_submit']) && empty($_POST['usp-verify']) && wp_verify_nonce($_POST['usp_form_submit'], 'usp_form_submit')) || isset($_GET['usp_reset_form'])) {
				// AUTHOR NAME
				$error_1 = '';
				if (isset($_POST['usp-name']) && !empty($_POST['usp-name'])) {
					$usp_author = sanitize_text_field($_POST['usp-name']);
					if (usp_check_malicious($usp_author)) $error_1 = 'usp_error_1a';
				} else {
					if (isset($_POST['usp-name-required'])) $error_1 = 'usp_error_1';
					$usp_author = '';
				}
				// POST URL
				$error_2 = '';
				if (isset($_POST['usp-url']) && !empty($_POST['usp-url'])) {
					$usp_url = sanitize_text_field($_POST['usp-url']);
				} else {
					if (isset($_POST['usp-url-required'])) $error_2 = 'usp_error_2';
					$usp_url = '';
				}
				// POST TITLE
				$error_3 = '';
				if (isset($_POST['usp-title']) && !empty($_POST['usp-title'])) {
					$usp_title = sanitize_text_field($_POST['usp-title']);
				} else {
					if (isset($_POST['usp-title-required'])) $error_3 = 'usp_error_3';
					$usp_title = '';
				}
				// POST TAGS
				$error_4 = '';
				if (isset($_POST['usp-tags']) && !empty($_POST['usp-tags'])) {
					if (is_array($_POST['usp-tags'])) {
						$usp_tags = array();
						foreach ($_POST['usp-tags'] as $tag_id) $usp_tags[] = sanitize_text_field($tag_id);
					} else {
						$usp_tags = sanitize_text_field($_POST['usp-tags']);
					}
				} else {
					if (isset($_POST['usp-tags-required'])) $error_4 = 'usp_error_4';
					$usp_tags = '';
				}
				// POST CAPTCHA
				$error_5 = '';
				$usp_captcha = '';
				if (isset($_POST['usp-captcha']) && !empty($_POST['usp-captcha'])) {
					$usp_captcha = sanitize_text_field($_POST['usp-captcha']);
					$pass = $this->challenge_question($_POST['usp-captcha']);
					if (!$pass) $error_5 = 'usp_error_5a';
					
				} elseif (isset($_POST['recaptcha_response_field']) && !empty($_POST['recaptcha_response_field'])) {
					require_once(USP_PATH . '/lib/recaptchalib.php');
					$publickey = $usp_general['recaptcha_public'];
					$privatekey = $usp_general['recaptcha_private'];
					$resp = null;
					$error = null;
					$resp = recaptcha_check_answer($privatekey,
						$_SERVER["REMOTE_ADDR"],
						$_POST["recaptcha_challenge_field"],
						$_POST["recaptcha_response_field"]
					);
					if ($resp->is_valid) $pass = true;
					else $pass = false;
					if (!$pass) $error_5 = 'usp_error_5a'; // esc_url($resp->error);
					// echo recaptcha_get_html($publickey, $error);
				} else {
					if (isset($_POST['usp-captcha-required'])) $error_5 = 'usp_error_5';
				}
				// POST CATS
				$error_6 = '';
				if (isset($_POST['usp-category']) && !empty($_POST['usp-category'])) {
					if (is_array($_POST['usp-category'])) {
						$usp_category = array();
						foreach ($_POST['usp-category'] as $cat_id) $usp_category[] = sanitize_text_field($cat_id);
					} else {
						$usp_category = sanitize_text_field($_POST['usp-category']);
					}
				} else {
					if (isset($_POST['usp-category-required'])) $error_6 = 'usp_error_6';
					$usp_category = '';
				}
				// POST TAX
				$error_14 = array();
				$usp_taxonomy = array();
				$usp_taxonomy_required = array();
				if (isset($_POST) && !empty($_POST)) {
					foreach ($_POST as $key => $value) {
						if (preg_match("/^usp-taxonomy-([0-9a-z_-]+)$/i", $key, $match)) {
							if (strpos($match[0], '-required') === false) {
								if (is_array($value)) {
									foreach ($value as $val) {
										if (!empty($val)) $usp_taxonomy[$match[1]][] = sanitize_text_field($val);
									}
								} else {
									if (!empty($value)) $usp_taxonomy[$match[1]] = sanitize_text_field($value);
								}
							} else {
								$required = $match[1];
								$required = substr_replace($required, '', -9);
								$usp_taxonomy_required['usp_taxonomy_required_'. $required] = $required;
							}
						}
					}
					foreach ($usp_taxonomy_required as $key => $value) {
						if (empty($usp_taxonomy[$value])) {
							$error_14['usp_error_14_'. $value] = 'usp_error_14_'. $value;
						}
					}
				}
				// POST CONTENT
				$error_7 = '';
				if (isset($_POST['usp-content']) && !empty($_POST['usp-content'])) {
					$usp_content = $this->sanitize_content($_POST['usp-content']);
					if (isset($usp_general['character_min']) && $usp_general['character_min'] !== '0') {
						if (strlen($usp_content) < $usp_general['character_min']) $error_7 = 'usp_error_7a';
					}
					if (isset($usp_general['character_max']) && $usp_general['character_max'] !== '0') {
						if (strlen($usp_content) > $usp_general['character_max']) $error_7 = 'usp_error_7b';
					}
				} else {
					if (isset($_POST['usp-content-required'])) $error_7 = 'usp_error_7';
					$usp_content = '';
				}
				// POST FILES
				$process_files = $this->process_files();
				$usp_files = $process_files['files'];
				$error_8 = $process_files['error'];
				
				// POST EMAIL
				$error_9 = '';
				if (isset($_POST['usp-email']) && !empty($_POST['usp-email'])) {
					$usp_email = sanitize_email($_POST['usp-email']);
					if (usp_check_malicious($usp_email)) $error_9 = 'usp_error_9a';
				} else {
					if (isset($_POST['usp-email-required'])) $error_9 = 'usp_error_9';
					$usp_email = '';
				}
				// POST SUBJECT
				$error_10 = '';
				if (isset($_POST['usp-subject']) && !empty($_POST['usp-subject'])) {
					$usp_subject = sanitize_text_field($_POST['usp-subject']);
					if (usp_check_malicious($usp_subject)) $error_10 = 'usp_error_10a';
				} else {
					if (isset($_POST['usp-subject-required'])) $error_10 = 'usp_error_10';
					$usp_subject = '';
				}
				// POST FORMAT
				$error_15 = '';
				if (isset($_POST['usp-custom-format']) && !empty($_POST['usp-custom-format'])) {
					$usp_format = sanitize_text_field($_POST['usp-custom-format']);
				} else {
					if (isset($_POST['usp-custom-format-required'])) $error_15 = 'usp_error_15';
					$usp_format = '';
				}
				// ALT CAPTION DESC
				$error_11 = ''; $usp_alt = array();
				$error_12 = ''; $usp_caption = array();
				$error_13 = ''; $usp_desc = array();
				if (isset($_POST) && !empty($_POST)) {
					foreach ($_POST as $key => $value) {
						if (preg_match("/^usp-custom-alt-([0-9]+)$/i", $key, $match)) {
							if (!empty($value)) {
								${'usp_alt_'. $match[1]} = sanitize_text_field($value);
							} else {
								if (isset($_POST['usp-custom-alt-'. $match[1] .'-required'])) {
									${'usp_alt_'. $match[1]} = '';
									$error_11 = 'usp_error_11';
								}
							}
							$usp_alt[] = ${'usp_alt_'. $match[1]};
						}
						if (preg_match("/^usp-custom-caption-([0-9]+)$/i", $key, $match)) {
							if (!empty($value)) {
								${'usp_caption_'. $match[1]} = sanitize_text_field($value);
							} else {
								if (isset($_POST['usp-custom-caption-'. $match[1] .'-required'])) {
									${'usp_caption_'. $match[1]} = '';
									$error_12 = 'usp_error_12';
								}
							}
							$usp_caption[] = ${'usp_caption_'. $match[1]};
						}
						if (preg_match("/^usp-custom-desc-([0-9]+)$/i", $key, $match)) {
							if (!empty($value)) {
								${'usp_desc_'. $match[1]} = sanitize_text_field($value);
							} else {
								if (isset($_POST['usp-custom-desc-'. $match[1] .'-required'])) {
									${'usp_desc_'. $match[1]} = '';
									$error_13 = 'usp_error_13';
								}
							}
							$usp_desc[] = ${'usp_desc_'. $match[1]};
						}
					}
				}
				// CUSTOM FIELDS
				$usp_custom = array();
				$usp_required = array();
				$usp_error_custom = array();
				$prefix = 'null___';
				if (isset($usp_advanced['custom_prefix']) && !empty($usp_advanced['custom_prefix'])) $prefix = $usp_advanced['custom_prefix'];
				//
				if (isset($_POST) && !empty($_POST)) {
					foreach ($_POST as $key => $value) {
						
						if ((preg_match("/^usp-custom-([0-9a-z_-]+)$/i", $key, $match)) || (preg_match("/^$prefix([0-9a-z_-]+)$/i", $key, $match))) {
							
							if (strpos($match[0], 'usp-custom-') !== false) $field = 'usp-custom-';
							else $field = $prefix;
							
							$excludes = array('-nicename', '-displayname', '-nickname', '-firstname', '-lastname', '-description', '-password', '-format', '-type');
							foreach ($excludes as $exclude) {
								if (strpos($match[0], $exclude) !== false) continue 2;
							}
							if (strpos($match[1], '-required') === false) {
								if (is_array($value)) {
									foreach ($value as $val) {
										if (!empty($val)) $usp_custom[$field . $match[1]][] = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
									}
								} else {
									if (!empty($value)) $usp_custom[$field . $match[1]] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
								}
							} else {
								$required = substr_replace($match[1], '', -9);
								$usp_required['usp_required_'. $key] = $required;
							}
						}
					}
					foreach ($usp_required as $key => $value) {
						if (strpos($key, 'usp-custom-') !== false) $field = 'usp-custom-';
						else $field = $prefix;
						if (empty($usp_custom[$field . $value])) {
							$usp_error_custom['usp_error_custom_'. $value] = 'usp_error_custom_'. $value;
						}
					}
				}
				// CUSTOM USER
				$error_a = '';
				if (isset($_POST['usp-custom-nicename']) && !empty($_POST['usp-custom-nicename'])) {
					$usp_nicename = sanitize_text_field($_POST['usp-custom-nicename']);
				} else {
					if (isset($_POST['usp-custom-nicename-required'])) $error_a = 'usp_error_a';
					$usp_nicename = '';
				}
				$error_b = '';
				if (isset($_POST['usp-custom-displayname']) && !empty($_POST['usp-custom-displayname'])) {
					$usp_displayname = sanitize_text_field($_POST['usp-custom-displayname']);
				} else {
					if (isset($_POST['usp-custom-displayname-required'])) $error_b = 'usp_error_b';
					$usp_displayname = '';
				}
				$error_c = '';
				if (isset($_POST['usp-custom-nickname']) && !empty($_POST['usp-custom-nickname'])) {
					$usp_nickname = sanitize_text_field($_POST['usp-custom-nickname']);
				} else {
					if (isset($_POST['usp-custom-nickname-required'])) $error_c = 'usp_error_c';
					$usp_nickname = '';
				}
				$error_d = '';
				if (isset($_POST['usp-custom-firstname']) && !empty($_POST['usp-custom-firstname'])) {
					$usp_firstname = sanitize_text_field($_POST['usp-custom-firstname']);
				} else {
					if (isset($_POST['usp-custom-firstname-required'])) $error_d = 'usp_error_d';
					$usp_firstname = '';
				}
				$error_e = '';
				if (isset($_POST['usp-custom-lastname']) && !empty($_POST['usp-custom-lastname'])) {
					$usp_lastname = sanitize_text_field($_POST['usp-custom-lastname']);
				} else {
					if (isset($_POST['usp-custom-lastname-required'])) $error_e = 'usp_error_e';
					$usp_lastname = '';
				}
				$error_f = '';
				if (isset($_POST['usp-custom-description']) && !empty($_POST['usp-custom-description'])) {
					$usp_description = sanitize_text_field($_POST['usp-custom-description']);
				} else {
					if (isset($_POST['usp-custom-description-required'])) $error_f = 'usp_error_f';
					$usp_description = '';
				}
				$error_g = '';
				if (isset($_POST['usp-custom-password']) && !empty($_POST['usp-custom-password'])) {
					$usp_password = sanitize_text_field($_POST['usp-custom-password']);
				} else {
					if (isset($_POST['usp-custom-password-required'])) $error_g = 'usp_error_g';
					$usp_password = '';
				}
				// OTHERS
				if (isset($_POST['usp-is-contact'])) $contact = true;
				else $contact = false;
				
				if (isset($_POST['usp-is-register'])) $register = true;
				else $register = false;
				
				if (isset($_POST['usp-is-post-submit'])) $post_submit = true;
				else $post_submit = false;
				
				if (isset($_POST['usp-send-mail'])) $send_mail = true;
				else $send_mail = false;
				
				if (isset($_POST['usp-logged-id'])) $logged_id = sanitize_text_field($_POST['usp-logged-id']);
				else $logged_id = '';
	
				if (isset($_POST['usp-logged-cat'])) $logged_cats = sanitize_text_field($_POST['usp-logged-cat']);
				else $logged_cats = '';
				
				if (isset($_POST['usp-tags-default'])) $default_tags = sanitize_text_field($_POST['usp-tags-default']);
				else $default_tags = '';
				
				if (isset($_POST['usp-cats-default'])) $default_cats = sanitize_text_field($_POST['usp-cats-default']);
				else $default_cats = '';
				
				if (isset($_POST['usp-redirect'])) $usp_redirect = esc_url($_POST['usp-redirect']);
				else $usp_redirect = '';
				
				if (isset($_POST['usp-custom-type'])) $custom_type = sanitize_text_field($_POST['usp-custom-type']);
				else $custom_type = '';
				
				if (isset($_POST['usp-contact-ids'])) $contact_ids = sanitize_text_field($_POST['usp-contact-ids']);
				else $contact_ids = '';
				
				// PROCESS
				$fields = array(
							'usp_author'   => $usp_author, 
							'usp_url'      => $usp_url, 
							'usp_title'    => $usp_title, 
							'usp_tags'     => $usp_tags, 
							'usp_captcha'  => $usp_captcha, 
							'usp_category' => $usp_category, 
							'usp_taxonomy' => $usp_taxonomy,
							'usp_content'  => $usp_content, 
							'usp_files'    => $usp_files, 
							'usp_email'    => $usp_email, 
							'usp_subject'  => $usp_subject, 
							'usp_format'   => $usp_format,
							
							'usp_alt'      => $usp_alt, 
							'usp_caption'  => $usp_caption, 
							'usp_desc'     => $usp_desc, 
							
							'usp_custom'   => $usp_custom,
							
							'usp_nicename'    => $usp_nicename, 
							'usp_displayname' => $usp_displayname, 
							'usp_nickname'    => $usp_nickname, 
							'usp_firstname'   => $usp_firstname, 
							'usp_lastname'    => $usp_lastname, 
							'usp_description' => $usp_description,
							'usp_password'    => $usp_password,
							
							
							);
				$errors = array(
							$error_1, $error_2, $error_3, $error_4, $error_5, $error_6, $error_7, $error_8, $error_9, $error_10, $error_11, $error_12, $error_13, $error_14, $error_15,
							$error_a, $error_b, $error_c, $error_d, $error_e, $error_f, $error_g,
							$usp_error_custom,
							);
				if (isset($_GET['usp_reset_form'])) {
					$this->unset_session();
					$redirect = str_replace('?' . $_SERVER['QUERY_STRING'], '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
					foreach ($errors as $error) unset($error);
					header('Location: ' . esc_url($redirect));
					exit;
				}
				$args = array(
					'fields'          => $fields, 
					'errors'          => $errors, 
					'contact'         => $contact,
					'register'        => $register, 
					'post_submit'     => $post_submit,
					'send_mail'       => $send_mail,
					'logged_id'       => $logged_id, 
					'logged_cats'     => $logged_cats, 
					'default_tags'    => $default_tags, 
					'default_cats'    => $default_cats, 
					'usp_redirect'    => $usp_redirect,
					'usp_custom_type' => $custom_type,
					'contact_ids'     => $contact_ids,
				);
				return $args;
			}
		}
	}
}


