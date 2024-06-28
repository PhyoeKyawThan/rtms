<?php

class ContactInfo {
    private $filePath;
    private $data;

    public function __construct($filePath) {
        $this->filePath = $filePath;
        $this->readJson();
    }

    private function readJson() {
        if (file_exists($this->filePath)) {
            $json = file_get_contents($this->filePath);
            $this->data = json_decode($json, true);
        } else {
            // Initialize with default structure if file does not exist
            $this->data = [
                "address" => "",
                "email" => [],
                "phone" => [],
                "map" => ""
            ];
        }
    }

    private function writeJson() {
        $json = json_encode($this->data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $json);
    }

    public function getAddress() {
        return $this->data['address'];
    }

    public function setAddress($address) {
        $this->data['address'] = $address;
        $this->writeJson();
    }

    public function getEmail() {
        return $this->data['email'];
    }

    public function setEmail($emails) {
        $this->data['email'] = $emails;
        $this->writeJson();
    }

    public function getPhone() {
        return $this->data['phone'];
    }

    public function setPhone($phones) {
        $this->data['phone'] = $phones;
        $this->writeJson();
    }

    public function getMap() {
        return $this->data['map'];
    }

    public function setMap($map) {
        $this->data['map'] = $map;
        $this->writeJson();
    }
}

// Usage example:
// $contact = new ContactInfo(__DIR__."/../public/assets/js/contact.json");
// echo $contact->getAddress();
// $contact->setAddress('New York');
// print_r($contact->getEmail());
// $contact->setEmail(['new_email@example.com', 'another_email@example.com']);
// print_r($contact->getPhone());
// $contact->setPhone(['1234567890', '0987654321']);
// echo $contact->getMap();
// $contact->setMap('https://www.google.com/maps/embed?...');
?>
