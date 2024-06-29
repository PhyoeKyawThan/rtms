<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <script src="/assets/js/tailwind.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
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
    </style>
</head>

<body class="p-9 bg-sky-600">
    <div class="flex flex-row h-full rounded-9 bg-sky-100 rounded-3xl overflow-hidden shadow-xl">
        <div id="important" class="w-2/2 h-full border-r-2 flex flex-col bg-white p-5">
            <div class="flex flex-row justify-center w-40 h-40 mb-0">
                <img src="/assets/images/logo.jpg" alt="" sizes="" srcset="">
            </div>
            <div class="font-bold text-3xl text-sky-300 mb-0 mt-10 text-center">Road Transport Administration Department</div>
            <div class="font-bold text-md text-slate-600 mt-2 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Eveniet, doloremque! Architecto cumque laborum ullam officia nesciunt. Culpa aliquid exercitationem sed
                quod, ullam nihil iure nostrum deleniti harum. Cupiditate, perspiciatis ipsum.</div>
        </div>
        <div id="form" class="w-1/2 h-full flex flex-col">
            <form action="/auth/login" method="post" class="w-3/4 p-5">
                <h1 class="font-bold text-2xl mt-10 text-slate-800 text-center">Welcome Back, Login Here</h1>
                <div class="text-center text-red-600 font-bold">
                    <?php 
                    if(isset($_GET["message"])){
                        echo $_GET["message"];
                    }
                    ?>
                </div>
                <label for="username" class="block font-bold text-md mt-5">Username *</label>
                <input type="text" name="username" id="username" placeholder="Username" class="p-2 pl-5 pr-5 rounded-xl" required>
                <label for="password" class="block font-bold text-md mt-5">Password *</label>
                <input type="password" name="password" id="password" placeholder="Password" class="p-2 pl-5 pr-5 rounded-xl" required>
                <input type="submit" value="Login" class="text-lg font-bold pt-2 pb-2 text-center mt-5 bg-sky-400 text-white rounded-xl hover:bg-slate-300 hover:text-slate-800 cursor-pointer">
            </form>
        </div>
    </div>
</body>

</html>