<html>

<style>
    .empty:empty{
        display: none;
    }
    .back-video{
        position: absolute;
        z-index: -1;
        right: 0;
        bottom: 0;
    }
    @media(max-aspect-ratio:16/9){
        .back-video{
            width: auto;
            height: 100%;
        }
    }
    .h1-color{
    padding: 1.8rem;
    color:#04f90c;
    text-shadow: 0 0 18px blue;
    text-transform: none;
    }
</style>

   
<div id="check_vehicle" class="p-5 h-full">
    <video autoplay loop muted plays-inline class="back-video">
        <source src="/assets/images/highway-loop.mp4" type="video/mp4">
    </video>
    <h1 class=" h1-color text-center font-bold text-2xl">မော်တော်ယာဉ်လိုင်စင်သက်တမ်းလက်ကျန်စစ်ဆေးရန်</h1><br>
    <div class="md:w-3/5 text-center">
        <label class="text-white">သင်၏မော်တော်ယာဉ်လိုင်စင်နံပါတ်အားပြည့်စုံမှန်ကန်စွာရိုက်ထည့်ပါ။</label>
        <input type="text" name="" id="vehicle-license" class="w-1/4 p-2 bg-sky-100 rounded-md" placeholder="eg - ၄၁ယ/၁၂၃၄၅">
        <input type="button" value="စစ်ဆေးရန်" onclick="getData()" class="w-fit rounded-xl p-2 bg-sky-600 font-bold text-white text-md">
    </div>
    <div id="return-info" class="h-1/3 p-5 md:w-3/5 text-center border border-slate-100 text-white mt-5 mb-5 empty"></div>
</div>
</div>
</html>
