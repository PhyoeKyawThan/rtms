<?php
session_start();
include(__DIR__ ."/../model/db.php");

$db = new DB();

if($db->is_connected()) {
    $connect = $db->get_connection();
    if($connect) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $request = $connect->prepare($query);
        $request->bind_param("ss", $username, $password);
        $request->execute();
        $result = $request->get_result();
        if($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            $_SESSION["current_admin"] = $result;
            http_response_code(200);
            // print_r($_SESSION["current_admin"]);
            header("Location: /home");
            exit();
        }
        http_response_code(404);
        header("Location: /login?message=Incorrect Username or Password");
        exit();
    }
    http_response_code(500);
    header("Location: /login?error=Something wrong with Server");
    exit();
}

?>