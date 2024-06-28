<?php
include (__DIR__ . "/../../includes/news/get_all_news.php");
?>
<div id="home" class="h-full overflow-scroll">
  <div class=" home-background">
    <div class="p-10 text-3xl">
      <h1 class="leading-loose max-w-96 text-sky-100">
        ပြည်ထောင်စုသမ္မတနိုင်ငံတော်ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေးဝန်ကြီးဌာနကုန်းလမ်းပို့ဆောင်ရေးညွှန်ကြားမှုဦးစီးဌာန
      </h1>
    </div>
  </div>
  <!-- home main poster -->
  <div class="ambious p-5 bg-slate-100">
    <h1 class="text-3xl font-bold text-center underline text-blue-800">ရည်မှန်းချက်</h1>
    <p class="block m-auto mt-5">

    <h1 class="text-xl font-bold text-center">ယာဉ်အန္တရာယ်၊ လမ်းအန္တရာယ် ကင်းရှင်းရေး (Road Safety) </h1>
    <br>

    <h1 class="text-2xl font-bold text-center underline text-blue-800">
      ဝန်ကြီးဌာနဆောင်ပုဒ်နှင့်ကုန်းလမ်းပို့ဆောင်ရေးညွှန်ကြားမှုဦးစီးဌာန၏ ဆောင်ပုဒ်များ </h1><br>
    <ul class=" text-center md:w-2/3 w-full m-auto">
      <li class="p-2 text-xl text-green-600 font-bold">ဝန်ကြီးဌာန ဆောင်ပုဒ် (Ministry Motto)</li>
      <li class="p-2"><b>"</b>ပို့ဆောင်ဆက်သွယ်ပြည်ကျိုးရွယ်<b>"</b><br>Transport and Communications</li><br>
      <li class="p-2 text-green-600 text-xl font-bold">ကညန၏ဆောင်ပုဒ် (RTAD Motto)</li>
      <li class="p-2"><b>"</b>ယာဉ်အန္တရာယ် ကင်းရှင်းရေး ရည်မှန်းစွမ်းဆောင် ဦးစားပေး<b>"</b><br>Road Safety is our utmost
        priority</li><br>
      <li class="p-2 text-green-600 text-xl font-bold">ကညန၏ ကြော်ငြာဆောင်ပုဒ် (RTAD Slogan)</li>
      <li class="p-2"><b>"</b>ရှင်သန်တက်ကြွ ကညန<b>"</b><br>Active and enthusiastic RTAD</li>
      <li class="p-2"><b>"</b>ယာဉ်ကြံ့ခိုင်မှုတို့ရှေးရှု<b>"</b><br>Our goal is vehicle robustness</li>
      <li class="p-2"><b>"</b>မြန်ဆန်ဆောင်ရွက် ပြည်သူ့အတွက်<b>"</b><br>Act fast for the people</li>
      <li class="p-2"><b>"</b>လမ်းအန္တရာယ်ကင်းစေရေး စဉ်ဆက်မပြတ်ပညာပေး<b>"</b><br>Educate continuously for road safety
      </li>
      <li class="p-2"><b>"</b>ယာဉ်အန္တရာယ်ကင်းဝေးရေး နှစ်စဉ် ကြံ့ခိုင်စစ်ဆေးပေး<b>"</b><br>Conduct annual vehicle
        inspection to reduce road accidents</li>
    </ul>

    </p>
  </div>
  <!-- ရည်မှန်းချက် -->
  <div id="lastet-news" class="bg-slate-100 md:h-full w-9/10 border-t p-5">
    <h1 class="text-2xl font-bold text-slate-600 mb-2">နောက်ဆုံးရသတင်းများ</h1>
    <div id="lastet-news" class="block md:flex md:flex-row md:flex-wrap justify-center">
      <?php
      for ($i = 0; $i < 3; $i++) {
        if (!$all_news[$i]) {
          continue;
        }
        ?>
        <div id="new" class="md:w-1/4 md:m-5 mb-9 h-96 border shadow-md">
          <div id="news-image" class="h-3/4">
            <img src="http://localhost:8081/images/<?php echo $all_news[$i]["image"] ?>" class="h-full" alt="">
          </div>
          <div id="title" class="font-bold text-md p-2 max-h-20 overflow-scroll">
            <?php echo $all_news[$i]["title"] ?>
          </div>
          <div id="date"
            class="font-bold text-slate-400 text-xs p-2 bg-slate-200 flex flex-row space-x-2 justify-center shadow-xl">
            <div class="w-1/2">Published Date - <?php echo $all_news[$i]["date"] ?></div>
            <a class="block w-1/2 bg-sky-600 p-2 text-center text-slate-200 rounded-md hover:bg-sky-300 cursor-pointer"
              href="/home?p=news&news_id=<?php echo $all_news[$i]["news_id"] ?>">
              See
              More</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- news -->
  </div>
  <!-- lastest news -->
  <footer class="p-5 w-full">
    <a href="/home?p=contact">
      <div class="h-72 footer-background flex justify-center">
        <h1
          class="backdrop-blur-sm text-center text-3xl font-bold text-slate-400 p-5 md:relative md:p-20 hover:backdrop-blur-xl hover:text-4xl cursor-pointer transition ease-in-out delay-150">
          Contact Us</h1>
      </div>
    </a>
    <div id="copy-right" class="text-center text-slate-400 bg-slate-200 ">copyright@2024</div>
  </footer>
  <!-- contact -->
</div>
<!-- home -->