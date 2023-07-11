<?php


#------------------------------------------------------------
# - Adicionando HTML no footer para equilibrar o tema
#------------------------------------------------------------ 

function dashboard_widgets()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

function wps_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('new-content'); 
}

function admin_color($color_scheme)
{
    $color_scheme = 'modern';
    return $color_scheme;
}
 
function admin_theme()
{
    wp_enqueue_style('ui-admin-theme', get_bloginfo('template_directory') . '/assets/admin/css/admin.css', []);
    wp_enqueue_script('ui-admin-theme', get_bloginfo('template_directory') . '/assets/admin/js/item.js', []);
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('media_script', get_bloginfo('template_directory') . '/assets/admin/js/media.js', ['jquery']);
}  

/*Função que altera a Logo da Admin site*/
function cutom_login_logo()
{
    echo "<style type=\"text/css\">
    body.login div#login h1 a {
    background-image: url(" . get_bloginfo('template_directory') . "/assets/img/admin/logo_devstep.svg);
    -webkit-background-size: contain;
    background-size: contain;
    margin: 0 0 25px;
    height: 80px;
    width: 320px;
    } 
    </style>";
}
add_action('login_enqueue_scripts', 'cutom_login_logo');

/*Função que altera a URL, trocando pelo endereço do seu site*/
function my_login_logo_url()
{
    return get_bloginfo('url');
}

add_filter('login_headerurl', 'my_login_logo_url');

add_filter('get_user_option_admin_color', 'admin_color', 5);
add_action('admin_enqueue_scripts', 'admin_theme');
add_action('wp_dashboard_setup', 'dashboard_widgets', 999);
add_action('wp_before_admin_bar_render', 'wps_admin_bar');   

require get_parent_theme_file_path('core/admin/customizerAPI/functions.php');
require get_parent_theme_file_path('core/admin/customizerAPI/init.php');

new Functions_Customizer();