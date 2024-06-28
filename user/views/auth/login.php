<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/assets/js/tailwind.js"></script>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <style>
    html, body {
      height: 100%;
    }
  </style>
</head>
<body class="bg-slate-300 flex justify-center items-center p-5">
  <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 rounded-3xl bg-white p-5 w-full max-w-4xl h-full md:h-auto">
    <div id="car-pic" class="hidden md:block md:w-2/4 h-full p-5">
      <img src="/assets/images/car-png-39057.png" alt="" srcset="" class="p-5 mt-20">
    </div>
    <div class="w-full md:w-2/4 p-5">
      <form action="/auth/login" method="post">
        <div class="mb-5">
          <img src="../public/assets/images/logo.jpg" alt="" class="block m-auto w-20">
        </div>
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Sign In to your Account</h1>
        <?php
          if(isset($_GET["error"])){
            echo "<div class='text-lg font-bold text-center text-red-600'>".$_GET["error"]."</div>";
          }
        ?>
        <label for="email" class="block font-bold mb-4 text-slate-400">Your Email * </label>
        <input type="email" name="email" id="email" placeholder="Email" class="p-2 w-full border rounded-xl" required>
        <label for="password" class="block font-bold mb-5 mt-5 text-slate-400">Your Password *</label>
        <input type="password" name="password" id="password" placeholder="password" class="p-2 w-full border rounded-xl m-auto">
        <a href="" class="block mt-4 mb-4 text-indigo-800 text-right hover:text-indigo-400">Forgot Password?</a>
        <input type="submit" value="Sign In" class="border pt-2 pb-2 w-full rounded-xl bg-indigo-700 hover:bg-indigo-400 cursor-pointer text-white font-bold">
        <a href="/register" class="block mt-4 mb-4 text-indigo-800 text-center hover:text-indigo-400">Dont't have account yet?</a>
      </form>
    </div>
  </div>
</body>
</html>
