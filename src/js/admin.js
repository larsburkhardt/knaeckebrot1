console.log("Hello from admin.js");

$ = jQuery.noConflict();

$(document).ready(function () {

    console.log(admin_ajax.ajaxurl);
    
    $('.remove_reservation').on('click', function (e) { 
        e.preventDefault();
        var id = $(this).attr('data-reservation');

        $.ajax({
            type: 'post',
            data: {
                'action' : 'knaeckebrot_delete_reservation', // function in reservations.php
                'id': id,
                'type': 'delete'
            },
            url: admin_ajax.ajaxurl,
            success: function (data) {
                var result = JSON.parse(data);
                console.log(result);

                if (result.response == 'success') {
                    jQuery("[data-reservation'" + result.id + "']").parent().parent().remove();
                }
            }

        });

    });

});
