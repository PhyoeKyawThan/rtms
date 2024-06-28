<?php
include(__DIR__."/../../model/contact_info.php");

$contact_info = new ContactInfo(__DIR__."/../../public/assets/js/contact.json");

$address = $_POST["address"];
$phones = $_POST["phones"]; // Changed to "phones" to match the form input names
$emails = $_POST["emails"]; // Changed to "emails" to match the form input names
$map = $_POST["map"]; // Added handling for the map URL

if ($contact_info->getAddress() != $address) {
    $contact_info->setAddress($address);
}
$contact_info->setPhone($phones);
$contact_info->setEmail($emails);
$contact_info->setMap($map); // Set the map URL

header("Location: /home?p=contact&message=Updated");
exit;
?>
