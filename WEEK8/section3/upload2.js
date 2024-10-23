$(document).ready(function() {
    $('#upload-form').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);

        // Disable submit button to prevent duplicate submissions
        $('input[type="submit"]').attr("disabled", true);

        $.ajax({
            type: 'POST',
            url: 'upload_ajax2.php',  // Make sure this matches the form action
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#status').html(response);
                $('input[type="submit"]').removeAttr("disabled");  // Re-enable submit button
            },
            error: function() {
                $('#status').html('Terjadi kesalahan saat mengunggah file.');
                $('input[type="submit"]').removeAttr("disabled");  // Re-enable submit button
            }
        });
    });
});
