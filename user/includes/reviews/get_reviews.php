<?php

if($db->is_connected()){
    $sql = "SELECT review.*, user.username, user.profile_url from review join user where user.user_id = review.user_id order by review.review_id desc";
    $connect = $db->get_connection();
    $result = $connect->prepare($sql);
    $result->execute();
    $result = $result->get_result();
    $reviews = [];
    while($row = $result->fetch_assoc()){
        $reviews[] = $row;
    }
}
