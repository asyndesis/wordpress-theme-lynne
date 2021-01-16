<?php
  add_action('init', 'removeHeadLinks');
  add_action( 'init', 'folio_init' );
  add_action( 'init', 'widget_init' );
  add_action( 'init', 'awards_init' );
  //add_action( 'wp_enqueue_scripts', 'headStuff' );
/*------------------------------------------------------------------------------------------------------------------------*/
function headStuff(){

}
/*------------------------------------------------------------------------------------------------------------------------*/
  function removeHeadLinks() {
      remove_action('wp_head', 'rsd_link');
      remove_action('wp_head', 'wlwmanifest_link');
    }
/*------------------------------------------------------------------------------------------------------------------------*/
  function awards_init() {
    $labels = array(
      'name' => _x( 'Awards', 'custom post type generic name' ), // Tip: _x('') is used for localization
      'singular_name' => _x( 'Awards', 'individual custom post type name' ),
      'add_new' => _x( 'Add New', 'add' ),
      'add_new_item' => __( 'Add New Award' ),
      'edit_item' => __( 'Edit Award' ),
      'new_item' => __( 'New Award' ),
      'view_item' => __( 'View Award' ),
      'search_items' => __( 'Search Awards' ),
      'not_found' =>  __( 'No Awards Items Found' ),
      'not_found_in_trash' => __( 'No Awards found in trash' ),
      'parent_item_colon' => ''
    );
    $args = array( 'labels' => $labels, /* NOTICE: the $labels variable is used here... */
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'page',
      'hierarchical' => true,
      'menu_position' => null,
      'supports' => array( 'title', 'editor' )
    );
    register_post_type( 'awards', $args ); /* Register it and move on */
  }
/*------------------------------------------------------------------------------------------------------------------------*/  function widget_init() {
    $labels = array(
      'name' => _x( 'Widgets', 'custom post type generic name' ), // Tip: _x('') is used for localization
      'singular_name' => _x( 'Widget', 'individual custom post type name' ),
      'add_new' => _x( 'Add New', 'add' ),
      'add_new_item' => __( 'Add New Widget' ),
      'edit_item' => __( 'Edit Widget' ),
      'new_item' => __( 'New Widget' ),
      'view_item' => __( 'View Widget' ),
      'search_items' => __( 'Search Widgets' ),
      'not_found' =>  __( 'No Widgets Items Found' ),
      'not_found_in_trash' => __( 'No Widgets found in trash' ),
      'parent_item_colon' => ''
    );
    $args = array( 'labels' => $labels, /* NOTICE: the $labels variable is used here... */
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'page',
      'hierarchical' => true,
      'menu_position' => null,
      'supports' => array( 'title', 'editor' )
    );
    register_post_type( 'widgets', $args ); /* Register it and move on */
  }
/*------------------------------------------------------------------------------------------------------------------------*/
  function folio_init() {
    $labels = array(
      'name' => _x( 'Portfolio', 'custom post type generic name' ), // Tip: _x('') is used for localization
      'singular_name' => _x( 'Portfolio', 'individual custom post type name' ),
      'add_new' => _x( 'Add New', 'add' ),
      'add_new_item' => __( 'Add New Portfolio Item' ),
      'edit_item' => __( 'Edit Portfolio Item' ),
      'new_item' => __( 'New Portfolio Item' ),
      'view_item' => __( 'View Portfolio Item' ),
      'search_items' => __( 'Search Portfolio Items' ),
      'not_found' =>  __( 'No Portfolio Items Found' ),
      'not_found_in_trash' => __( 'No Portfolio Items found in trash' ),
      'parent_item_colon' => ''
    );
    $args = array( 'labels' => $labels, /* NOTICE: the $labels variable is used here... */
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'page',
      'hierarchical' => true,
      'menu_position' => null,
      'supports' => array( 'title', 'editor', 'excerpt' )
    );
    register_post_type( 'portfolio', $args ); /* Register it and move on */
    $labels = array(
      'name' => _x( 'Mediums', 'taxonomy general name' ),
      'singular_name' => _x( 'Medium', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Mediums' ),
      'all_items' => __( 'All Mediums' ),
      'parent_item' => __( 'Main Medium' ),
      'parent_item_colon' => __( 'Main Medium:' ),
      'edit_item' => __( 'Edit Medium' ),
      'update_item' => __( 'Update Medium' ),
      'add_new_item' => __( 'Add Medium' ),
      'new_item_name' => __( 'New Medium Name' ),
    );

    register_taxonomy( 'medium', array( 'portfolio' ), array(
      'hierarchical' => true,
      'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
      'show_ui' => true,
      'query_var' => true,
    ));
  }
/*------------------------------------------------------------------------------------------------------------------------*/

function remove_menus(){

  remove_menu_page( 'link-manager.php' );                  //Dashboard
  //remove_menu_page( 'jetpack' );                    //Jetpack* 
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );
?>