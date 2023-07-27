<?php
get_header();

$editables = get_itens('editables');
?>
<main>
    <section class="dashboard">
        <div class=" container">
            <div class="dashboard_content">
                <div class="dashboard_content_title">
                    <?php
                    foreach ($editables['highlights']['itens'] as $highlights) :
                    ?>
                        <h1 data-aos="fade-down"><?= $highlights['title'] ?></h1>
                        <p data-aos="fade-up"><?= $highlights['subtitle'] ?></p>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <section class="cart_container top_cart <?php echo wp_is_mobile() ? 'cart_scroll' : ''; ?>" data-secury="<?= criarNonce('tokenLista-nonce'); ?>">
            <div class="cart_content">
                <form action="#" method="POST">
                    <?php
                    if (WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id('14'))) {
                        foreach (WC()->cart->get_cart() as $cart_item) {
                    ?>
                            <div class="cart_items">
                                <div class="number_c">
                                    <span class="input-number-decrement btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></span><input class="input-number" disabled type="number" value="<?php echo $cart_item['quantity']; ?>" min="1" max="10" id="quantity"><span class="input-number-increment  btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/plus.svg" alt=""></span>
                                </div>
                                <div class="total_number"><?= WC()->cart->get_cart_total()  ?></div>
                                <div class="payment_content">
                                    <div class="buy_c button_cart" id="button_cart">
                                        <?php
                                        if (wp_is_mobile()) {  ?>
                                            Comprar
                                        <?php
                                        } else { ?>
                                            Comprar Agora
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="cart_items">
                            <div class="number_c">
                                <span class="input-number-decrement btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></span><input class="input-number" disabled type="number" value="1" min="1" max="10" id="quantity"><span class="input-number-increment  btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/plus.svg" alt=""></span>
                            </div>
                            <div class="total_number">R$ 49,50</div>
                            <div class="payment_content">
                                <div class="buy_c button_cart" id="button_cart">
                                    <?php
                                    if (wp_is_mobile()) {  ?>
                                        Comprar
                                    <?php
                                    } else { ?>
                                        Comprar Agora
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </section>
    </section>

    <section class="about container">
        <div class="about_content">
            <div class="about_content_left">
                <div class="titles_left">
                    <div class="title_g">SOBRE O PRODUTO</div>
                    <h1 data-aos="fade-in">Elimine até 98% da sujeira causada por pelos ao fazer a barba em casa.</h1>
                </div>
                <p data-aos="fade-in">Tenha uma experiência de barbear mais prática e confortável, que pode tornar o processo de barbear em casa mais agradável. Além disso a pessoa que mora com você agradece. Hábitos de higiene são um reflexo de quem você é!</p>
            </div>
            <div class="about_content_right">
                <div class="card_content flex flex_wrap">
                    <?php
                    $animation = 0;
                    foreach ($editables['about']['itens'] as $about) :
                    ?>
                        <article class="card_about" data-aos="fade-up" >
                            <figure>
                                <img src="<?= $about['image'] ?>" alt="<?= $about['title'] ?>">
                            </figure>
                            <h1><?= $about['title'] ?></h1>
                            <h4><?= $about['subtitle'] ?></h4>
                        </article>
                    <?php
                        $animation++;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="depoiments container">
        <div class="depoiments_content">
            <div class="depoiments_content_left">
                <figure data-aos="fade-right">
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="">
                </figure>
            </div>
            <div class="depoiments_content_right" data-aos="fade-up">
                <div class="depoiments_content_title">O DEPOIMENTO</div>
                <h1>“Eu não aguentava mais ouvir reclamação da minha mulher porque fiz a barba e deixei pelos espalhados pela pia. Eu gastava mais tempo limpando a bagunça do que fazendo a barba. ”</h1>
                <div class="depoiments_content_user">
                    <img src="<?= THEME_URI ?>/assets/img/icons/user_kata.svg" alt="user_kata" width="60px" height="60px">
                    <span>Urso Kata, <div class="inline"> pai de família.</div></span>
                </div>

            </div>
            <div class="depoiments_content_left" data-aos="fade-up">
                <div class="depoiments_content_title">POUPE TEMPO</div>
                <h1>Um homem ao longo da sua vida gasta em média pouco mais de 3 anos fazendo a barba.</h1>
                <p>Economize tempo e foque no que você gosta de fazer, jogando aquela partida de videogame, assistindo seu time do coração ou quem sabe uma jantar especial pra sua companheira?!</p>
            </div>
            <div class="depoiments_content_right">
                <figure data-aos="fade-left" >
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="fade">
                </figure>
            </div>
        </div>
    </section>

    <section class="functions">
        <div class="functions_content container">
            <div class="functions_content_title" data-aos="fade-in">
                Como funciona o katabarba?
            </div>
            <div class="functions_content_cards">
                <article class="functions_cards" data-aos="fade-up">
                    <h1>Passo 1</h1>
                    <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up">
                    <h1>Passo 2</h1>
                    <p>Faça a sua barba tranquilamente e sem preocupar com os pelos que caem sujando a pia do seu banheiro.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up" >
                    <h1>Passo 3</h1>
                    <p>Após terminar de fazer a sua barba, tire a capa Katabarba, começando pelo velcro e por ultimo as ventosas “solta fácil”.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up" >
                    <h1>Passo 4</h1>
                    <p>Com muito cuidado, embrulhe os pelos que ficaram sob a capa Katabarba e descarte em um lixo apropriado.</p>
                </article>
            </div>
        </div>
    </section>
    <section class="product container">
        <div class="product_content">
            <div class="product_content_left">
                <div class="product_content_left_title" data-aos="fade-in" >NON É CHINGLINK, OK?</div>
                <div class="product_content_left_about" data-aos="fade-in">
                    <h1>Produto de confecção nacional.</h1>
                    <p>Um produto de confecção nacional, com materiais que foram cuidadosamente escolhidos. Como resultado a capa Katabarba é um produto confiável e extremamente durável. Acompanha:</p>
                </div>

                <ul>
                    <li data-aos="fade-right"><img src="<?= THEME_URI ?>/assets/img/icons/verify.svg" alt="bag" width="27px" height="27px"> 1 Bag para transporte</li>
                    <li data-aos="fade-right" ><img src="<?= THEME_URI ?>/assets/img/icons/verify.svg" alt="mosquete" width="27px" height="27px"> 1 Par de mini mosquete de alumínio</li>
                    <li data-aos="fade-right"><img src="<?= THEME_URI ?>/assets/img/icons/verify.svg" alt="ventosa" width="27px" height="27px"> 1 Par de ventosa “solta rápido”</li>
                </ul>
            </div>

            <div class="product_content_right">
                <div class="image_highligts" data-aos="fade-in"></div>
                <div class="image_right">
                    <div class="image_secundary" data-aos="fade-left"></div>
                    <div class="image_secundary" data-aos="fade-left"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="video container">
        <div class="video_content">
            <div class="video_player" data-aos="fade-right">
                <!-- VIDEO DO YOUTUBE OU REMOTO -->
            </div>
            <div class="video_title" data-aos="fade-left">
                Assista o vídeo para entender na prática, como o produto funciona!
            </div>
        </div>
    </section>
    <section class="depoiments_kata">
        <div class="depoiments_kata_content container">
            <div class="depoiments_kata_content_title" data-aos="fade-in" >
                O que estão dizendo sobre o katabarba?
            </div>
            <!-- Swiper -->
            <div class="swiper depoiments_slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide depoiments_kata_cards">
                        <figure>
                            <img src="<?= THEME_URI ?>/assets/img/icons/user_none.svg" alt="user_none" width="76px" height="76px">
                        </figure>
                        <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                        <div class="info_user">
                            <h1>Celso Oliveira</h1>
                            <span>Blogueiro</span>
                        </div>
                    </div>
                    <div class="swiper-slide depoiments_kata_cards">
                        <figure>
                            <img src="<?= THEME_URI ?>/assets/img/icons/user_none.svg" alt="user_none" width="76px" height="76px">
                        </figure>
                        <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                        <div class="info_user">
                            <h1>Celso Oliveira</h1>
                            <span>Blogueiro</span>
                        </div>
                    </div>
                    <div class="swiper-slide depoiments_kata_cards">
                        <figure>
                            <img src="<?= THEME_URI ?>/assets/img/icons/user_none.svg" alt="user_none" width="76px" height="76px">
                        </figure>
                        <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                        <div class="info_user">
                            <h1>Celso Oliveira</h1>
                            <span>Blogueiro</span>
                        </div>
                    </div>

                    <div class="swiper-slide depoiments_kata_cards">
                        <figure>
                            <img src="<?= THEME_URI ?>/assets/img/icons/user_none.svg" alt="user_none" width="76px" height="76px">
                        </figure>
                        <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                        <div class="info_user">
                            <h1>Celso Oliveira</h1>
                            <span>Blogueiro</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>
    </section>

    <section class="faq container">
        <div class="faq_title" data-aos="fade-in" >
            Perguntas frequentes | FAQ
        </div>
        <ul class="faq_content">
            <?php
            $index = 5;
            foreach ($editables['faq']['itens'] as $faq) {
            ?>
                <li class="faq-item" data-aos="fade-up" >
                    <div class="faq-toggle">
                        <?php echo $faq['title'] ?>
                        <div class="faq-icon">
                            <span class="arrow"></span>
                        </div>
                    </div>
                    <div class="faq-description">
                        <p><?php echo $faq['text'] ?></p>
                    </div>
                </li>
            <?php
                $index++;
            }
            ?>
        </ul>
    </section>
    <section class="footer_kata">
        <div class="footer_kata_content container">
            <h1>O que você está esperando?</h1>
            <p>Chega de dor de cabeça Jovi ! Faça como o urso Kata, clique no botão abaixo e garanta já a sua capa katabarba! </p>

            <div class="cart_footer">
                <section class="cart_container footer_minicart <?php echo wp_is_mobile() ? 'cart_scroll' : ''; ?>" data-secury="<?= criarNonce('tokenLista-nonce'); ?>">
                    <div class="cart_content">
                        <form action="#" method="POST">
                            <?php
                            if (WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id('14'))) {
                                foreach (WC()->cart->get_cart() as $cart_item) {
                            ?>
                                    <div class="cart_items">
                                        <div class="number_c">
                                            <span class="input-number-decrement btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></span><input class="input-number" disabled type="number" value="<?php echo $cart_item['quantity']; ?>" min="1" max="10" id="quantity"><span class="input-number-increment  btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/plus.svg" alt=""></span>
                                        </div>
                                        <div class="total_number"><?= WC()->cart->get_cart_total()  ?></div>
                                        <div class="payment_content">
                                            <div class="buy_c button_cart" id="button_cart">
                                                <?php
                                                if (wp_is_mobile()) {  ?>
                                                    Comprar
                                                <?php
                                                } else { ?>
                                                    Comprar Agora
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="cart_items">
                                    <div class="number_c">
                                        <span class="input-number-decrement btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></span><input class="input-number" disabled type="number" value="1" min="1" max="10" id="quantity"><span class="input-number-increment  btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/plus.svg" alt=""></span>
                                    </div>
                                    <div class="total_number">R$ 49,50</div>
                                    <div class="payment_content">
                                        <div class="buy_c button_cart" id="button_cart">
                                            <?php
                                            if (wp_is_mobile()) {  ?>
                                                Comprar
                                            <?php
                                            } else { ?>
                                                Comprar Agora
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>