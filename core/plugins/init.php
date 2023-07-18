<?php


add_action('tgmpa_register', 'my_theme_register_required_plugins');
function my_theme_register_required_plugins()
{
    $plugins = [
        [
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
            'required' => true,
        ],
        [
            'name'     => 'Mercado Pago payments for WooCommerce',
            'slug'     => 'woocommerce-mercadopago',
            'required' => true,
        ],

        [
            'name'     => 'Flexible Checkout Fields',
            'slug'     => 'flexible-checkout-fields',
            'required' => true,
        ],
    ];

    $config = [
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        'strings'      => array(
            'page_title'                      => __('Instale os plug-ins necessários', 'theme-slug'),
            'menu_title'                      => __('Instalar plug-ins', 'theme-slug'),
            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            'notice_can_activate_required'    => _n_noop(
                // translators: 1: plugin name(s).
                'O seguinte plugin obrigatorio está atualmente inativo: %1$s.',
                'Os seguintes plugins necessários estam atualmente inativo: %1$s.',
                'theme-slug'
            ),
            'notice_can_activate_recommended' => _n_noop(
                // translators: 1: plugin name(s).
                'O seguinte plugin está atualmente inativo: %1$s.',
                'Os seguintes plugins está atualmente inativo: %1$s.',
                'theme-slug'
            ),
            'activate_link'                   => _n_noop(
                'Começar a ativar o plugin',
                'Começar a ativar os plugins',
                'theme-slug'
            ),    'dismiss'                         => __('Descartar essa notificação', 'theme-slug'),
        ),
    ];
    tgmpa($plugins, $config);
}
