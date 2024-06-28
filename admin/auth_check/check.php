<?php
session_start();
if(!isset($_SESSION["current_admin"])){
  http_response_code(401);
  header("Location: /login?message=You Must Login To Continue");
  exit();
}
?>