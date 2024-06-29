<?php
// Start session and include the authentication check
session_start();
error_reporting(E_ERROR | E_PARSE);
// Include database connection
include(__DIR__."/../model/db.php");
$contact = file_get_contents("http://localhost:8081/assets/js/contact.json"); // Decode JSON as associative array

$db = new DB();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
     <script src="/assets/js/tailwind.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    <style>
        * {
            width: 100%;
            margin: auto;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        .home-background {
            background-image: url('/assets/images/car_.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .footer-background {
            background-image: url('/assets/images/wallpaperflare.com_wallpaper.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bgroundcolor{
        background-color: mediumblue;
        color: whitesmoke;
    }
    .nav{
        background-color: rgb(245, 177, 5);
        
    }
    .nav-color{
        color: black;
    }

    .absolute-top{
        position: absolute;
        top: 60px;
    }
.nav-style{
    width: fit-content;
    padding: 5px 20px 5px 20px; 
    font-size: 0.8em;
    margin: 10px;
    text-align: center;
    cursor: pointer;
    color: black;
    border-radius: 30px;
}
    /* .nav-size{
        height: 50px;

    } */

    
    </style>
</head>

<body>
    <header class="bgroundcolor h-auto flex flex-row justify-center pt-2 pb-2 border-b shadow-xl">
        <div class="basis-1/4 flex justify-center">
            <img src="/assets/images/logo.jpg" class="w-10 h-10 md:w-20 md:h-20" alt="" srcset="">
        </div>
        <div class="basis-2/4 text-center font-bold text-md pt-2 pb-2 md:text-md">
            ပြည်ထောင်စုသမ္မတနိုင်ငံတော်<br>ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ကုန်းလမ်းပို့ဆောင်ရေးညွှန်ကြားမှုဦးစီးဌာန
            <div>Road Transport Administration Department</div>
        </div>
        <div class="basis-1/4 flex justify-center">
            <img src="/assets/images/kanyana.jpg" class="w-10 h-10 md:w-20 md:h-20" alt="" srcset="">
        </div>
    </header>
    <!-- header -->
    <nav class="nav text-center sticky top-0 z-50">
        <button class="block md:hidden p-5" onclick="openNav()">
            <svg class="w-6 h-6 text-gray-800 font-bold text-lg hover:bg-sky-200 ml-2" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <!-- nav button -->
        <ul class=" nav-size hidden md:flex md:flex-row md:w-fit m-auto" id="nav-items">
            <li class=" nav-style md:p-5 p-2 font-bold  text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm "
                id="home-tab" onclick="showPage('home')">ပင်မစာမျက်နှာ</li>
            <li class=" nav-style md:p-5 p-2 font-bold text-black cursor-pointer z-40 md:hover:bg-black hover:text-white md:text-sm md:w-auto" id="sub_parent1"
                onclick="openSubNav('vehicle_license_sub', 'sub_parent1')">
                မော်တော်ယာဉ်မှတ်ပုံတင်ခြင်း
                <ul class="w-8/9 bg-sky-200 m-auto hidden md:absolute md:top-14 md:w-fit md:bg-sky-600" id="vehicle_license_sub">
                    <li class="p-2 bg-yellow-100  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="vehicle_license_requirement-tab">
                        <a href="/home?p=vehicle_license_requirement" class="block text-left">မော်တော်ယာဉ်လိုင်စင်သက်တမ်းတိုးရန်လိုအပ်ချက်များ</a></li>
                    <li class="p-2 bg-yellow-200  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="check_vehicle-tab"><a href="/home?p=check_vehicle" class="block text-left">မော်တော်ယာဉ်လိုင်စင်သက်တမ်းလက်ကျန်စစ်ဆေးရန် </a></li>
                    <li class="p-2 bg-yellow-300  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="page1-tab"><a href="/home?p=page1" class="block text-left">နယ်ဝင်/နယ်ထွက်</a></li>
                    <li class="p-2 bg-yellow-400  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="page2-tab"><a href="/home?p=page2" class="block text-left">အပြောင်းအလဲများ</a></li>
                    <li class="p-2 bg-yellow-500  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="page3-tab"><a href="/home?p=page3" class="block text-left">
                        မော်တော်ယာဉ်မှတ်ပုံတင်စာအုပ်ပျောက်လျှောက်ထားရန်</a></li>
                    <li class="p-2 bg-yellow-600  text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="page4-tab"><a href="/home?p=page4" class="block text-left">Wheel Tax ပျောက်လျှောက်ထားရန်</a></li>
                </ul>
            </li>
            <li class=" nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white z-40 md:text-sm md:w-auto"
                id="driving-tab" onclick="openSubNav('driving_sub', 'driving-tab')">
                ယာဉ်မောင်းလိုင်စင်
                <ul class="w-8/9 bg-sky-200 m-auto hidden absolute-top md:w-fit md:bg-sky-600" id="driving_sub">
                    <li class="p-2 bg-yellow-100 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="driving_register-tab">
                        <a href="/home?p=driving_register" class="block text-left">စာရင်းသွင်းရန်</a>
                    </li>
                    <li class="p-2 bg-yellow-100 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="p1-tab">
                        <a href="/home?p=p1" class="block text-left">ယာဉ်မောင်းလိုင်စင်အမျိုးအစားများ</a>
                    </li>
                    <li class="p-2 bg-yellow-200 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="check_driving-tab">
                        <a href="/home?p=check_driving" class="block text-left">ယာဉ်မောင်းလိုင်စင်ကဒ်နံပါတ်စစ်ဆေးရန်</a>
                    </li>
                    <li class="p-2 bg-yellow-300 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="driving_change_cost-tab">
                        <a href="/home?p=driving_change_cost" class="block text-left">ယာဉ်မောင်းလိုင်စင်သက်တမ်းလက်ကျန်စစ်ဆေးရန်</a>
                    </li>
                   
                    <li class="p-2 bg-yellow-400 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="p2-tab">
                        <a href="/home?p=p2" class="block text-left">နယ်ဝင်/နယ်ထွက်</a>
                    </li>
                    <li class="p-2 bg-yellow-500 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="p3-tab">
                        <a href="/home?p=p3" class="block text-left">ယာဉ်မောင်းလိုင်စင်အမျိုးအစားအလိုက်ကောက်ခံမည့်နှုန်းထားများဇယား</a>
                    </li>
                    <li class="p-2 bg-yellow-600 text-sm pt-2 pb-2 hover:bg-amber-600 hover:text-slate-50 md:text-black"
                        id="p4-tab">
                        <a href="/home?p=p4" class="block text-left">
ယာဉ်မောင်းလိုင်စင်အပျောက်လျှောက်ထားရန်လိုအပ်သည်များ</a>
                    </li>
                </ul>

            </li>
            <li class=" nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm md:w-auto"
                id="history-tab" onclick="showPage('history')">ဌာနသမိုင်းကြောင်း</li>
            
            <!-- vehicles -->
            <li class=" nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm md:w-auto"
                id="news-tab" onclick="showPage('news')">သတင်းများ</li>
            <li class="nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm md:w-auto"
                id="reviews-tab" onclick="showPage('reviews')">အကြံပြုချက်များ</li>
            <li class="nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm md:w-auto"
                id="qa-tab" onclick="showPage('qa')">လက်စွဲစာအုပ်ရယူရန်</li>
            <li class="nav-style md:p-5 p-2 font-bold text-black cursor-pointer md:hover:bg-black hover:text-white md:text-sm md:w-auto"
                id="profile-tab" onclick="showPage('profile')">
                <?php
                echo isset($_SESSION["current_user"]) ? "Profile" : "Login";
                // check user is logged in or not
                ?>
            </li>
            <li id="contact-tab" hidden></li>
        </ul>
        <!-- nav-items -->
    </nav>
    <!-- nav -->
    <!-- <div class="hidden" id="vehicle_license_requirement">1</div>
     <div class="hidden h-full bg-black" id="check_vehicle">2</div> -->
    <!-- <div class="hidden" id="news">3</div> -->
    <!-- <div class="hidden" id="driving">4</div>
     <div class="drivig_register hidden" id="driving_register">5</div>
     <div class="hidden" id="check_driving">6</div>
     <div class="hidden" id="driving_change_cost">7</div> -->

    <?php
    require __DIR__ . "/pages/home.php";
    // home
    require __DIR__ .'/pages/vehicle_license_requirement.php';
    require __DIR__ ."/pages/check_vehicle_license.php";
    // vehicle
    require __DIR__ . "/pages/news.php";
    // news
    require __DIR__ . "/pages/check_driving.php";
    require __DIR__ . "/pages/driving_change_cost.php";
    require __DIR__ . "/pages/driving_register.php";
    // driving license
    require __DIR__ . "/pages/reviews.php";
    // reviews

    require __DIR__ . "/pages/profile.php";
    // profile

    require __DIR__ . "/pages/contact.php";
    // contact
    require __DIR__ ."/pages/qa.php";
    // qa
    require __DIR__."/pages/page1.php";
    require __DIR__."/pages/page2.php";
    require __DIR__."/pages/page3.php";
    // require __DIR__."/pages/page4.php";
    
    // driving
    require __DIR__."/pages/p1.php";
    require __DIR__."/pages/p2.php";
    require __DIR__."/pages/p3.php";
    require __DIR__."/pages/p4.php";
    // history
    require __DIR__."/pages/history.php";
    ?>
    <!-- displays -->
    <script src="/assets/js/index.js"></script>
    <script src="/assets/js/control_pages.js"></script>
</body>

</html>