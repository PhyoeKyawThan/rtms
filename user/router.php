<?php
// router.php

$request = trim($_SERVER['REQUEST_URI'], '/');

// Remove any query strings from the request URI
$request = strtok($request, '?');

$ALLOWED_ROUTES = [
    '' => '/views/index.php',
    'home' => '/views/index.php',
    'profile' => '/views/pages/profile.php',
    'login' => '/views/auth/login.php',
    'register'=>'/views/auth/register.php',
    //  views 
    'action/profile/info_update' => '/includes/profile/info_update.php',
    'auth/login' => '/includes/auth/login.php',
    'auth/logout' => '/includes/auth/logout.php',
    // profile actions
    'vehicles/check_vehicle' => '/includes/vehicles/check_vehicle.php',
    'vehicles/vehicle_details' => '/includes/vehicles/vehicle_details',
    // vehicles
    'news/get_all_news'=> '/includes/news/get_all_news.php',
    'news/get_news'=> '/includes/news/get_news.php',
    // news
    'driving/register_driving' => '/includes/driving/register_driving.php',
    'driving/check_card'=> '/includes/driving/check_card.php',
    'driving/card_cost'=> '/includes/driving/card_change_cost.php',
    // driving

    'upload_review'=> '/includes/reviews/upload_review.php',
    // review
    'profile/update' => '/includes/profile/update.php',
    'auth/register' => '/includes/auth/register.php',
    // profile
    'contact/new_contact' => '/includes/contact/user_contact.php',
    // contact form
];

if (isset($ALLOWED_ROUTES[$request]) || $request == '') {
    switch ($request) {
        case '':
            require __DIR__ . "/views/index.php";
            break;
        default:
            require __DIR__ . $ALLOWED_ROUTES[$request];
    }
} else {
    require __DIR__ . '/views/errors/404.php';
}
