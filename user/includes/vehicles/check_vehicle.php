<?php
include_once(__DIR__."/../../model/get_datas.php");

$vehicle_number = $_GET["v_number"];


function diffMonth($exp_date)
{
    $current_date = new DateTime();
    $exp_date = new DateTime($exp_date);
    if($current_date >= $exp_date){
        $diffVAl = $exp_date->diff($current_date);
        return array("fees" => 32000, "last_date" => $diffVAl->format("<b>သက်တမ်းတိုးရမည့်ရက်ထက် %Y နှစ် %m လ %d ရက် ကျော်လွန်နေပါသည်</b>"));
    }
    $diffVAl = $exp_date->diff($current_date);
    return array("fees" => 30000, "last_date" => $diffVAl->format("%Y နှစ် %m လ %d ရက်"));
}
if (isset($vehicle_number)) {
    $views = new GetDatas("vehicle_license");
    $vehicle = $views->get_data_by_vehicle_number($vehicle_number);
    if (isset($vehicle["id"])) {
        $last_date = diffMonth($vehicle["exp_date"]);
        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode(
            array(
                "success" => true,
                "data" => array(
                    "name" => $vehicle["name"],
                    "exp_date" => $last_date["last_date"],
                    "fees_for_renew" => $last_date["fees"] == 32000 ? "<b>ကျသင့်ငွေ + ဒဏ်ကြေး</b> = 30000 + 2000 = 32000" : " 30000"
                )
            )
        );
        exit();
    }
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode(array("success" => false, "message" => "Something wrong"));
    exit();
}


?>