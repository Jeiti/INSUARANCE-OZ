$(document).ready(function(){
    $("#reload_captcha").click(function(){
        $("#img_captcha").attr("src", "/captcha.php?" + (new Date()).getTime());
    });
});
