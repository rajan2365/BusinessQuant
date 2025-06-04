jQuery(document).ready(function ($) {
    $('#submit_button').on('click', function () {
        const userName = $('#user_name').val();

        $.ajax({
            url: myPluginAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'submit_user_name',
                name: userName,
                nonce: myPluginAjax.nonce
            },
            success: function (response) {
                $('#response').text(response.data.message);
            },
            error: function () {
                $('#response').text('Something went wrong.');
            }
        });
    });
});
