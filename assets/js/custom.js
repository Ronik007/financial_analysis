$(document).ready(function () {

    // Only Numeric data with decimal

    $('#result_entry_form input.numberData').on('input', function () {
        var getInput = $(this).val();
        var filteredInput = getInput.replace(/[^0-9.]+/g, '');
        $(this).val(filteredInput);
    });

    // Result Form Handling 

    $('#result_entry_form').submit(function (e) { 
        e.preventDefault();
        var formData = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "/financial_analysis/includes/ajax/result_form_submission.php",
            data: formData,
            dataType: "json",
            beforeSend: () => {
                $('#btn_loader').show();
            },
            error: () => {
                setTimeout(() => {
                    $('#btn_loader').hide();
                    formError();
                }, 1000);
            },
            success: function (response) {
                setTimeout(() => {
                    $('#btn_loader').hide();
                    if (response.success == true){
                        formSucess(response);
                    }
                    else {
                        formError(response);
                    }
                }, 1000);

            }
        });
    });
    

    function formError(response) {
        $('#form_notification span').addClass('alert-danger');
        if (response.msg) {
            $('#form_notification span').html(response.msg);
        }
        else {
            $('#form_notification span').html('Something went Wrong!');
        }
        showNotification();
    }

    function formSucess(response) {
        $('#form_notification span').addClass('alert-success');
        $('#form_notification span').html(response.msg);
        showNotification();
        $('#result_entry_form').trigger('reset');
    }

    function showNotification() {
        $('#form_notification').css('display', 'flex');
        setTimeout(() => {
            $('#form_notification').fadeOut();
        }, 4000);
    }
});