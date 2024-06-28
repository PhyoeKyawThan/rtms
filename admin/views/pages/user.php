<?php
include(__DIR__."/../../includes/user/get_all_user.php");
?>
<style>
  /* Add custom styles if necessary */
</style>
<div id="user" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl p-9 w-full">
    <h1 class="text-xl font-bold text-gray-600">Users</h1>
    <!-- <div class="border border-slate-800 w-fit p-2 rounded-xl bg-slate-200 hover:bg-slate-500"
        onclick="newPage('/add_new_vehicle')">
        <svg class="w-6 h-6 text-purple-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 12c2.131 0 4.188.829 5.735 2.335A7.978 7.978 0 0120 20h-2a5.978 5.978 0 00-5-2.966A5.978 5.978 0 008 20H6a7.978 7.978 0 012.265-5.665A7.978 7.978 0 0112 12zM12 10a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>
    </div> -->
    <div class="flex flex-col md:flex-row m-5">
        <div id="total-users" class="font-bold text-gray-600 text-2xl md:basis-2/4 mb-2 md:mb-0">
            Total users - <?php echo count($users) ?>
        </div>
        <div id="search-news" class="md:basis-2/4 text-right">
            <label for="user-name" class="sr-only">Search</label>
            <input type="text" class="w-full md:w-60 pt-2 pb-2 px-4 text-sm rounded-xl" name="" id="user-name"
                placeholder="Username..." onchange="search_data('user-name', 'user-search-output', '/search/search_user?username=')" required>
            <br>
            <div id="user-search-output" class="flex justify-end"></div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-slate-400 sticky top-0">
                <tr>
                    <th class="text-center font-bold text-gray-800 p-5">စဉ်</th>
                    <th class="text-center font-bold text-gray-800 p-5">Profile</th>
                    <th class="text-center font-bold text-gray-800 p-5">အသုံးပြုသူအမည်</th>
                    <th class="text-center font-bold text-gray-800 p-5">အီးမေးလ်</th>
                    <th class="text-center font-bold text-gray-800 p-5">မွေးသက္ကရာဇ်</th>
                    <th class="text-center font-bold text-gray-800 p-5">register_date</th>
                    <th class="text-center font-bold text-gray-800 p-5">OPTIONS</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $user_count = 1;
                foreach ($users as $user) { 
                ?>
                <tr>
                    <td class="text-center font-bold text-gray-800 p-5"><?php echo $user_count ?></td>
                    <td class="text-center p-5">
                        <img src="http://localhost:8080/profiles/<?php echo $user["profile_url"] ?>" class="w-10 h-10 rounded-full" alt="">
                    </td>
                    <td class="text-center font-bold text-gray-800 p-5"><?php echo $user["username"] ?></td>
                    <td class="text-center font-bold text-gray-800 p-5"><?php echo $user["email"] ?></td>
                    <td class="text-center font-bold text-gray-800 p-5"><?php echo $user["birth_date"] ?></td>
                    <td class="text-center font-bold text-gray-800 p-5"><?php echo $user["register_date"] ?></td>
                    <td class="text-center font-bold text-gray-800 p-5 flex justify-center">
                        <button class="bg-blue-500 m-1 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/view_user?user_id=<?php echo $user['user_id'] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172 7.293 8.464 2 14.828 1.172 16 4 16l6-6 .707-.707L14.828 5a2 2 0 000-2.828l-1.414-1.414z" />
                            </svg>
                        </button>
                        <!-- update -->
                        <button class="bg-red-500 m-1 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/action/delete_user?id=<?php echo $user['user_id'] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 0 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 10 7.293 8.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- delete -->
                    </td>
                </tr>
                <?php $user_count++; } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- user -->
