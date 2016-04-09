<?php
error_reporting(E_ALL);

if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(isset($_POST["register"])) {
    header("content-type: text/html; charset=utf-8");
    if($_POST["captcha"]!=$_SESSION["captcha"]){
        $message="Не правильно введено проверочное слово";
    }
    elseif (($_POST["password"] == $_POST["password2"]) && (!empty($_POST["username"]))) {
        /*Работа с БД*/
        require_once("config.inc");
        $query = "SELECT * FROM user WHERE login = '$_POST[username]'";
        if (!mysqli_query($link, $query)) {
            echo mysqli_error($link);
        }
        else {
            if (mysqli_num_rows(mysqli_query($link, $query)) == 1) {
                $message = "Такой пользователь уже существует, выберите другое имя!";
            }
            else {
                $query2 = "INSERT INTO user(login, password, avatar) VALUES('$_POST[username]', '" . md5($_POST['password']) . "', '" . $_FILES["avatar"]["name"] . "')";
                if (mysqli_query($link, $query2)) {
                    $_SESSION["flash"]["info"] = "WELCOME";
                    $_SESSION["user"] = $_POST["username"];
                    chmod("/img/avatars_img/", 0777);
                    $filename = __DIR__."/img/avatars_img/" . $_FILES["avatar"]["name"];
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $filename);



                    header("location: ./index.php");
                    exit;
                }
                else {
                    echo mysqli_error($link);
                }
            }
            mysqli_close($link);
        }
    }
    elseif((empty($_POST["username"])) && (empty($_POST["password"])) && (empty($_POST["password2"]))){
        $message = "Введите данные";
    }
    else{
        $message = "Пароли не совпадают попробуйте еще раз!";
    }
}

?>

<?php
require_once ("header.php");
echo $message;
?>

    <div class="row">
        <div class="col-md-3 column ui-sortable"></div>
        <div class="col-md-6 column ui-sortable">
            <form class="" role="form"  method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="register_login">E-mail</label>
                    <?php if(($_POST["password"]!=$_POST["password2"] && mysqli_num_rows(mysqli_query($link, $query))==0) || (!$_POST["captcha"]!=$_SESSION["captcha"])):?>
                        <input class="form-control" id="register_login" placeholder="Enter e-mail" type="email" name="username" value="<?php echo $_POST['username'];?>">
                    <?php else:?>
                        <input class="form-control" id="register_login" placeholder="Enter e-mail" type="email" name="username">
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="register_password">Password</label>
                    <input class="form-control" id="register_password" placeholder="Enter password" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="register_password2">Repeat your password</label>
                    <input class="form-control" id="register_password2" placeholder="Repeat password" type="password" name="password2">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="enter_captcha">Enter captcha</label>
                            <input class="form-control" id="enter_captcha" type="text" name="captcha">
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-2">
                            <button type="button" class="glyphicon glyphicon-refresh" name="reload_captcha" id="reload_captcha" style="position: absolute; left: 85px; top: 22.5px; height: 38px; width: 38px"></button>
                        </div>
                        <div class="col-md-4">
                            <img src="captcha.php" id="img_captcha" style="position: absolute; right: 15px; bottom: -58px;">
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------->
                    </div>
                </div>
            <div class="form-group">
                <label for="inputfile">Выберите аватар для загрузки</label>
                <input id="inputfile" type="file" name="avatar">
            </div>
                <button type="submit" class="btn btn-success" name="register">Register</button>
            </form>
        </div>
    </div>


<?php
require_once("footer.php");