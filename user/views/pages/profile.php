<?php
session_start();
$user = $_SESSION["current_user"];
?>
<div id="profile" class="hidden p-5">
  <h1 class="text-lg font-bold text-slate-800 w-fit m-auto">User Profile</h1>
  <?php
  if (isset($_GET["profile_message"])) {
    echo "<div class='text-center text-green-600 text-xl font-bold'>" . htmlspecialchars($_GET["profile_message"]) . "</div>";
  } elseif (isset($_GET["profile_error"])) {
    echo "<div class='text-center text-red-600 text-xl font-bold'>" . htmlspecialchars($_GET["profile_error"]) . "</div>";
  }
  ?>
  <form class="md:w-3/5 w-4/5 mt-5 m-auto" action="/profile/update" method="post" enctype="multipart/form-data">
    <div class="flex justify-center mb-5">
      <label for="profile-image" class="block w-20 h-20 border border-slate-300 rounded-full">
        <img src="profiles/<?php echo htmlspecialchars($user["profile_url"]); ?>" class="cursor-pointer w-full h-full rounded-full" alt="Profile Image">
      </label>
      <input type="file" name="profile" id="profile-image" hidden>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <label for="username" class="font-bold text-xl text-slate-600">Name</label>
      <input type="text" name="username" class="text-md font-bold p-2 text-end border-b w-full" value="<?php echo htmlspecialchars($user['username']); ?>" id="username" required>

      <label for="vehicle-license" class="font-bold text-xl text-slate-600">Vehicle License</label>
      <input type="text" name="vehicle-license" class="text-md font-bold p-2 text-end border-b w-full" value="<?php echo htmlspecialchars($user['vehicle_number']); ?>" id="vehicle-license" required>

      <label for="email" class="font-bold text-xl text-slate-600">Email</label>
      <input type="email" name="email" class="text-md font-bold p-2 text-end border-b w-full" value="<?php echo htmlspecialchars($user['email']); ?>" id="email" required>

      <label for="phone" class="font-bold text-xl text-slate-600">Phone</label>
      <input type="tel" name="phone" class="text-md font-bold p-2 text-end border-b w-full" value="<?php echo htmlspecialchars($user['phone']); ?>" id="phone" required>

      <label for="birth" class="font-bold text-xl text-slate-600">Birth Date</label>
      <input type="date" name="birth_date" class="text-md font-bold p-2 text-end border-b w-full" value="<?php echo htmlspecialchars($user['birth_date']); ?>" id="birth" required>
    </div>
    <div class="flex flex-row space-x-4 mt-5 justify-center">
      <input type="submit" name="submit" class="block p-2 text-slate-300 bg-sky-600 rounded-md text-center cursor-pointer font-bold hover:bg-sky-300" value="UPDATE">
      <a href="/auth/logout" title="Logout" class="block p-2 text-slate-300 bg-red-600 rounded-md text-center cursor-pointer font-bold hover:bg-red-300">LOGOUT</a>
    </div>
  </form>
</div>

<script>
  const profile = document.getElementById("profile-image");
  
  profile.addEventListener("change", () => {
    const image_ = document.querySelector("label img");
    const file = profile.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        image_.src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>
