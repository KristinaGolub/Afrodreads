// app run (начало)
$(document).ready(function ($) {
    $('.js-open-img-full').click(function(){
        let src = $(this).attr('data-original-src')
        $('#modal-window-original-photo').removeClass('d-none');
        let content = `<img class="original-img" src="${src}"></img>`
        $("#original-photo-box").append(content)
    });

    $('#close-modal-window-original-photo').click(function() {
        $('#modal-window-original-photo').addClass('d-none');
        $("#original-photo-box").empty();
    })
});