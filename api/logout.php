<?php

session_start();
session_destroy();
$pre_loc = $_SESSION["lasturl"];
header("location:$pre_loc");

?>