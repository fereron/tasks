$(document).ready(function () {

    $('#btn-preview').on('click', function (e) {
        e.preventDefault();
        $("#preview").show();

        var name = $('#name').val();
        var email = $('#email').val();
        var text = $('#text').val();

        $('#preview-name').text(name);
        $('#preview-email').text(email);
        $('#preview-text').text(text);
    });


});