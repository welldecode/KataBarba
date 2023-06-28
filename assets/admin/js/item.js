let index = 1

function addItem(d, e, n) {
    e && e.preventDefault()
    let x = Number(document.body.dataset.counter),
        i = !n ? (!x || x < index ? index : x + 1) : n,
        item = '<fieldset class="group-input countable"><legend> Item<span></span></legend><label for=title_x_>Título do item</label><input type=text name=meta[item_x_][title_x_] id=title_x_ required><label for=subtitle_x_>Subtítulo do item (opcional)</label><input type=text name=meta[item_x_][subtitle_x_] id=subtitle_x_><label for=image_x_>Imagem do item (opcional)</label><input style=background-image: linear-gradient(#dcdcde, #dcdcde) type=url name=meta[item_x_][image_x_] id=image_x_><a href=# role=button class=page-title-action onclick=selectfile(this,event)>Selecionar imagem</a><label for=video_x_>Vídeo (opcional)</label><input type=url name=meta[item_x_][video_x_] id=video_x_><label for=url_x_>Link (opcional)</label><input type=url name=meta[item_x_][url_x_] id=url_x_><label for=text_x_>Texto do item (opcional)</label><textarea name=meta[item_x_][text_x_] id=text_x_></textarea><div class=submitbox><a href=# role=button class="submitdelete deletion" onclick=removeItem(this,event)>Remover Item</a></div></fieldset>',
        grid = '<fieldset class="group-input countable"><legend> Temporada<span></span></legend><label for=title_x_>Título da Temporada</label><input type=text name=meta[item_x_][title_x_] id=title_x_ required><label for=text_x_>Texto da Temporada (opcional)</label><textarea name=meta[item_x_][text_x_] id=text_x_></textarea><div class=submitbox><a href=# role=button class="submitdelete deletion" onclick=removeItem(this,event)>Remover Temporada</a></div></fieldset>',
        m = document.getElementById(d),
        p = eval(m.dataset.scope),
        r = p.replaceAll('_x_', `_${i}`)
    m.insertAdjacentHTML('beforeend', r)
    !n && (index = i + 1);
}

function removeItem(t, e) {
    e.preventDefault()
    t.closest(".countable").remove()
}