<?php
session_start();
include_once "path.php";

unset($_SESSION['id']);
unset($_SESSION['user']);
unset($_SESSION['admin']);


header('location: ' . PATH_URL );