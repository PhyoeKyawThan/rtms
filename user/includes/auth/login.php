<?php
session_start();
include(__DIR__."/../../model/db.php");

$db = new DB();

if($db->is_connected()){
    $sql = "SELECT * FROM user WHERE email = ? AND password = ? ";
    $connect = $db->get_connection();
    if(!isset($_POST["email"]) || !isset($_POST["password"])){
        http_response_code(403);
        header("Location: /login?error=Be Sure Your Info are Fill");
        exit;
    }
    $user = $connect->prepare($sql);
    $user->bind_param("ss", $_POST["email"], $_POST["password"]);
    $user->execute();
    $user = $user->get_result();
    if($user->num_rows > 0){
        $user = $user->fetch_assoc();
        $_SESSION["current_user"] = $user;
        http_response_code(200);
        header("Location: /");
        exit;
    }
    http_response_code(404);
    header("Location: /login?error=Incorrect email or Password");
    exit;
}

http_response_code(500);
header("Location: /login?error=Something wrong with Server Please Contact to admin");
exit;
