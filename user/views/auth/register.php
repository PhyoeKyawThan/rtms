<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.tailwindcss.com"></script>
    -->
  <script src="/assets/js/tailwind.js"></script>
  <style>
    * {
      width: 100%;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body class="bg-slate-300 flex justify-center items-center p-5">
  <div
    class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 rounded-3xl bg-white p-5 w-full max-w-4xl md:h-auto">
    <div id="car-pic" class="hidden md:block md:w-2/4 h-full p-5">
      <img src="/assets/images/car-png-39057.png" alt="" srcset="" class="p-5 mt-20">
    </div>
    <div class="w-full md:w-2/4 p-5">
      <form action="/auth/register" method="post" enctype="multipart/form-data">
        <div class="mb-5">
          <!-- <img src="/assets/images/logo.jpg" alt="" class="block m-auto w-20"> -->
        </div>
        <a href="/home?p=home" class="underline font-bold">Back</a>
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Register Here</h1>
        <?php
        if (isset($_GET["error"])) {
          echo "<div class='text-lg font-bold text-center text-red-600'>" . $_GET["error"] . "</div>";
        }
        ?>
        <label for="profile">Select Your Profile: </label>
        <input type="file" name="profile" id="profile" required>
        <label for="username" class="block font-bold mb-2 mt-2 text-slate-400">Username * </label>
        <input type="text" name="username" id="username" placeholder="Username"
          class="pl-2 pr-2 w-full border rounded-md" required>
        <label for="email" class="block font-bold mb-2 mt-2 text-slate-400">Email * </label>
        <input type="email" name="email" id="email" placeholder="Email" class="pl-2 pr-2 w-full border rounded-md"
          required>
        <label for="phone" class="block font-bold mb-2 mt-2 text-slate-400">Phone *</label>
        <input type="text" name="phone" id="phone" placeholder="eg - 09884433"
          class="pl-2 pr-2 w-full border rounded-md" required>

        <label for="vehicle-license" class="block font-bold mb-2 mt-2 text-slate-400">Your Vehicle License Number *
        </label>
        <input type="text" name="vehicle-license" id="vehicle-license" placeholder="eg - ABC1234 "
          class="pl-2 pr-2 w-full border rounded-md" required>


        <label for="birth-date" class="block font-bold mb-2 mt-2 text-slate-400">Date Of Birth *</label>
        <input type="date" name="birth_date" id="birth_date" placeholder="eg - 09884433"
          class="pl-2 pr-2 w-full border rounded-md" required>
        <label for="password" class="block font-bold mb-2 mt-2 text-slate-400">Password *</label>
        <input type="password" name="password" id="password" placeholder="password"
          class="pl-2 pr-2 w-full border rounded-md m-auto">
        <!-- <a href="" class="block mt-4 mb-4 text-indigo-800 text-right hover:text-indigo-400">Forgot Password?</a> -->
        <input type="submit" value="Register" name="submit"
          class="border pt-2 pb-2 mt-2 w-2/4 m-auto block rounded-xl bg-indigo-700 hover:bg-indigo-400 cursor-pointer text-white font-bold">
        <a href="/login" class="block mt-4 mb-4 text-indigo-800 text-center hover:text-indigo-400">Already have
          account?</a>
      </form>
    </div>
  </div>
</body>

</html>