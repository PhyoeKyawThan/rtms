<?php

$all_news = $db->get_all_datas("news", "news_id");
if(isset($_GET["news_id"])){
    $news_info = $db->get_data_by_id("news", $_GET["news_id"], "news_id");
}
?>