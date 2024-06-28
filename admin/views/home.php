<?php
// session_start();
include(__DIR__."/../auth_check/check.php");
// check admin logged in or not
// print_r($_SESSION["current_admin"]);


?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        .negative-top-offset {
            top: -50px;
            /* Adjust the value as needed */
        }

        .width-td{
            width: 100px;
        }
    </style>
    
     <script src="/assets/js/tailwind.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="h-screen">
    <header class="bg-lime-500 h-auto flex flex-row justify-center pt-2 pb-2">
        <div class="basis-1/4 flex justify-center">
            <img src="/assets/images/kanyana.jpg" class="w-20 h-20" alt="" srcset="">
        </div>
        <div class="basis-2/4 text-center font-bold">
            ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်<br>ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ကုန်းလမ်းပို့ဆောင်ရေးညွှန်ကြားမှုဦးစီးဌာန
            <div>Road Transport Administration Department</div>
        </div>
        <div class="basis-1/4 flex justify-center">
            <img src="/assets/images/logo.jpg" class="w-20 h-20" alt="" srcset="">
        </div>
    </header>
    <div class="flex flex-row bg-lime-800 h-full">
        <div class="bg-white h-full overflow-scroll"><br>
            <div class="font-bold text-center text-md border-b-2 border-lime-500 pb-5 underline">Hello, <?php echo $_SESSION["current_admin"]["username"] ?></div>
            <ul class="mt-4 w-40 ">
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="dashboard-tab" onclick="showPage('dashboard', 'dashboard-tab')">DASHBOARD</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="vehicles-tab" onclick="showPage('vehicles', 'vehicles-tab')">Vehicles</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="driving-tab" onclick="showPage('driving', 'driving-tab')">Driving License</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="pending_driving-tab" onclick="showPage('pending_driving', 'pending_driving-tab')">Pending Drivings</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="news-tab" onclick="showPage('news', 'news-tab')">News</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="user-tab" onclick="showPage('user', 'user-tab')">User</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="manual-tab" onclick="showPage('manual', 'manual-tab')">Manual</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="user-contact-tab" onclick="showPage('user-contact', 'user-contact-tab')">Users Contacts</a>
                </li>
                <li><a
                        class="block text-black font-bold text-center py-5 border-b-2 border-lime-500 hover:bg-lime-800 hover:text-white"
                        id="contact-tab" onclick="showPage('contact', 'contact-tab')">Contact INFO</a>
                </li>
                <li><a href="/auth/logout"
                        class="block text-white text-lg font-bold text-center py-5 border-b-2 border-lime-500 bg-sky-600 hover:bg-sky-300 hover:text-white">Logout</a>
                </li>
            </ul>
        </div>
        <!-- nav -->
        <div class="flex-grow h-full p-5">
            <?php
                require __DIR__ . '/pages/dashboard.php';
                //   dashboard
                require __DIR__ . '/pages/vehicles.php';
                require __DIR__ . '/pages/expired_vehicles.php';
                // vehicles
                require __DIR__ . '/pages/driving.php';
                // driving
                require __DIR__ . '/pages/pending_driving_cards.php';
                // pending driving
                require __DIR__ . '/pages/news.php';
                // news
                require __DIR__ . '/pages/user.php';
                // user
                require __DIR__ . '/pages/manual.php';
                // manual
                require __DIR__ . '/pages/user_contact.php';
                // user contact
                require __DIR__ . '/pages/contact.php';
                // contact
            ?>
        </div>
        <!-- display -->
    </div>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/search.js"></script>
</body>

</html>
