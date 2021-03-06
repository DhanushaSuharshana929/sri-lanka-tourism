$(document).ready(function () {

    $('#tour-sub-picture').change(function () {

        $('#loading').show();
        var formData = new FormData($('#form-new-tour-sub-section-photo')[0]);

        $.ajax({
            url: "post-and-get/ajax/add-new-tour-sub-photo.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                var arr = mess.filename.split('.');

                var html = '';
                html += '<div class="col-md-3" style="padding-bottom: 15px" id="div_' + mess.id + '">';
                html += '<img src="../upload/tour-package/sub-section/thumb/' + mess.filename + '" class="img-responsive "> ';
                html += '<a class="aa">';
                html += '<button class="delete-tour-sub-photo delete-icon btn btn-danger btn-md fa fa-trash-o" data-id="' + mess.id + '"></button>';
                html += '</a>';
                html += '</div>';
                $('#image-list').prepend(html);
                $('#empty-mess').hidden();
                $('#loading').hide();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });


});
