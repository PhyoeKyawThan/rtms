<?php
?>
<div id="news" class="hidden p-5">
    <h1>သတင်းများ</h1>
    <div class="flex flex-wrap justify-center">
        <?php
        foreach ($all_news as $news) {
            ?>
            <div id="new" class="md:w-1/4 md:m-5 mb-9 h-96 border shadow-md">
                <div id="news-image" class="h-3/4">
                    <img src="http://localhost:8081/images/<?php echo $news["image"] ?>" class="h-full" alt="">
                </div>
                <div id="title" class="font-bold text-md p-2 max-h-20 overflow-scroll">
                    <?php echo $news["title"] ?>
                </div>
                <div id="date"
                    class="font-bold text-slate-400 text-xs p-2 bg-slate-200 flex flex-row space-x-2 justify-center shadow-xl">
                    <div class="w-1/2">Published Date - <?php echo $news["date"] ?></div>
                    <a class="block w-1/2 bg-sky-600 p-2 text-center text-slate-200 rounded-md hover:bg-sky-300 cursor-pointer"
                        href="/home?p=news&news_id=<?php echo $news["news_id"] ?>">
                        See
                        More</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="hidden absolute md:top-50 bg-slate-200 left-0 h-full overflow-scroll" id="news-details">
    <div class="p-5 cursor-pointer underline font-bold text-md text-black" onclick="closeResult('news-details')">
        Back</div>
    <div class="news-info">
        <div class="font-bold text-xl text-slate-800 text-center underline"><?php echo $news_info["title"] ?></div>
        <div class="p-5 h-1/4">
            <img src="http://localhost:8081/images/<?php echo $news_info["image"] ?>" alt="">
        </div>
        <div class="text-slate-400 font-bold text-sm p-5 underline">Published Date - <?php echo $news_info["date"] ?>
        </div>
        <div class="p-5 text-md text-slate-800">
            <?php echo $news_info["content"] ?>
        </div>
    </div>

</div>