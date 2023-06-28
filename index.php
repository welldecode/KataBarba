<?php
get_header();

$editables = get_itens('editables');
?>
<main>
    <section class="home_container">
        <div class="container">
            <div class="home_content">
                <div class="title_content flex flex_center flex_align_center">
                    <?php
                    foreach ($editables['highlights']['itens'] as $highlights) {
                    ?>
                        <h1><?= $highlights['title'] ?></h1>
                        <p><?= $highlights['subtitle'] ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <section class="cart_container" data-secury="<?= criarNonce('tokenLista-nonce'); ?>">
            <div class="cart_content">
                <form action="#" method="POST">
                    <div class="cart_items">
                        <div class="number_c">
                            <div id="decrement" class="btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></div>
                            <input type="number" value="<?= WC()->cart->get_cart_contents_count(); ?>" id="quantity" />
                            <div id="increment" class="btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/plus.svg" alt=""></div>
                        </div>
                        <div class="total_number"><?= $woocommerce->cart->get_cart_total()  ?></div>
                        <div class="payment_content">
                            <div class="buy_c button_cart" id="button_cart">
                                Comprar Agora
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
    <section class="about_product">
        <div class="container">
            <div class="about_content flex">
                <div class="about_left flex">
                    <div class="titles_left">
                        <span>SOBRE O PRODUTO</span>
                        <h1>Elimine até 98% da sujeira causada por pelos ao fazer a barba em casa.</h1>
                    </div>
                    <p>Tenha uma experiência de barbear mais prática e confortável, que pode tornar o processo de barbear em casa mais agradável. Além disso a pessoa que mora com você agradece. Hábitos de higiene são um reflexo de quem você é!</p>
                </div>
                <div class="about_right">
                    <div class="card_content flex flex_wrap">
                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_shield.svg" alt="">
                            </figure>
                            <h1>Costura Reforçada</h1>
                            <h4>Com acabamento premium, todas as costuras são reforçadas para que o produto dure.</h4>
                        </article>
                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_iron.svg" alt="">
                            </figure>
                            <h1>Não precisa passar</h1>
                            <h4>O tecido não amarrota, encolhe ou estica, é uma malha fria, por tanto, não precisa passar.</h4>
                        </article>
                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_bag.svg" alt="">
                            </figure>
                            <h1>Prático p/ transportar</h1>
                            <h4>Leve e discreto, utilize a bag de transporte e carregue com você para onde quiser.</h4>
                        </article>
                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_cover.svg" alt="">
                            </figure>
                            <h1>Não Gruda Pelos</h1>
                            <h4>Tecido com característica deslizante que não adere pelos, facilitando a higienização.</h4>
                        </article>
                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_tape.svg" alt="">
                            </figure>
                            <h1>Ajustável no pescoço</h1>
                            <h4>Com o ajuste em velcro o katarbarba garante conforto para todos os biotipos de homens.</h4>
                        </article>

                        <article class="card_about">
                            <figure>
                                <img src="<?= THEME_URI ?>/assets/img/icons/icon_dress.svg" alt="">
                            </figure>
                            <h1>Tecido confortável</h1>
                            <h4>Tecido gabardine: Um algodão resistente, com característica diagonal, confortável.</h4>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="depoiments_container">
        <div class="depoiments_content container flex">
            <div class="depoiments_left">
                <figure>
                    <div class="image"></div>
                </figure>
            </div>
            <div class="depoiments_right flex flex_align_center">
                <div class="titles_left">
                    <span>O DEPOIMENTO</span>
                </div>
                <div class="depoiments_texts flex">
                    <h1>“Eu não aguentava mais ouvir reclamação da minha mulher porque fiz a barba e deixei pelos espalhados pela pia. Eu gastava mais tempo limpando a bagunça do que fazendo a barba. ”</h1>
                    <div class="user_icon flex flex_center">
                        <img src="<?= THEME_URI ?>/assets/img/icons/user_kata.svg" alt="">
                        <span>Urso Kata, pai de família.</span>
                    </div>
                </div>
            </div>


        </div>
        <div class="depoiments_content container flex">
            <div class="depoiments_right flex flex_align_center">
                <div class="titles_left">
                    <span>POUPE TEMPO</span>
                </div>
                <div class="depoiments_texts flex">
                    <h1>Um homem ao longo da sua vida gasta em média pouco mais de 3 anos fazendo a barba.</h1>
                    <h2>Economize tempo e foque no que você gosta de fazer, jogando aquela partida de videogame, assistindo seu time do coração ou quem sabe uma jantar especial pra sua companheira?!</h2>
                </div>
            </div>
            <div class="depoiments_left">
                <figure>
                    <div class="image"></div>
                </figure>
            </div>
        </div>
    </section>
    <section class="functions_container">
        <div class="container functions_content">
            <div class="large_titles">
                <h1>Como funciona o katabarba?</h1>
            </div>
            <div class="card_content flex  ">
                <article class="card_function flex">
                    <h1>Passo 1.</h1>
                    <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                </article>
                <article class="card_function flex">
                    <h1>Passo 2.</h1>
                    <p>Faça a sua barba tranquilamente e sem preocupar com os pelos que caem sujando a pia do seu banheiro.</p>
                </article>
                <article class="card_function flex">
                    <h1>Passo 3.</h1>
                    <p>Após terminar de fazer a sua barba, tire a capa Katabarba, começando pelo velcro e por ultimo as ventosas “solta fácil”.</p>
                </article>
                <article class="card_function flex">
                    <h1>Passo 4.</h1>
                    <p>Com muito cuidado, embrulhe os pelos que ficaram sob a capa Katabarba e descarte em um lixo apropriado.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="product_about">
        <div class="product_content container flex flex_align_center">
            <div class="product_left flex ">
                <div class="titles_left">
                    <span>NON É CHINGLINK, OK?</span>
                </div>
                <div class="product_texts flex">
                    <h1>Produto de confecção nacional.</h1>
                    <h2>Um produto de confecção nacional, com materiais que foram cuidadosamente escolhidos. Como resultado a capa Katabarba é um produto confiável e extremamente durável. Acompanha:</h2>
                </div>
            </div>
            <div class="product_right">
                <div class="images_content flex">
                    <div class="image_primary">
                    </div>
                    <div class="images_container flex">
                        <div class="image_two">
                        </div>
                        <div class="image_two">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video_container">
        <div class="container video_content flex flex_align_center">
            <div class="video_yt">
                <div class="button_yt"><img src="<?= THEME_URI ?>/assets/img/icons/icon_play.svg" alt=""></div>
            </div>
            <div class="video_text flex flex_align_center flex_center">
                <h1>Assista o vídeo para entender na prática, como o produto funciona!</h1>
            </div>
        </div>
    </section>
    <section class="about_slider">
        <div class="container">
            <div class="titles">
                <h1>O que estão dizendo sobre o katabarba?</h1>
            </div>
        </div>
    </section>
</main>
<?php
get_footer(); ?>