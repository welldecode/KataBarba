<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= site_title(); ?></title>

    <!--- WP HEAD --->
    <?php wp_head(); ?>

</head>

<body <?php body_class() ?>>
 
<span class="cursor">
    <span class="cursor-move-inner">
      <span class="cursor-inner"></span>
    </span>
    <span class="cursor-move-outer">
      <span class="cursor-outer"></span>
    </span>
  </span>
    <?php
    if (is_home() || is_front_page()) { ?>
        <header>
            <nav class="container ">
                <a href="<?= get_home_url(); ?>" class="nav_logo">
                    <img src="<?= THEME_URI ?>/assets/img/icons/logo_minify.svg" alt="katabarba" width="153px" height="54px">
                </a>
                <ul class="nav_menu flex flex_center">
                    <li><a href="#">O Produto</a></li>
                    <li><a href="#">Preço</a></li>
                    <li><a href="#">Modo de uso</a></li>
                    <li><a href="#">Vídeo explicativo</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
                <div class="menu_r"> 
                <div class="cart_button">
                    <img src="<?= THEME_URI ?>/assets/img/icons/cart-icon.svg" alt="Carrinho de Compras">
                    <span id="total_cart"><?= WC()->cart->get_cart_contents_count(); ?> </span>
                </div>
                <div class="menu-btn">
                    <div class="menu-btn__burger"></div>
                </div></div>
            </nav>
        </header><?php } ?>