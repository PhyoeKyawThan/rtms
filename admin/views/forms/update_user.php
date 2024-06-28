<?php

include(__DIR__."/../../model/db.php");

$db = new DB();
if($db->is_connected()){
    $user = $db->get_data_by_id("user", $_GET["user_id"], "user_id");
    $username = $user["username"];
    $phone = $user["phone"];
    $email = $user["email"];
    $password = $user["password"];
    $birth_date = $user["birth_date"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Data</title>
    <script src="/assets/js/tailwind.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet"> -->
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <a href="/home?p=user" class="font-bold text-2xl text-slate-400">Back</a>
        <h2 class="text-2xl font-bold mb-4 text-center">Update User Data</h2>
        <?php 
            if(isset($_GET["message"])){
                $message = $_GET["message"];
                echo "<div class='text-green-600 font-bold text-center'> $message </div>";
            }
            if(isset($_GET["error"])){
                $error = $_GET["error"];
                echo "<div class='text-red-600 font-bold text-center'> $error </div>";
            }
        ?>
        <form method="post" action="/action/update_user?user_id=<?php echo $user["user_id"] ?>" class="max-w-md mx-auto">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date:</label>
                <input type="date" id="birth_date" name="birth_date" value="<?php echo $birth_date; ?>" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</body>

</html>