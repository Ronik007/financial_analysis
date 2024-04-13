$(document).ready(function () {

    // Result Form Handling 

    $('#result_entry_form').submit(function (e) { 
        e.preventDefault();
        var values = $(this).serialize();
        console.log(values);
    });

});