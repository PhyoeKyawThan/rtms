<?php
include (__DIR__ . "/../../includes/driving/get_all_driving_license.php");
?>
<div id="driving" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl shadow-outline p-9">
    <h1 class="text-gray-600 font-bold text-xl">Driving License</h1>
    <!-- <div id="pending_driving-tab" class="underline font-bold text-slate-800 text-right cursor-pointer" -->
        <!-- onclick="showPage('pending_driving', 'pending_driving-tab')">Pending Drivings</div> -->
    <div class="border flex border-slate-800 w-fit p-2 rounded-xl bg-slate-200 hover:bg-slate-500"
        onclick="newPage('/add_driving_license')">Add New Driving License
        <svg class="w-6 ml-3 h-6 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M20 4H4C2.897 4 2 4.897 2 6v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM4 6h16v12H4V6zm2 2h12v2H6V8zm0 4h7v2H6v-2z" />
        </svg>
    </div>
    <div class="m-5 flex flex-row">
        <div id="total-vehicles" class="font-bold text-gray-600 text-2xl basis-2/4">
            Total Driving Licenses - <?php echo count($drivings); ?>
        </div>
        <div id="search-driving" class="basis-2/4 text-right">
            <label for="card-number"></label>
            <input type="search" class="w-60 pt-2 pb-2 px-4 py-4 text-sm rounded-xl" name="" id="card-number"
                placeholder="ကဒ်နံပါတ်..." onchange="search_data('card-number', 'driving-search-output', '/search/search_by_card_number?card_number=')" required>
            <br>
            <div id="driving-search-output" class="flex justify-end"></div>
        </div>
    </div>
    <table class="w-full">
        <thead>
            <tr class="bg-slate-400 sticky negative-top-offset">
                <th class="text-white p-5">စဉ်</th>
                <th class="text-white p-5">အမည်</th>
                <th class="text-white p-5">လိုင်စဉ်</th>
                <th class="text-white p-5">မှတ်ပုံတင်အမှတ်</th>
                <th class="text-white p-5">အဖအမည်</th>
                <th class="text-white p-5">ကဒ်နံပါတ်</th>
                <th class="text-white p-5">ကုန်ဆုံးရက်</th>
                <th class="text-white p-5">OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($drivings as $driving) {
                ?>
                <tr>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $no ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["name"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["license"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["nrc"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["father_name"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["card_number"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400"><?php echo $driving["exp_date"] ?></td>
                    <td class="font-bold text-center border-2 border-slate-400 flex justify-center">
                        <button class="bg-blue-500 m-5 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/view_driving_license?id=' + <?php echo $driving['driving_id'] ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172 7.293 8.464 2 14.828 1.172 16 4 16l6-6 .707-.707L14.828 5a2 2 0 000-2.828l-1.414-1.414z" />
                            </svg>
                        </button>
                        <!-- update -->
                        <button class="bg-red-500 m-5 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/action/delete_driving_license?id=' + <?php echo $driving['driving_id'] ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 0 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 10 7.293 8.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- delete -->
                    </td>
                </tr>
                <?php $no++;
            } ?>
        </tbody>
    </table>
    <!-- datas -->
</div>
<!-- driving -->