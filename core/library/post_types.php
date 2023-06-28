<?php



function post_types()
{
    create_types('post_type', 'male', 'editables', '', 'Editável', 'Editáveis', ['title', 'thumbnail'], 'dashicons-editor-code', '', [], 'private');
  
    add_post_type_support('page', 'thumbnail');
}

add_action('init', 'post_types', 0);