<?php

include __DIR__."/../../model/db.php";
$db = new DB();
$vehicles = $db->get_all_datas('vehicle_license', 'id');

?>