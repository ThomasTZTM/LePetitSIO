<?php
session_start();
$_SESSION=[];

session_destroy();
header(header: "Location: ../index.php");
exit();
?>