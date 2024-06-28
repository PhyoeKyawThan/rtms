<?php



    $_db = new DB();
    if ($_db->is_connected()) {
        $connect = $_db->get_connection();
        // delete after 5 year from exp_date
        $sql = "SELECT * FROM vehicle_license WHERE TIMESTAMPDIFF(YEAR, exp_date, NOW()) > 5";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = $_db->get_data_by_unique_string("user", $row["vehicle_number"], "vehicle_number");
                // print_r(array(
                //     "vehicle_number"=> $row["vehicle_number"],
                //     "email" => $user["email"],
                //     "name"=> $row["name"],
                //     "nrc"=> $row["nrc"],
                //     "vehicle_brand"=> $row["vehicle_brand"],
                //     "vehicle_type"=> $row["vehicle_type"],
                //     "unique_no"=> $row["unique_no"]
                // ));
                // exit;
                echo $_db->insert("expired_vehicle", array(
                    "vehicle_number"=> $row["vehicle_number"],
                    "email" => $user["email"],
                    "name"=> $row["name"],
                    "nrc"=> $row["nrc"],
                    "vehicle_brand"=> $row["vehicle_brand"],
                    "vehicle_type"=> $row["vehicle_type"],
                    "unique_no"=> $row["unique_no"]
                ));
                // exit;
            }
        }
        $sql = "DELETE FROM vehicle_license WHERE TIMESTAMPDIFF(YEAR, exp_date, NOW()) > 5";
        $stmt = $connect->prepare($sql);
        if ($stmt->execute()) {
            // Success
            // echo "Deleted records where expiration date is more than 5 years ahead of the current date.";
        } else {
            // Error handling
            // echo "Error deleting records.";
        }
    }
?>