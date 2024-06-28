<?php
session_start();
unset($_SESSION["current_admin"]);
header("Location: /home?message=Login Here");
exit();

?>