<?php
include_once(__DIR__ . "/../../model/get_datas.php");

// Get card number and license type from the request
$card_no = isset($_GET["card_no"]) ? $_GET["card_no"] : null;
$license_type = isset($_GET["license_type"]) ? $_GET["license_type"] : null;

// Function to determine the price based on license type
function which_price(string $license_type): int
{
    switch ($license_type) {
        case "သ":
            return 3000;
        case "က":
            return 12000;
        case "ခ":
            return 50000;
        case "ဃ":
            return 60000;
        case "င":
            return 75000;
        case "ဟ":
            return 30000;
        case "ဌ":
            return 30000;
        case "စ":
            return 15000;
        default:
            return 0;
    }
}

// Function to calculate the difference in months and fees based on the expiration date and license type
function diffMonth($exp_date, $license_type)
{
    $current_date = new DateTime();
    $exp_date = new DateTime($exp_date);
    $fee = which_price($license_type);
    
    if ($current_date >= $exp_date) {
        $diffVal = $exp_date->diff($current_date);
        switch ($license_type) {
            case "သ":
                $fee += 3000;
                break;
            case "က":
                $fee += 2400;
                break;
            case "ခ":
                $fee += 10000;
                break;
            case "ဃ":
                $fee += 20000;
                break;
            case "င":
                $fee += 25000;
                break;
            case "ဟ":
                $fee += 6000;
                break;
            case "ဌ":
                $fee += 6000;
                break;
            case "စ":
                $fee += 3000;
                break;
            default:
                $fee = 0;
        }
        return array(
            "is_exp"=>true,
            "fees" => $fee,
            "last_date" => $diffVal->format("<b>သက်တမ်းတိုးရမည့်ရက်ထက် %Y နှစ် %m လ %d ရက် ကျော်လွန်နေပါသည်</b>")
        );
    }
    
    $diffVal = $exp_date->diff($current_date);
    return array(
        "is_exp"=>false,
        "fees" => which_price($license_type),
        "last_date" => $diffVal->format("%Y နှစ် %m လ %d ရက်")
    );
}

// Check if card number is provided
if ($card_no) {
    $views = new GetDatas("driving_license");
    $driving = $views->get_data_by_unique_string("driving_license", $card_no, "card_number");
    
    if (isset($driving["driving_id"])) {
        $last_date = diffMonth($driving["exp_date"], $license_type);
        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode(
            array(
                "success" => true,
                "data" => array(
                    "name" => $driving["name"],
                    "exp_date" => $last_date["last_date"],
                    "fees_for_renew" => $last_date["is_exp"] ? "<b>ကျသင့်ငွေ + ဒဏ်ကြေး</b> = ".$last_date['fees'] : $last_date["fees"]
                )
            )
        );
        exit();
    }
    // If no driving ID found
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode(array("success" => false, "message" => "Something wrong"));
    exit();
} else {
    // If card number is not provided
    http_response_code(400);
    header("Content-Type: application/json");
    echo json_encode(array("success" => false, "message" => "Card number is required"));
    exit();
}
?>
