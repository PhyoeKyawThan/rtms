<?php 
include(__DIR__."/../../model/db.php");

if(isset($_POST["card_no"])){
    $card_number = $_POST["card_no"];
    $db = new DB();
    if($db->is_connected()){
        $card = $db->get_data_by_unique_string("driving_license", $card_number, "card_number");
        if($card["driving_id"]){
            header("Location: /home?p=check_driving&valid=");
            exit;
        }
        header("Location: /home?p=check_driving&invalid=");
        exit;
    }
}

?>

