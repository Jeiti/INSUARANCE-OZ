$(document).ready(function(){
    $("#reload_captcha").click(function(){
        $.ajax({
            url:"/captcha.php",
            success:function(data){
                $("#img_captcha").attr("src", "/captcha.php")
            }
        });
    });
});