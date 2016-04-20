$(document).ready(function(){
    $("#reload_captcha").click(function(){
        $("#img_captcha").attr("src", "/captcha.php?" + (new Date()).getTime());
    });
    $.ajax({
        url:'/news.php',
        success: function(data){
            $('body>div.container:first-child').append(data);
        },
    });
});
