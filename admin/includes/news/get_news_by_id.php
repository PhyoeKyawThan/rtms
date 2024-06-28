<?php
include __DIR__."/../../model/db.php";

function get_data($id){
    $db = new DB();
    if($db->is_connected()){
        return $db->get_data_by_id('news', $id, 'news_id');
    }else{
        return "Something Wrong";
    }
}

?>