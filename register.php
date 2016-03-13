<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}



if(isset($_POST["register"])){
    header("content-type: text/html; charset=utf-8");
    if($_POST["password"]==$_POST["password2"]){
/*Работа с БД*/
        $link=mysqli_connect("localhost","root","123","insuarance");
        $query="SELECT * FROM user WHERE login = '$_POST[username]'";
        $select_user=mysqli_query($link, $query);
        if(!$select_user){
            echo mysqli_error($link);
        }
        else
            if(mysqli_num_rows($select_user)==1){
            echo "Такой пользователь существует";
            }
            else{
                $query2="INSERT INTO user(login, password) VALUES('$_POST[username]', '".md5 ($_POST['password'])."')";
                if(mysqli_query($link, $query2)){
                    $_SESSION["user"]=$_POST["username"];
                    header("location: ./index.php");
                }
                else{
                    echo mysqli_error($link);
                }
            }
        mysqli_close($link);
    }
    else{
        echo "<h1>Пароли не совпадают, попробуйте еще раз!!!</h1>";
    }
    exit;
}

?>

<?php
require_once ("header.php");
?>

    <div class="row">
        <div class="col-md-3 column ui-sortable"></div>
        <div class="col-md-6 column ui-sortable">
            <form class="" role="form"  method="post" action="">
                <div class="form-group">
                    <label for="register_login">E-mail</label>
                    <input class="form-control" id="register_login" placeholder="Enter e-mail" type="email" name="username" value="<?php print_r($_POST['username']);?>">
                </div>
                <div class="form-group">
                    <label for="register_password">Password</label>
                    <input class="form-control" id="register_password" placeholder="Enter password" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="register_password2">Repeat your password</label>
                    <input class="form-control" id="register_password2" placeholder="Repeat password" type="password" name="password2">
                </div>
                <button type="submit" class="btn btn-success" name="register">Register</button>
            </form>
        </div>
        <div class="col-md-3 column ui-sortable"></div>
    </div>


<?php
require_once("footer.php");