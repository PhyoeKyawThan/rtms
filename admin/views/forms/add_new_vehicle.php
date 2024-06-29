<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vehicles</title>
    <script src="/assets/js/tailwind.js"></script>
</head>

<body class="h-screen">
    <div class="h-full overflow-scroll bg-slate-300 flex justify-center p-10">
        <form action="/action/add_vehicle" method="post" class="h-fit w-3/5 bg-white p-9 rounded-2xl">
            <a href="/home?p=vehicles"
                class="block font-bold text-md underline mb-5 hover:text-slate-300">နောက်သို့ပြန်သွားရန်</a>
            <h1 class="font-bold text-2xl mb-5 text-center border-b-2 border-slate-600 w-fit m-auto">
            ယာ‌ဉ်လိုင်စင်အသစ်ထည့်ရန် </h1>
            <?php
            echo isset($_GET["message"]) ? "<span class='message'>" . $_GET["message"] . "</span>" : "";
            echo isset($_GET["error"]) ? "<span class='error'>" . $_GET["error"] . "</span>" : "";
            ?>
            <div class="mb-2">
                <label class="block font-bold" for="vehicle-number">ယာဉ်အမှတ် *</label>
                <input type="text" name="vehicle-number" id="vehicle-number"
                    value=""
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဥပမာ - ၄၁ယ/၁၂၃၄၅"
                    required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="name">မှတ်ပုံတင်ထားသူအမည် *</label>
                <input type="text" name="name" id="name" value=""
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဥပမာ - ဒေါ်မြတင်"
                    required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="nrc">မှတ်ပုံတင်နံပါတ် *</label>
                <input type="text" name="nrc" value="" id="nrc"
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full"
                    placeholder="ဥပမာ - ၁၄/လမန(နိုင်)၁၁၂၇၈၉" required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="address">နေရပ် *</label>
                <textarea name="address" id="address" class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full"
                    placeholder="နေရပ်လိပ်စာထည့်ရန်..." required></textarea>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="vehicle-brand">အမျိုးအမည် *</label>
                <input type="text" name="vehicle-brand" value="" id="vehicle-brand"
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဥပမာ - Honda" required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="vehicle-type">အမျိုးအစား *</label>

                <select name="vehicle-type" class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" required>
                    <option value="ဆိုင်ကယ်">ဆိုင်ကယ်</option>
                    <option value="သုံးဘီး">သုံးဘီး</option>
                    <option value="ထော်လာဂျီ">ထော်လာဂျီ</option>
                    <option value="ကား">ကား</option>
                </select>

            </div>
            <div class="mb-2">
                <label class="block font-bold" for="unique-no">ဘောင်အမှတ်</label>
                <input type="text" name="unique-no" id="unique-no" value=""
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဘောင်အမှတ်ထည့်ရန်..."
                    required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="vehicle-weight">ယာဉ်အလေးချိန် *</label>
                <input type="number" name="vehicle-weight" value="<?php echo $data['vehicle_weight']; ?>"
                    id="vehicle-weight" class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full"
                    placeholder="ဥပမာ - 67 ( lb )" required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="vehicle-load">တင်အား *</label>
                <input type="number" name="vehicle-load" value="<?php echo $data['vehicle_load']; ?>" id="vehicle-load"
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဥပမာ - 1 ( p )"
                    required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="color">ဆေးရောင် *</label>
                <input type="text" name="color" id="color" value="<?php echo $data['color']; ?>"
                    class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" placeholder="ဥပမာ - အနီ" required>
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="exp-date">ကုန်ဆုံးရက် *</label>
                <input type="date" class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" name="exp-date"
                    value="" id="exp-date">
            </div>
            <div class="mb-2">
                <label class="block font-bold" for="register-date">Register Date *</label>
                <input type="date" class="border mt-3 border-slate-300 rounded-xl p-2 ml-5 w-full" name="register-date"
                    value="<?php
                    $date = new DateTime();
                    echo $date->format('Y-m-d') ?>" id="register-date">
            </div>
            <div class="flex justify-end">
                <div>
                    <!-- <a href="../includes/delete.php?id=<?php // echo $data['id'] ?>&name=vehicle_license">
                        <input type="button" value="ဖျက်သိမ်းရန်"
                            class="text-white font-bold bg-red-600 p-3 rounded-2xl hover:bg-red-300 cursor-pointer">
                    </a> -->
                </div>
                <div><input type="submit" value="အတည်ပြုသည်"
                        class="text-white font-bold bg-green-600 p-3 rounded-2xl hover:bg-green-300 cursor-pointer">
                </div>
            </div>
        </form>
    </div>
</body>

</html>