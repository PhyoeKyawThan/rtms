<?php
include(__DIR__."/../../model/db.php");
$db = new DB();

// get datas 
$licene_data = [
    "name" => $_POST["name"],
    "nrc" => $_POST["nrc"],
    "license" => $_POST["license"],
    "father_name" => $_POST["father_name"],
    "birth_date" => $_POST["birth_date"],
    "address" => $_POST["address"],
    "exp_date" => $_POST["exp_date"],
    "card_number" => $_POST["card_number"],
    "license_type" => $_POST["license_type"],
];

if($db->insert("driving_license", $licene_data)){
    http_response_code(200);
    header("Location: /add_driving_license?message=ကဒ်အမှတ် - ". $licene_data["card_number"] .",".$licene_data["name"]." ပိုင်ရှင်အမည် ထည့်ပြီးပါပြီ");
    exit();
}
http_response_code(500);
header("Location: /add_driving_license?message=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
exit();

?>