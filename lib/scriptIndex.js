$(document).ready(function () {
    $("#txtEmail").focus();
    $("#txtEmail").keyup(function () {
        var email = $(this).val();
        var verificar_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var md5 = $.md5(email);

        if (verificar_email.test(email)) {
            $("#avatar").attr("src", 'http://www.gravatar.com/avatar.php?gravatar_id=' + md5 + '?d=mm');
        }
    });
});