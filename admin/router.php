<?php
// router.php

$request = trim($_SERVER['REQUEST_URI'], '/');

// Remove any query strings from the request URI
$request = strtok($request, '?');

$ALLOWED_ROUTES = [
    // views
    ''=> '/views/home.php',
    'home'=> '/views/home.php',
    'add_new_vehicle'=>'/views/forms/add_new_vehicle.php',
    'view_vehicle'=>'/views/forms/update_vehicle.php',
    // vehicle license form views
    'add_driving_license'=>'/views/forms/add_driving_license.php',
    'view_driving_license'=>'/views/forms/update_driving_license.php',
    // driving license form views
    'add_news'=>'/views/forms/add_news.php',
    'view_news'=>"/views/forms/update_news.php",
    // user fform views
    "view_user"=> "/views/forms/update_user.php",
    
    // news views
    'login'=>'/views/auth/login.php',
    'auth/login'=>'/auth/login.php',
    'auth/logout'=>'/auth/logout.php',
    // vehicles
    'get_all_vehicles'=>'/includes/vehicles/get_all_vehicles.php',
    'get_vehicle'=>'/includes/vehicles/get_vehicle_by_id.php',
    'get_vehicles_by_type'=>'/includes/vehicles/get_vehicles_by_type.php',
    'get_count'=>'/includes/vehicles/count.php',
    
    'search/search_vehicle'=>'/includes/vehicles/search_vehicle.php',
    'action/add_vehicle'=>'/includes/vehicles/add_vehicle.php',
    'action/update_vehicle'=>'/includes/vehicles/update_vehicle.php',
    'action/delete_vehicle'=>'/includes/vehicles/delete_vehicle.php',
    // drivinglicense 
    'get_all_driving_license'=>'/includes/driving/get_all_driving_license.php',
    'get_driving_license'=>'/includes/driving/get_driving_license_by_id.php',
    'get_driving_license_by_card'=>'/includes/driving/get_driving_license_by_card.php',
    'search/search_by_card_number'=>'/includes/driving/search_by_card_number.php',
    'action/add_driving_license'=>'/includes/driving/add_driving_license.php',
    'action/delete_driving_license'=>'/includes/driving/delete_driving_license.php',
    'action/update_driving_license'=>'/includes/driving/update_driving_license.php',
    // news
    'get_all_news'=>'/includes/news/get_all_news.php',
    'get_news'=>'/includes/news/get_news_by_id.php',
    'search/search_news_by_date'=>'/includes/news/search_news_by_date.php',
    'action/add_news'=>'/includes/news/add_news.php',
    'action/delete_news'=>'/includes/news/delete_news.php',
    'action/update_news'=>'/includes/news/update_news.php',
    // user
    'get_all_users'=>'/includes/user/get_all_users.php',
    'get_user'=>'/includes/user/get_user_by_id.php',
    'search/search_user' =>'/includes/user/search_user.php',
    'action/delete_user'=>'/includes/user/delete_user.php',
    'action/update_user'=>'/includes/user/update_user.php',
    // other actions 
    'add_manual'=>'/includes/manual/add_manual.php',
    'action/delete_manual' => '/includes/manual/delete_manual.php',
    'update_contact'=> '/includes/contact/update_contact.php',
    'action/delete_user_contact' => '/includes/contact/delete_user_contact.php',
    'action/mail_back' => '/includes/contact/mail_back.php',
    'mail_back' => '/views/forms/mail_back_form.php',
    'mail_to_exp' => '/includes/vehicles/send_mail_to_exp.php'
    // usercontacta
  ];
  
  if(isset($ALLOWED_ROUTES[$request]) || $request == ''){
    switch($request){
      case '':
        require __DIR__ . "/views/home.php";
        break;
      default:
        require __DIR__ . $ALLOWED_ROUTES[$request];
    }
  }else{
    require __DIR__.'/views/errors/404.php';
  }
