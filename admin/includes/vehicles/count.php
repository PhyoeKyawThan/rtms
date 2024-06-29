<?php
include(__DIR__."/../../model/db.php");
function get_count($vehicle_type): int{
    $db = new DB();
    if($db->is_connected()){
<<<<<<< HEAD
        $sql = "SELECT COUNT(*) FROM vehicle_license WHERE vehicle_type= ? ";
=======
        $sql = "SELECT COUNT(*) FROM vehicle_license WHERE vehicle_type= ? AND YEAR(register_date)=YEAR(CURRENT_TIMESTAMP)";
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
        // get connection
        $connect = $db->get_connection();
        if($connect){
            $result = $connect->prepare($sql);
            $result->bind_param("s", $vehicle_type);
            $result->execute();
            $count = $result->get_result();
            $count = $count->fetch_assoc();
            if($count){
                return $count["COUNT(*)"];
            }
            return 0;
        }
    }
    return 0;
}

$vehicle_counts = [
    'ဆိုင်ကယ်' => get_count('ဆိုင်ကယ်'),
    'သုံးဘီး' => get_count('သုံးဘီး'),
    'ထော်လာဂျီ' => get_count('ထော်လာဂျီ'),
    'ကား' => get_count('ကား'),
];

header('Content-Type: application/json');
echo json_encode($vehicle_counts, JSON_UNESCAPED_UNICODE);


?>