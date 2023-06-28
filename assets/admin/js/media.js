function selectfile(t, e) {
    (function ($) {
        e.preventDefault();
        let button = $(t),
            custom_uploader = wp.media({
                title: "Biblioteca de mídia",
                button: {
                    text: "Selecionar"
                },
                multiple: !1
            }).on("select", (function () {
                let attachment = custom_uploader.state().get("selection").first().toJSON();
                button.prev().val(attachment.url).css('background-image', 'url(' + attachment.url + ')')
            })).open()
    })(jQuery);
}