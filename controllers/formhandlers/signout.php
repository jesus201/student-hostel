<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/core/init.php';

session_destroy();
header("location:../../index.php");
?>