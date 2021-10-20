<?php
session_start();
include('connect_db.php');
session_destroy();
header("Location:index.php");
?>