<?php
/* Template Name: calendar */
global $post;
get_header();
?>
<h1><?php _e($post->post_title); ?></h1>
<p><?php _e($post->post_content); ?></p>
<?php
if(function_exists('displayFrontEndCalendar'))
    displayFrontEndCalendar();
?>
<?php
get_footer();