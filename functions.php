<?php

function custom_settings_add_menu() {
  add_menu_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action('admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields('section');
           do_settings_sections('theme-options');
           submit_button();
       ?>
    </form>
  </div>
<?php }

add_theme_support( 'post-thumbnails' );

//Custom Site Posts
function create_site_post_type() {
  register_post_type('site-post,
    array(
      'labels' => array('name' => __('Sites'), 'singular_name' => __('Site')),
      'public' => true,'has_archive' => true,
      'supports' => array('title','editor','thumbnail','custom-fields')
    )
  );
}

add_action('init', 'create_site_post_type');

?>
