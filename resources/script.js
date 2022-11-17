const nameIsEmptyMessage = "*Необходимо заполнить имя"
const nameTooSmallMessage = "*Имя должно быть больше 3-х символов"
const nameTooLargeMessage = "*Имя должно быть меньше 32-х символов"
const phoneNotValidMessage = "*Необходимо заполнить телефон";



const validateName = (value) => {
    let isValid = true;
    let message = "";

    if (value.length === 0) {
        message = nameIsEmptyMessage;
        isValid = false
    }
    else if (value.length <= 3) {
        message = nameTooSmallMessage;
        isValid = false
    }
    else if (value.length > 32) {
        message = nameTooLargeMessage;
        isValid = false;
    }

    return { isValid, message };
}

const validatePhone = (value) => {
    const isValid = /^\+7\s\(\d{3}\)\s\d{3}\s\d{4}$/.test(value)
    const message = isValid ? "" : phoneNotValidMessage
    return { isValid, message };
}




// app run (начало)
$(document).ready(function ($) {
    $('#callrequest').submit(submitHandler);
    $('input[name="phone-number"]').mask('+7 (000) 000 0000');
    $('input[name="name"]').focusout(function () {
        SetValidationStatus("name", validateName($(this).val()));
    });

    $('input[name="phone-number"]').focusout(function () {
        SetValidationStatus("phone-number", validatePhone($(this).val()));
    })

    $(".js-question-btn").click(collapseAccordion);

    $('#close-modal-window-form').click(() => { 
            closeModel('modal-window-form');
            SetValidationStatus("name", {isValid:true, message:"" })
            SetValidationStatus("phone-number", {isValid:true, message:"" })
        })
    $('.btn-open-modal-window').click(() => openModel('modal-window-form'));

    $('.show-more-link').click(showMore)

    $("img.img-svg").each(replaceSvg);


    $('#burger-menu-button').click(changeBurgerMenuState)
});

function showMore()
{
    $('.hidden-service-article').removeClass('d-none');
    $(this).remove();
}


function changeBurgerMenuState()
{
    const id = $(this).attr("data-collapse-for");

    const elem = $(`[data-collase-target='${id}']`);
    var attr = elem.attr("closed");
    if (typeof attr !== 'undefined' && attr !== false) {
        elem.removeAttr('closed');
    }
    else {
        elem.attr('closed', '')
    }
}



function replaceSvg() {
    let $img = $(this);
    let imgClass = $img.attr("class");
    let imgURL = $img.attr("src");
    $.get(imgURL, function (data) {

        let $svgbox = $("<div class='svg-box'></div>")
        let $svg = $(data).find("svg");
        if (typeof imgClass !== "undefined") {
            $svg = $svg.attr("class", imgClass + " replaced-svg");
        }
        $svg = $svg.removeAttr("xmlns:a");
        if (!$svg.attr("viewBox") && $svg.attr("height") && $svg.attr("width")) {
            $svg.attr("viewBox", "0 0 " + $svg.attr("height") + " " + $svg.attr("width"))
        }
        $svgbox.append($svg)
        $img.replaceWith($svgbox);
    }, "xml");

}


function openModel(id) {
    $(`#${id}`).removeClass('d-none');
}

function closeModel(id) {
    $(`#${id}`).addClass('d-none');
}

function collapseAccordion() {
    const id = $(this).attr("data-collapse-for");

    const elem = $(`[data-collase-target='${id}']`);
    var attr = elem.attr("closed");
    if (typeof attr !== 'undefined' && attr !== false) {
        elem.removeAttr('closed');
    }
    else {
        elem.attr('closed', '')
    }
}


function submitHandler(event) {
    let request = $(this).serializeArray().reduce(function (target, key) {
        target[key.name] = key.value;
        return target;
    }, {});

    let nameValidation = validateName(request["name"]);
    let phoneValidation = validatePhone(request["phone-number"]);

    SetValidationStatus("name", nameValidation)
    SetValidationStatus("phone-number", phoneValidation)

    if (nameValidation.isValid && phoneValidation.isValid) {
        axios.post('/send-user-request', request)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                alert("Упс.. произошла ошибка.")
            });
    }

    return false;
}


function SetValidationStatus(prop, validationInfo) {
    let elem = $(`.input-validator[data-error-for='${prop}'`);
    var attr = elem.attr("not-valid");
    if (validationInfo.isValid && attr !== undefined) {
        elem.removeAttr('not-valid');
    }
    else if(!validationInfo.isValid) {
        elem.attr('not-valid', '')
    }

    $(`.input-validator[data-error-for='${prop}'] .valid-message`).text(validationInfo.message);
}


// app run (конец)