<?php
session_start();
unset($_SESSION["current_user"]);
http_response_code(200);
header("Location: /");
exit;
?>