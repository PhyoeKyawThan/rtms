<div id="driving_change_cost" class="hidden h-full">
    <h1 class="text-lg text-slate-600 font-bold text-center pt-5 pb-5">Check Cost Of Swap Card</h1>
    <div class="w-3/4 m-auto">
        <div id="driving-type" class="p-5 flex flex-row space-x-1">
            <select name="type" id="type" class="p-1 w-20 text-center rounded-xl bg-slate-200">
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
            <input type="text" name="card-number" class="rounded-xl p-2 border border-slate-600" id="card-number"
                placeholder="Card Number" required>
        </div>
        <div id="check" onclick="getDrivingData()" class="pt-2 pb-2 pl-10 pr-10 font-bold rounded-xl bg-sky-400 text-slate-800 w-fit mt-2 m-auto hover:bg-sky-200 cursor-pointer">
            Check</div>
    </div>
    <div class="w-3/5 border border-slate-600 p-5 flex justify-center md:h-2/5 rounded-xl m-auto empty" id="driving-cost"></div>

    <div id="result" class="hidden h-full absolute top-40 bg-slate-200 p-5">
        <div id="close-result" class="cursor-pointer p-2 border border-slate-600 rounded-full w-fit hover:bg-slate-100" onclick="closeResult('result')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 hover:text-gray-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</div>