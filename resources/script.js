const nameIsEmptyMessage = "Необходимо заполнить имя"
const nameTooSmallMessage = "Имя должно быть больше 3-х символов"
const nameTooLargeMessage = "Имя должно быть меньше 32-х символов"

const phoneNotValidMessage = "Необходимо заполнить телефон";

const validateName = (value) => {
    let isValid = true;
    let message = ""; 

    if(value.length === 0 ){
        message = nameIsEmptyMessage;
        isValid = false
    }
    else if(value.length <= 3){
        message = nameTooSmallMessage;
        isValid = false
    }
    else if(value.length > 32){
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





// app run
$(document).ready(function ($) {
    $('#callrequest').submit(submitHandler);
    $('input[name="phone-number"]').mask('+7 (000) 000 0000');
    $('input[name="name"]').focusout(function() {
        SetValidationStatus("name", validateName($(this).val()));
    });

    $('input[name="phone-number"]').focusout(function() {
        SetValidationStatus("phone-number", validatePhone($(this).val()));
    })
});


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
    $(`span[data-error-for='${prop}']`).text(validationInfo.message);
}

