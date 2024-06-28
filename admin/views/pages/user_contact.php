<?php
include_once (__DIR__ . "/../../includes/contact/user_contact.php");
?>
<div id="user-contact" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl p-9">

    <h1 class="text-xl font-bold text-gray-600">Users Contact</h1>
    <table class="w-full">
        <thead>
            <tr class="bg-slate-400 sticky negative-top-offset">
                <th class="text-center font-bold text-gray-800 p-5">စဉ်</th>
                <th class="text-center font-bold text-gray-800 p-5">ခေါင်းစဉ်</th>
                <th class="text-center font-bold text-gray-800 p-5">Email</th>
                <th class="text-center font-bold text-gray-800 p-5">ရက်စွဲ</th>
                <th class="text-center font-bold text-gray-800 p-5">OPTIONS</th>
            </tr>
        </thead>
        <tbody class="overflow-scroll" id="user_contact-tbody">
            <?php
            $user_contact_count = 1;
            foreach ($user_contacts as $user_contact) {

                ?>
                <tr class="bg-gray-300">
                    <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $user_contact_count ?></td>
                    <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $user_contact["title"] ?></td>
                    <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $user_contact["email"] ?></td>
                    <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $user_contact["date"] ?></td>
                    <td class="text-center font-bold text-white p-5 bg-slate-500 flex justify-center">
                        <button
                            class="bg-sky-500 m-5 hover:bg-sky-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/mail_back?contact_id=' + <?php echo $user_contact['contact_id'] ?>)">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>

                        <!-- update -->
                        <button class="bg-red-500 m-5 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/action/delete_user_contact?id=' + <?php echo $user_contact['contact_id'] ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 0 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 10 7.293 8.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- delete -->
                    </td>
                </tr>

                <?php $user_contact_count++;
            } ?>

        </tbody>
    </table>

</div>