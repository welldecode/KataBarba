<?php

function create_meta_boxes()
{
    global $post;
    $editables_type = [
        'highlights' => 'Destaques',
        'sliders' => 'Carousel de Imagens',
        'media' => 'Mídias',
        'numbers' => 'Números',
        'warning' => 'Avisos',
        'messages' => 'Mensagens',
        'projects' => 'Projetos',
        'titles' => 'Titulos',
        'video' => 'Vídeo de destaque',
        'about' => 'Sobre',
        'image' => 'Imagem de destaque',
        'form' => 'Formulário'
    ]; 
    add_meta_box(
        'meta_editables',
        'Tipo de editável',
        function () use ($post, $editables_type) {
            echo '
             <select name="meta[editable_type]" id="editable_type" required>
            <option hidden>Selecionar tipo</option>
            ';
            foreach ($editables_type as $key => $value) {
                echo "<option value=$key>$value</option>";
            }
            echo '
                </select>
            ';
        },
        ['editables'],
        'side',
        'high'
    );
    add_meta_box(
        'meta_item',
        'Grupo de Itens: ' . get_the_title() . '',
        function () {
            echo '
            <input type="hidden" name="meta[reset]" value="0">
            <div id="countables" data-scope="item">
            </div>
            <div class="add-action">
            <a href="#" role="button" class="button button-primary button-large" data-parent="contables" onclick="addItem(&quot;countables&quot;,event)">Adicionar Item</a>
            </div>
            ';
        },
        ['editables'],
        'normal',
        'high'
    );
    add_meta_box(
        'meta_forecourse',
        'Relacionado',
        function () use ($post) {
            echo '
<select name="meta[related]" id="related" required>
<option hidden>Selecionar relação</option>
            ';

            if ($post->post_type == 'editables') {
                foreach (get_posts(['posts_per_page' => 20, 'post_type' => 'page']) as $key => $value) {
                    echo "
<option value='$value->ID'>(Estática) $value->post_title</option>
                ";
                }
            } else {
                foreach (get_posts(['posts_per_page' => 20, 'post_type' => 'historias']) as $key => $value) {
                    echo "
    <option value='$value->ID'>$value->post_title</option>
                ";
                };
            };
            echo '
</select>
            ';
        },
        ['editables'],
        'side',
        'high'
    );
}

function save_meta_boxes($post_id)
{
    if (array_key_exists('meta', $_POST)) {
        update_post_meta($post_id, 'meta', $_POST['meta']);
    }
}

function script_meta_boxes()
{
    global $post;
    @$json = json_encode(get_post_meta($post->ID, 'meta', true));
    ?>
    <script>
        const isUrl = string => {
            try {
                return Boolean(new URL(string));
            } catch (e) {
                return false;
            }
        };

        function getType(r) {
            return Array.isArray(r) ? 'array' : 'string' == typeof r ? 'string' : null != r && 'object' == typeof r ? 'object' : 'other'
        }
        let o = <?php echo $json ?>,
            n = 0,
            c = [];
        Object.keys(o).forEach(i => {
            i.includes('item_') && c.push(i.replace('item_', ''))
            console.log(i);

            if (document.getElementById(i)) {
                document.getElementById(i).setAttribute("value", o[`${i}`]);
            }
        });
        document.body.dataset.counter = c[c.length - 1];
        c.forEach(m => addItem('countables', '', m));
        let a = Object.entries(o);
        a.forEach(([k, v]) => {
            o = getType(v) == 'object' ? Object.assign(o, v) : o
        });
        Object.keys(o).length && document.querySelectorAll('[id^=meta_] *[name]:not(.noscan),[id^=meta_] *[data-name]').forEach(e => {
            e.value = o[e.id];
            isUrl(o[e.id]) ? e.style.backgroundImage = 'url(' + o[e.id] + ')' : ''
        });
    </script>
<?php
}


add_action('save_post', 'save_meta_boxes');
add_action('add_meta_boxes', 'create_meta_boxes');
add_action('admin_footer', 'script_meta_boxes');
