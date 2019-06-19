$(document).ready(function () {
    'use strict';
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });


});

function customValidateForm(id) {
    var customform = document.getElementById(id);
    customform.addEventListener('isFormValid', function (event) {
        if (customform.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            customform.classList.add('was-validated');
        } else {
            customform.classList.remove('was-validated');
        }

    }, false);

}