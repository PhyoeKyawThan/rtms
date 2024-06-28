<?php
include(__DIR__."/../../model/contact_info.php");
$contact_info = new ContactInfo(__DIR__."/../../public/assets/js/contact.json");

$address = $contact_info->getAddress();
$email = implode(", ",$contact_info->getEmail());
$phone = implode(", ",$contact_info->getPhone());

?>