<?php
$link=mysqli_connect("localhost", "root", "", "insuarance");

$query="insert into user(login,password) values ('$_POST[username]', '$_POST[password]')";
if (mysqli_query($link,$query)){
    echo "success";
}
else{
    echo mysqli_error($link);
}


mysqli_close($link);


