<?php
define("DBHOSTNAME", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "123");
define("DBBDNAME", "insuarance");
define("NEWSPERPAGE", "3");
define("OUTPUTNEWS", "5");

$link = mysqli_connect(DBHOSTNAME, DBUSER, DBPASSWORD, DBBDNAME);
