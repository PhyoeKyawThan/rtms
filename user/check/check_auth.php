<?php
session_start();
if(!isset($_SESSION["current_user"])){
    header("Location: /login?message=You Must Login First");
    exit;
}
?>