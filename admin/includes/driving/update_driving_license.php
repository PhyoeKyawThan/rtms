<?php
include(__DIR__."/../../model/db.php");
$db = new DB();

// get datas 
$licene_data = [
    "name" => $_POST["name"],
    "nrc" => $_POST["nrc"],
    "license"=> $_POST["license"],
    "father_name" => $_POST["father_name"],
    "birth_date" => $_POST["birth_date"],
    "address" => $_POST["address"],
    "exp_date" => $_POST["exp_date"],
    "license_type"=>$_POST["license_type"],
    "card_number" => $_POST["card_number"],
    // "license_type" => $_POST["license_type"],
];
print_r($licene_data);
// exit;
if($db->update("driving_license", $licene_data, array(
    "driving_id"=>$_GET["id"]
))){
    $deleted_pending = $db->delete("driving_id",$_GET["id"], "pending_license");
    if($deleted_pending){
        $track = $db->insert("track_register", array(
            "driving_id"=>$_GET["id"]
        ));
    }
    http_response_code(200);
    header("Location: /view_driving_license?id=".$_GET["id"]."&message=ကဒ်အမှတ် - ". $licene_data["card_number"] .",".$licene_data["name"]." ပိုင်ရှင်အမည် ထည့်ပြီးပါပြီ");
    exit();
}
http_response_code(500);
header("Location: /view_driving_license?id=".$_GET["id"]."&message=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
exit();

?>