<?php
get_header();

$editables = get_itens('editables');
?>
<main>
    <section class="dashboard">
        <div class="dashboard_content container">
            <div class="dashboard_content_title">
                <?php
                foreach ($editables['highlights']['itens'] as $highlights) :
                ?>
                    <h1 data-aos="fade-up" data-aos-delay="700"><?= $highlights['title'] ?></h1>
                    <p data-aos="fade-up" data-aos-delay="800"><?= $highlights['subtitle'] ?></p>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <section class="cart_container" data-secury="<?= criarNonce('tokenLista-nonce'); ?>">
            <div class="cart_content">
                <form action="#" method="POST">
                    <div class="cart_items">
                        <div class="number_c">
                            <div id="decrement" class="btn_number"><img src="<?= THEME_URI ?>/assets/img/icons/min.svg" alt=""></div>
                            <input type="number" value="1" id="quantity" />
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
    <section class="about container">
        <div class="about_content">
            <div class="about_content_left">
                <div class="titles_left">
                    <span data-aos="fade-right" data-aos-delay="600">SOBRE O PRODUTO</span>
                    <h1 data-aos="fade-in" data-aos-delay="800">Elimine até 98% da sujeira causada por pelos ao fazer a barba em casa.</h1>
                </div>
                <p data-aos="fade-in" data-aos-delay="1000">Tenha uma experiência de barbear mais prática e confortável, que pode tornar o processo de barbear em casa mais agradável. Além disso a pessoa que mora com você agradece. Hábitos de higiene são um reflexo de quem você é!</p>
            </div>
            <div class="about_content_right">
                <div class="card_content flex flex_wrap">
                    <?php
                    $animation = 0;
                    foreach ($editables['about']['itens'] as $about):
                    ?>
                        <article class="card_about" data-aos="fade-up" data-aos-delay="<?= $animation; ?>00">
                            <figure>
                                <img src="<?= $about['image'] ?>" alt="">
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
                <figure data-aos="fade-right" data-aos-delay="700">
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="">
                </figure>
            </div>
            <div class="depoiments_content_right" data-aos="fade-up" data-aos-delay="800">
                <div class="depoiments_content_title">O DEPOIMENTO</div>
                <h1>“Eu não aguentava mais ouvir reclamação da minha mulher porque fiz a barba e deixei pelos espalhados pela pia. Eu gastava mais tempo limpando a bagunça do que fazendo a barba. ”</h1>
                <div class="depoiments_content_user">
                    <img src="<?= THEME_URI ?>/assets/img/icons/user_kata.svg" alt="user_kata">
                    <span>Urso Kata, pai de família.</span>
                </div>

            </div>
            <div class="depoiments_content_left"  data-aos="fade-up" data-aos-delay="700">
                <div class="depoiments_content_title">POUPE TEMPO</div>
                <h1>Um homem ao longo da sua vida gasta em média pouco mais de 3 anos fazendo a barba.</h1>
                <p>Economize tempo e foque no que você gosta de fazer, jogando aquela partida de videogame, assistindo seu time do coração ou quem sabe uma jantar especial pra sua companheira?!</p>
            </div>
            <div class="depoiments_content_right">
                <figure  data-aos="fade-left" data-aos-delay="800">
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="">
                </figure>
            </div>
        </div>
    </section>
    <section class="functions">
        <div class="functions_content container">
            <div class="functions_content_title" data-aos="fade-in" data-aos-delay="500"> 
                Como funciona o katabarba?
            </div>
            <div class="functions_content_cards">

                <article class="functions_cards" data-aos="fade-up" data-aos-delay="600">
                    <h1>Passo 1</h1>
                    <p>Prenda a capa Katabarba confortavelmente no pescoço e grude as ventosas “solta rápido” no espelho do seu banheiro.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up" data-aos-delay="700">
                    <h1>Passo 2</h1>
                    <p>Faça a sua barba tranquilamente e sem preocupar com os pelos que caem sujando a pia do seu banheiro.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up" data-aos-delay="800">
                    <h1>Passo 3</h1>
                    <p>Após terminar de fazer a sua barba, tire a capa Katabarba, começando pelo velcro e por ultimo as ventosas “solta fácil”.</p>
                </article>
                <article class="functions_cards" data-aos="fade-up" data-aos-delay="900">
                    <h1>Passo 4</h1>
                    <p>Com muito cuidado, embrulhe os pelos que ficaram sob a capa Katabarba e descarte em um lixo apropriado.</p>
                </article>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>