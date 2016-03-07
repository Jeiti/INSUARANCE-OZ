<?php
if (isset($_POST['register'])){
    if ($_POST['password'] != $_POST['password2']){
        die ("Password not correct");
    }
    $link=mysqli_connect("localhost", "root", "123", "insuarance");
    if (!$link){
        die ("ERROR!");
    }
    $query="insert into user(login,password) values ('$_POST[username]', '$_POST[password]')";
    if (mysqli_query($link,$query)){
        echo "success";
    }
    else{
        echo mysqli_error($link);
    }

    mysqli_close($link);
    exit;
}

?>

<?php
require_once("header.php");
?>

    <!--Body-->
    <div class="row">
        <div class="col-md-3 column ui-sortable"></div>
        <div class="col-md-6 column ui-sortable">
            <form class="" role="form"  method="post" action="register.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter login" type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" placeholder="Enter password" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputRepeatPassword1">Repeat your password</label>
                    <input class="form-control" id="exampleInputRepeatPassword1" placeholder="Repeat password" type="password" name="password2">
                </div>
                <button type="submit" class="btn btn-success" name="register">Register</button>
            </form>
        </div>
        <div class="col-md-3 column ui-sortable"></div>
    </div>
    <!--Body-->

<?php
require_once("footer.php");