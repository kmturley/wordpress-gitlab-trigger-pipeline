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
  $gitlab_id = getenv('GITLAB_TRIGGER_ID');
  $gitlab_token = getenv('GITLAB_TRIGGER_TOKEN');
  // if environment variables are set, then trigger static build
  if ($gitlab_id && $gitlab_token) {
    wp_remote_post('https://gitlab.com/api/v4/projects/'.$gitlab_id.'/ref/master/trigger/pipeline?token='.$gitlab_token);
  }
}

?>