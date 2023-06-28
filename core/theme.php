<?php


remove_action( 'wp_head', '_wp_render_title_tag', 1 );
/* Remove Logo to Toolbar */
function toolbaredit($wp_toolbar)
{
    $wp_toolbar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'toolbaredit', 999);

/* Mudar Rodapé da administração */
function footerInfo()
{
    echo "Criado pela: DevStep - Wellington Henrique";
}
add_filter('admin_footer_text', 'footerInfo'); 

remove_action('wp_head', 'rel_canonical');  
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

function remove_css_id_filter($var)
{
    return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

add_filter('page_css_class', 'remove_css_id_filter', 100, 1);
add_filter('nav_menu_item_id', 'remove_css_id_filter', 100, 1);
add_filter('nav_menu_css_class', 'remove_css_id_filter', 100, 1);
 
/* Titulo Personalizado SEO */
function site_title()
{
    if (is_home() || is_front_page()) {
        return get_bloginfo('name') . ' - ' . get_bloginfo('description');
    } else if (is_page()) {
        return get_the_title() . ' - ' . get_bloginfo('name');
    } else if (is_search()) {
        return 'Pesquisando : ' . get_search_query() . ' - ' . get_bloginfo('name');
    } else if (is_404()) {
        return 'Nada Encontrado - ' . get_bloginfo('name');
    } else {
        return get_the_title() . ' - ' . get_bloginfo('name');
    }
}

/* Verificador de REQUEST */
function setConfig($data, $meta)
{
    return isset($data[$meta]) ? $data[$meta] : false;
}
 
/* Verificar Nonce */
function verificarNonce( $id, $value ) {
    $nonce = get_option( $id );
    if( $nonce == $value )
        return true;
    return false;
}

/* Criar um Nonce */
function criarNonce( $id ) {
    if( ! get_option( $id ) ) {
        $nonce = wp_create_nonce( $id );
        update_option( $id, $nonce );
    }
    return get_option( $id );
}

/* ADMIN */  