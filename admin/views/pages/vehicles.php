<?php
include (__DIR__ . "/../../includes/vehicles/get_all_vehicles.php");
?>
<div class="absolute top-46 w-full text-center p-20 text-slate-800 font-bold empty:hidden" id="message">
    <?php
    if (isset($_GET["success"])) {
        echo $_GET["success"];
    }
    include(__DIR__."/../../includes/vehicles/delete_after_five_year.php");
    if(isset($_GET["year"])){
        $query = "SELECT * FROM vehicle_license WHERE YEAR(register_date)='".$_GET["year"]."'";
        $result = $connect->query($query);
        $vehicles = [];
        while($row = $result->fetch_assoc()){
            $vehicles[] = $row;
        }
    }
    ?>
</div>
<div id="vehicles" class="hidden bg-slate-300 h-full overflow-scroll rounded-xl shadow-outline p-9 box-border">
    <div class="flex flex-row">
        <h1 class="text-gray-600 font-bold text-xl">Vehicles</h1>
        <div class="w-full text-right">
            <button class="underline text-md font-bold text-slate-800 cursor-pointer" id="expired_vehicles-tab" onclick="showPage('expired_vehicles', 'expired_vehicles-tab')">Expired Vehicles</button>
        </div>
    </div>
    <div>
        <h1 class="text-2xl font-bold text-center mb-2">Current Year - <?php echo isset($_GET["year"]) ? $_GET["year"] : "All" ?></h1>
        <select name="" id="year" class="p-2 rounded-md block m-auto text-md font-bold">
            <option value="">Select Year</option>
        <?php
            $connect = $db->get_connection();
            $query = "SELECT DISTINCT YEAR(register_date) AS year FROM vehicle_license ORDER BY year";
            $result = $connect->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row["year"]."'>".$row["year"]."</option>";
            }
        ?>
        </select>
    </div>
    <div class="flex flex-row space-x-4 m-2 justify-center" id="vehicle-tabs">
        <button type="button" class="pt-2 pb-2 pl-4 pr-4 text-white font-bold rounded-xl hover:bg-sky-800"><a href="/home?p=vehicles">All</a></button>
        <button type="button" class="pt-2 pb-2 pl-4 pr-4 text-white font-bold rounded-xl hover:bg-sky-800"
            id="ဆိုင်ကယ်">ဆိုင်ကယ်</button>
        <button type="button" class="pt-2 pb-2 pl-4 pr-4 text-white font-bold rounded-xl hover:bg-sky-800"
            id="သုံးဘီး">သုံးဘီး</button>
        <button type="button" class="pt-2 pb-2 pl-4 pr-4 text-white font-bold rounded-xl hover:bg-sky-800"
            id="ထော်လာဂျီ">ထော်လာဂျီ</button>
        <button type="button" class="pt-2 pb-2 pl-4 pr-4 text-white font-bold rounded-xl hover:bg-sky-800"
            id="ကား">ကား</button>
    </div>
    <div class="border border-slate-800 w-fit p-2 rounded-xl bg-slate-200 hover:bg-slate-500 flex"
        onclick="newPage('/add_new_vehicle')">Add New Vehicle<svg class="w-6 h-6 ml-2 text-slate-500 hover:text-sky-200 cursor-pointer"
            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M12 0C9.243 0 7 2.243 7 5c0 .237.017.469.046.7-1.713.344-3.025 1.657-3.371 3.371C2.467 9.617 2 10.281 2 11v11c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2V11c0-.719-.467-1.383-1.675-1.929-.346-1.714-1.658-3.027-3.371-3.371.029-.231.046-.463.046-.7 0-2.757-2.243-5-5-5zM7 19h10v2H7v-2zm10.707-5.707L13 17.586l-2.293-2.293-1.414 1.414L13 20.414l5.121-5.121-1.414-1.414z" />
        </svg>
    </div>
    <div class="m-5 flex flex-row">
        <div id="total-vehicles" class="font-bold text-gray-600 text-2xl basis-2/4">
            Total Vehicles - <span><?php echo count($vehicles); ?></span>
        </div>
        <div id="search-vehicle" class="basis-2/4 text-right">
            <label for="vehicle-number"></label>
            <input type="search" class="w-60 pt-2 pb-2 px-4 py-4 text-sm rounded-xl" name="" id="vehicle-number"
                placeholder="ယာဉ်အမှတ်..."
                onchange="search_data('vehicle-number', 'vehicle-search-output', '/search/search_vehicle?vehicle_number=')"
                required>
            <br>
            <div id="vehicle-search-output" class="flex justify-end"></div>
        </div>
    </div>
    <table class="box-border">
        <thead>
            <tr class="bg-slate-200 sticky negative-top-offset">
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ယာဉ်အမှတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">မှတ်ပုံတင်ထားသူအမည်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">မှတ်ပုံတင်နံပါတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">အမျိုးအမည်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">အမျိုးအစား</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ဘောင်အမှတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ဆေးရောင်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ကုန်ဆုံးရက်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">OPTIONS</th>
            </tr>
        </thead>
        <tbody id="vehicle-table-body">
            <?php foreach ($vehicles as $vehicle) { ?>
                <tr class="bg-slate-600" id="<?php echo $vehicle["vehicle_type"] ?>">
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["vehicle_number"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["name"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["nrc"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["vehicle_brand"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["vehicle_type"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["unique_no"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $vehicle["color"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200"><?php
                    $exp = new DateTime($vehicle["exp_date"]);
                    echo $exp->format("Y-m-d");
                    ?></td>
                    <td class="text-center p-2 text-slate-200 border border-slate-200 flex flex-row space-x-2">
                        <button class="bg-blue-500 m-5 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/view_vehicle?id=<?php echo $vehicle['id'] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172 7.293 8.464 2 14.828 1.172 16 4 16l6-6 .707-.707L14.828 5a2 2 0 000-2.828l-1.414-1.414z" />
                            </svg>
                        </button>
                        <!-- update -->
                        <button class="bg-red-500 m-5 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center"
                            onclick="newPage('/action/delete_vehicle?id=<?php echo $vehicle['id'] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 0 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 10 7.293 8.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- delete -->
                    </td>

                </tr>



            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    const year = document.getElementById("year");
    year.addEventListener("change", ()=>{
        window.location.href = "/home?p=vehicles&year=" + year.value;
    })
</script>
