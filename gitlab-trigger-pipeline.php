<?php
/*
Plugin Name: Gitlab Trigger Pipeline
Plugin URI: https://github.com/kmturley/wordpress-gitlab-trigger-pipeline
Description: Wordpress Plugin triggers a Gitlab Pipeline when user publishes a post (using environment variables GITLAB_TRIGGER_ID and GITLAB_TRIGGER_TOKEN)
Version: 0.1
Author: Kim T
Author URI: https://github.com/kmturley
License: GPL
Copyright: Kim T
*/

add_action('publish_page', 'publish_static_hook');
add_action('publish_post', 'publish_static_hook');

function publish_static_hook($id) {
  $gitlab_branch = get_option('option_branch');
  $gitlab_username = get_option('option_username');
  $gitlab_password = get_option('option_password');
  // if environment variables are set, then trigger static build
  if ($gitlab_branch && $gitlab_username && $gitlab_password) {
    wp_remote_post('https://gitlab.com/api/v4/projects/'.$gitlab_username.'/ref/'.$gitlab_branch.'/trigger/pipeline?token='.$gitlab_password);
  }
}

add_action('admin_init', 'my_general_section');
function my_general_section() {
  add_settings_section(
    'my_settings_section',
    'Gitlab Settings',
    'my_section_options_callback',
    'general'
  );
  add_settings_field(
    'option_branch',
    'GITLAB BRANCH',
    'my_textbox_callback',
    'general',
    'my_settings_section',
    array(
        'option_branch'
    )
  );
	add_settings_field(
    'option_username',
    'GITLAB TRIGGER ID',
    'my_textbox_callback',
    'general',
    'my_settings_section',
    array(
        'option_username'
    )
  );
	add_settings_field(
    'option_password',
    'GITLAB TRIGGER TOKEN',
    'my_password_callback',
    'general',
    'my_settings_section',
    array(
        'option_password'
    )
  );

	register_setting('general','option_branch', 'esc_attr');
	register_setting('general','option_username', 'esc_attr');
	register_setting('general','option_password', 'esc_attr');
}
function my_section_options_callback() {
    echo '<p>Settings for Gitlab</p>';
}
function my_textbox_callback($args) {
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
function my_password_callback($args) {
    $option = get_option($args[0]);
    echo '<input type="password" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
?>