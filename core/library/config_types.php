<?php
function allow_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}


function get_implode($separated, $array, $symbol = '')
{
    if (count($array) > 1) {
        $last = [$array[count($array) - 2] . $symbol . $array[count($array) - 1]];
        array_splice($array, -2);
        $array = array_merge($array, $last);
    }
    return implode($separated, $array);
}


function get_itens($post_type, $id = false)
{

    global $post;

    $array = $meta = $result = [];

    $editables = get_posts(['posts_per_page' => 200, 'post_type' => $post_type, 'meta_query' => [['key' => 'meta', 'value' => strtr(serialize(['related' => (string) $post->ID]), ['a:1:{' => '', '}' => '']), 'compare' => 'like']], 'orderby' => 'menu_order', 'order' => 'ASC']);
    foreach ($editables as $editable) {
        $metas = $editable->meta;
        $type = $metas['editable_type'];
        unset($metas['related'], $metas['reset'], $metas['editable_type']);

        foreach ($metas as $field => $values) {
            foreach ($values as $keys => $value) {
                $result[strstr($keys, '_', true)] = $value;
            }
            $meta[] = $result;
            unset($metas[$field]);
        }

        if ($post_type == 'historias') {
            $array[] = ['ID' => $editable->ID, 'title' => $editable->post_title, 'description' => $editable->post_excerpt];
        } else {
            if (isset($array[$type])) {
                $array[$type][] = ['ID' => $editable->ID, 'title' => $editable->post_title, 'description' => $editable->post_excerpt, 'itens' => $meta];
            } else {
                $array[$type] = ['ID' => $editable->ID, 'title' => $editable->post_title, 'description' => $editable->post_excerpt, 'itens' => $meta];
            }
        }
        unset($meta);
    }
    return $array;
}
function create_types($type, $genre  , $id, $slug, $singular, $plural, $support, $icon, $feature, $taxonomies, $status = 'publish', $comp = 'post')
{
    $conditional = $genre == 'female' ? ['a', 'a'] : ['o', ''];
    $bool = $status == 'public' ? [true, false] : [false, true];

    if ($type == 'post_type') {
        $labels = [
            'menu_name' => $plural,
            'name' => $plural,
            'singular_name' => $singular,
            'add_new' => 'Adicionar ' . $singular . '',
            'add_new_item' => 'Adicionar nov' . $conditional[0] . ' ' . $singular . '',
            'edit_item' => 'Editar ' . $singular . '',
            'new_item' => $singular,
            'view_item' => 'Ver ' . $singular . '',
            'search_items' => 'Procurar ' . $plural . '',
            'not_found' => 'Nenhum' . $conditional[1] . ' ' . $singular . ' encontrad' . $conditional[0] . '',
            'not_found_in_trash' => 'Nenhum' . $conditional[1] . ' ' . $singular . ' na lixeira',
            'all_items' => 'Tod' . $conditional[0] . 's ' . $conditional[0] . 's ' . $plural . '',
            'name_admin_bar' => $singular,
        ];

        $image = [
            'featured_image' => $feature,
            'set_featured_image' => 'Escolha uma Imagem',
            'remove_featured_image' => 'Remover Imagem',
            'use_featured_image' => 'Usar Imagem',
        ];

        $labels = $feature ? $labels + $image : $labels;

        $structure = [
            'labels' => $labels,
            'hierarchical' => $bool[1],
            'public' => $bool[0],
            'publicly_queryable' => $bool[0],
            'hierarchical'        => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => $comp,
            'capabilities' => [
                'publish_posts' => "publish_$id",
                'edit_posts' => "edit_$id",
                'edit_others_posts' => "edit_others_$id",
                'read_private_posts' => "read_private_$id",
                'edit_post' => "edit_$id",
                'delete_post' => "delete_$id",
                'read_post' => "read_$id",
            ],
            'menu_position' => 5,
            'menu_icon' => $icon,

            'can_export' => true,

            'publicly_queryable'  => true,
            'has_archive' => $bool[0],
            'exclude_from_search' => $bool[1],
            'show_in_rest' => true,
            'supports' => $support,
        ];

        $structure = $taxonomies ? $structure + ['taxonomies' => $taxonomies] : $structure;
        $structure = $slug && $bool[0] ? $structure + ['rewrite' => ['slug' => $slug, 'with_front' => false]] : $structure;

        register_post_type($id, $structure);
    }

    if ($type == 'taxonomy') {

        $tax = $taxonomies == 'cat' ? true : false;

        $structure = [
            'hierarchical' => $tax,
            'public' => $bool[0],
            'labels' => [
                'name' => $plural,
                'singular_name' => $singular,
                'search_items' => 'Procurar ' . $plural . '',
                'all_items' => 'Tod' . $conditional[0] . 's ' . $conditional[0] . 's ' . $plural . '',
                'parent_item' => '' . $singular . ' Geral',
                'parent_item_colon' => '' . $singular . ' Geral:',
                'edit_item' => 'Editar ' . $singular . '',
                'update_item' => 'Salvar ' . $singular . '',
                'add_new_item' => 'Adicionar ' . $singular . '',
                'new_item_name' => 'Nov' . $conditional[0] . ' ' . $singular . '',
                'menu_name' => $plural,
                'parent_item' => null,
                'parent_item_colon' => null,
            ],
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'query_var' => true,
            '_builtin' => true,
            'rewrite' => ['slug' => $slug, 'with_front' => false],
            'update_count_callback' => '_update_post_term_count'
        ];

        register_taxonomy($id, $support, $structure);
    }
}
function get_loop($post_type, $amont = 20, $status = 'publish', $order = 'ASC', $taxonomy = false, $key = false)
{
    $query = ['posts_per_page' => $amont, 'post_type' => $post_type, 'post_status' => $status, 'order' => $order];
    if ($taxonomy) {
        $query[$taxonomy[0]] = $taxonomy[1];
    }
    $posts = get_posts($query);
    return $key ? $posts[$key] : $posts;
}
function add_theme_caps()
{
    // gets the administrator role
    $admins = get_role('administrator');

    $admins->add_cap('edit_gallery');
    $admins->add_cap('edit_galleries');
    $admins->add_cap('edit_other_galleries');
    $admins->add_cap('publish_galleries');
    $admins->add_cap('read_gallery');
    $admins->add_cap('read_private_galleries');
    $admins->add_cap('delete_gallery');
}
add_action('admin_init', 'add_theme_caps');

function add_capability()
{
    $role = get_role('administrator');
    $post_types = array_slice(get_post_types('', 'names'), 11);

    foreach ($post_types as $id) {
        $role->add_cap("publish_$id");
        $role->add_cap("edit_others_$id");
        $role->add_cap("read_private_$id");
        $role->add_cap("edit_$id");
        $role->add_cap("delete_$id");
        $role->add_cap("read_$id");
    }
}



add_action('admin_init', 'add_capability');
add_filter('upload_mimes', 'allow_types', 1, 1);
add_filter('custom_menu_order', '__return_true');
