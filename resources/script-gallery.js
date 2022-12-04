function setImageByIndex(index)
{
    let elem = $(`.gallery-content .js-open-img-full[data-index=${index}]`);
    let gallerySize = $(`.gallery-content .js-open-img-full`).length;
    console.log(gallerySize);
    let prev = index != 0 ? index - 1 : gallerySize - 1;
    let next = index + 1 != gallerySize ? index + 1 : 0;
    let src = elem.attr('data-original-src');

    $("#modal-window-original-photo .arrow-left").attr("data-index", prev)
    $("#modal-window-original-photo .arrow-right").attr("data-index", next)
    $("#original-photo-box").append(`<img class="original-img" src="${src}"></img>`);
    $('#modal-window-original-photo').removeClass('d-none');
}



// app run (начало)
$(document).ready(function ($) {
    $('#close-modal-window-original-photo').click(function() {
        $('#modal-window-original-photo').addClass('d-none');
        $("#original-photo-box").empty();
    })

    $(".gallery-content .js-open-img-full").each(function(index){
        $(this).attr("data-index", index)
        $(this).click(function() { setImageByIndex(index) })
    })

    $("#modal-window-original-photo .arrow-left").click(function() {setImageByIndex($(this).attr("dataindex"))});
    $("#modal-window-original-photo .arrow-rght").click(function() {setImageByIndex($(this).attr("dataindex"))});
});