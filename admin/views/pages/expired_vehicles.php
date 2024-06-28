<div id="expired_vehicles" class="hidden bg-slate-300 h-full overflow-scroll rounded-xl shadow-outline p-9 box-border">
    <h1 class="text-gray-600 font-bold text-xl">Expired Vehicles</h1>
    <div class="hidden absolute bg-white w-4/5 m-auto top-90 right-15 flex items-center justify-center min-h-4/5" id="loading">
        Sending Please Wait 
        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-blue-500"></div>
    </div>

    <div class="m-2">
        <span class="font-bold">Warning Mail body: </span>
        <div id="mail-text" class="w-3/5 text-center border border-slate-800 p-2 text-red-600 font-bold"
            contenteditable="true">This is the Warning message for ur license have been expired and need to renew</div>
    </div>
    <table class="w-100 text-center">
        <thead>
            <tr>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">#</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ယာဉ်အမှတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">မှတ်ပုံတင်ထားသူအမည်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">မှတ်ပုံတင်နံပါတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">အမျိုးအမည်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">အမျိုးအစား</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">ဘောင်အမှတ်</th>
                <th class="p-5 font-bold text-gray-800 text-sm border border-slate-800">Sent Warning</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include (__DIR__ . "/../../includes/vehicles/get_exp_vehicles.php");
            $exp_no = 0;
            foreach ($exp_vehicles as $exp_vehicle) {

                ?>
                <tr class="bg-slate-600" id="<?php echo $exp_vehicle["vehicle_type"] ?>">
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_no; ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["vehicle_number"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["name"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["nrc"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["vehicle_brand"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["vehicle_type"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <?php echo $exp_vehicle["unique_no"] ?>
                    </td>
                    <td class="text-center p-2 text-slate-200 text-sm border border-slate-200">
                        <button class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 focus:outline-none"
                            onclick="sendWarning('<?php echo $exp_vehicle['email'] ?>', '<?php echo $exp_vehicle['vehicle_number'] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 4l6 6m0 0l-6 6m6-6H3" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <?php $exp_no++;
            } ?>
        </tbody>
    </table>
    <script>
        async function sendWarning(email, vehicle_number) {
            // console.log(email, vehicle_number);
            var is_send = confirm("Are u sure to send this mail?");
            if (is_send) {
                const loading = document.getElementById("loading");
                loading.classList.remove("hidden");
                const mail_text = document.getElementById("mail-text");
                // console.log(mail_text.innerText);
                const formData = new FormData();
                formData.append("mail", email);
                formData.append("reply-content", mail_text.innerText);
                formData.append("subject", `Warning Message for Expiring Your Vehicle License ${vehicle_number}`)
                console.log(formData);
                const response = await fetch("/mail_to_exp", {
                    method: "POST",
                    body: formData
                });
                if (response.ok) {
                    const response_json = await response.json();
                    if (response_json.status === "success") {
                        loading.classList.add("hidden");
                    }
                }
            }
        }
    </script>
</div>