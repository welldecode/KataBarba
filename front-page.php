<?php
get_header();

$editables = get_itens('editables');
?>
<main>
    <section class="dashboard">
        <div class="dashboard_content container">
            <div class="dashboard_content_title">
                <?php
                foreach ($editables['highlights']['itens'] as $highlights) {
                ?>
                    <h1><?php echo $highlights['title'] ?></h1>
                    <p><?php echo $highlights['subtitle'] ?></p>
                <?php
                }
                ?>
            </div>
        </div>
        <section class="cart_container" data-secury="<?php echo criarNonce('tokenLista-nonce'); ?>">
            <div class="cart_content">
                <form action="#" method="POST">
                    <div class="cart_items">
                        <div class="number_c">
                            <div id="decrement" class="btn_number"><img src="<?php echo THEME_URI ?>/assets/img/icons/min.svg" alt=""></div>
                            <input type="number" value="1" id="quantity" />
                            <div id="increment" class="btn_number"><img src="<?php echo THEME_URI ?>/assets/img/icons/plus.svg" alt=""></div>
                        </div>
                        <div class="total_number"><?php echo $woocommerce->cart->get_cart_total()  ?></div>
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
                    <span>SOBRE O PRODUTO</span>
                    <h1>Elimine até 98% da sujeira causada por pelos ao fazer a barba em casa.</h1>
                </div>
                <p>Tenha uma experiência de barbear mais prática e confortável, que pode tornar o processo de barbear em casa mais agradável. Além disso a pessoa que mora com você agradece. Hábitos de higiene são um reflexo de quem você é!</p>
            </div>
            <div class="about_content_right">
                <div class="card_content flex flex_wrap">
                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_shield.svg" alt="">
                        </figure>
                        <h1>Costura Reforçada</h1>
                        <h4>Com acabamento premium, todas as costuras são reforçadas para que o produto dure.</h4>
                    </article>
                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_iron.svg" alt="">
                        </figure>
                        <h1>Não precisa passar</h1>
                        <h4>O tecido não amarrota, encolhe ou estica, é uma malha fria, por tanto, não precisa passar.</h4>
                    </article>
                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_bag.svg" alt="">
                        </figure>
                        <h1>Prático p/ transportar</h1>
                        <h4>Leve e discreto, utilize a bag de transporte e carregue com você para onde quiser.</h4>
                    </article>
                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_cover.svg" alt="">
                        </figure>
                        <h1>Não Gruda Pelos</h1>
                        <h4>Tecido com característica deslizante que não adere pelos, facilitando a higienização.</h4>
                    </article>
                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_tape.svg" alt="">
                        </figure>
                        <h1>Ajustável no pescoço</h1>
                        <h4>Com o ajuste em velcro o katarbarba garante conforto para todos os biotipos de homens.</h4>
                    </article>

                    <article class="card_about">
                        <figure>
                            <img src="<?php echo THEME_URI ?>/assets/img/icons/icon_dress.svg" alt="">
                        </figure>
                        <h1>Tecido confortável</h1>
                        <h4>Tecido gabardine: Um algodão resistente, com característica diagonal, confortável.</h4>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="depoiments container">
        <div class="depoiments_content">
            <div class="depoiments_content_left">
                <figure>
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="">
                </figure>
            </div>
            <div class="depoiments_content_right">
                <div class="depoiments_content_title">O DEPOIMENTO</div>
                <h1>“Eu não aguentava mais ouvir reclamação da minha mulher porque fiz a barba e deixei pelos espalhados pela pia. Eu gastava mais tempo limpando a bagunça do que fazendo a barba. ”</h1>
            </div>
            <div class="depoiments_content_left">
                <div class="title_top">O DEPOIMENTO</div>
                <h1>“Eu não aguentava mais ouvir reclamação da minha mulher porque fiz a barba e deixei pelos espalhados pela pia. Eu gastava mais tempo limpando a bagunça do que fazendo a barba. ”</h1>
            </div>
            <div class="depoiments_content_right">
                <figure>
                    <img src="<?= THEME_URI ?>/assets/img/image.svg" alt="">
                </figure>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>