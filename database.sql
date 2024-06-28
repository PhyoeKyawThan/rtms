CREATE DATABASE rdms;

USE rdms;

CREATE TABLE extra_specific (
    id INT PRIMARY KEY AUTO_INCREMENT,
    engine VARCHAR(100),
    gear VARCHAR(100)
);

CREATE TABLE vehicle_license (
    id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_number VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    nrc VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    vehicle_brand VARCHAR(50) NOT NULL,
    vehicle_type VARCHAR(50) NOT NULL,
    unique_no VARCHAR(100) UNIQUE NOT NULL,
    vehicle_weight INT NOT NULL, -- kg --
    vehicle_load INT NOT NULL, -- p --
    color VARCHAR(10) NOT NULL,
    register_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    exp_date DATETIME NOT NULL,
    extra_specific_id INT,
    FOREIGN KEY (extra_specific_id) REFERENCES extra_specific(id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_number VARCHAR(10) NOT NULL,
    username VARCHAR(50) NOT NULL, 
    profile_url VARCHAR(100) DEFAULT "default.png",
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100), 
    password VARCHAR(255),
    birth_date DATE,
    register_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE review(
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    content VARCHAR(200) NOT NULL,
    reviewed_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE admin (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    register_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE manual(
    id INT PRIMARY KEY AUTO_INCREMENT,
    manual_path VARCHAR(50) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    admin_id INT NOT NULL,
    FOREIGN KEY(admin_id) REFERENCES admin(admin_id)
);

CREATE TABLE news(
    news_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    image VARCHAR(200),
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(admin_id) REFERENCES admin(admin_id) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE driving_license(
    driving_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    license VARCHAR(15) NOT NULL,
    nrc VARCHAR(20) NOT NULL,
    father_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL, 
    address VARCHAR(255),
    exp_date DATETIME NOT NULL,
    card_number VARCHAR(30) NOT NULL UNIQUE,
    license_type VARCHAR(10),
    update_date DATETIME,
    register_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pending_license(
    pending_id INT PRIMARY KEY AUTO_INCREMENT,
    driving_id INT,
    name VARCHAR(50) NOT NULL,
    current_card VARCHAR(30) NOT NULL,
    want_license VARCHAR(10) NOT NULL,
    address VARCHAR(255) NOT NULL,
    father_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(driving_id) REFERENCES driving_license(driving_id) ON DELETE CASCADE
);

CREATE TABLE track_register(
    track_id INT PRIMARY KEY AUTO_INCREMENT,
    driving_id INT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(driving_id) REFERENCES driving_license(driving_id) ON DELETE CASCADE
);

CREATE TABLE `contact` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  `content` TEXT NOT NULL,
  `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE expired_vehicle(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    vehicle_number VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    nrc VARCHAR(20) NOT NULL,
    vehicle_brand VARCHAR(50) NOT NULL,
    vehicle_type VARCHAR(50) NOT NULL,
    unique_no VARCHAR(100) UNIQUE NOT NULL
);