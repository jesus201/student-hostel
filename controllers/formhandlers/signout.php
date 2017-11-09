<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/oop2/core/init.php';

session_destroy();
header("location:../../index.php");
?>