<div id="driving_register" class="hidden">
    <h1 class="font-bold text-md underline text-center mb-5 mt-5">ယာာဥ်‌မောင်းလိုင်စင် စာရင်းသွင်းရန်</h1>
    <?php
      if (isset($_GET["driving_message"])) {
        echo "<div class='text-green-600 font-bold text-center'>".$_GET["driving_message"]."</div>";
      }else{
        echo "<div class='text-red-600 font-bold text-center'>".$_GET["driving_error"]."</div>";
      }
    ?>
    <form action="/driving/register_driving" method="post" class="md:w-2/3 p-5 m-auto">
        <input type="text" name="name" placeholder="လျှောက်ထားသူအမည်"
            class="text-bold rounded-xl text-sm p-2 border border-slate-300 mb-2" id="" required>
        <input type="text" name="father_name" placeholder="အဖအမည်"
            class="text-bold rounded-xl text-sm p-2 border border-slate-300 mb-2" id="">
        <label for="want-license" class="mb-2 block">ရယူလိုသည့်လိုင်စင်</label>
        <select name="want_license" id="want-license"
            class="text-bold rounded-xl text-sm p-2 border border-slate-300 mb-2" required>
            <option>ရွေးရန်</option>
            <option value="သ">သ</option>
            <option value="က">က</option>
            <option value="ခ">ခ</option>
            <option value="ဃ">ဃ</option>
            <option value="င">င</option>
            <option value="ဟ">ဟ</option>
            <option value="ဌ">ဌ</option>
            <option value="စ">စ</option>

        </select>
        <input type="text" name="current_card_number"
            class="text-bold rounded-xl text-sm p-2 border border-slate-300 mb-2" placeholder="လက်ရှိကဒ်အမှတ်" id="">
        <textarea name="address" id="" class="h-20 text-bold text-sm p-2 border border-slate-300 mb-2"
            placeholder="နေရပ်လိပ်စာ"></textarea>
        <label for="birth" class="mb-2 block">မွေးသက္ကရာဇ်</label>
        <input type="date" name="birth_date" class="text-bold rounded-xl text-sm p-2 border border-slate-300 mb-2"
            id="birth">
        <input type="submit" value="စာရင်းသွင်းပါ" class="bg-sky-600 text-white hover:bg-sky-300 w-fit p-2 rounded-xl m-auto block cursor-pointer">
    </form>
</div>