<?php 
include(__DIR__."/../../includes/news/get_all_news.php");
?>

<div id="news" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl p-9">
    <h1 class="text-xl font-bold text-gray-600">News</h1>
    <div class="border border-slate-800 flex w-fit p-2 rounded-xl bg-slate-200 hover:bg-slate-500"
        onclick="newPage('/add_news')">Add New News
        <svg class="w-6 h-6 text-red-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M20 6h-5V4c0-1.103-.897-2-2-2H7C5.897 2 5 2.897 5 4v14c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2v-2h1c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zM7 4h6v14H7V4zm10 14h-2V8h5v8h-2v2z"/>
            </svg>
    </div>
    <div class="flex flex-row m-5">
        <div id="total-news" class="font-bold text-gray-600 text-2xl basis-2/4">
            Total News - <?php echo count($all_news) ?>
        </div>
        <div id="search-news" class="basis-2/4 text-right">
            <label for="news-date">Select Date to Search</label>
            <input type="date" class="w-60 pt-2 pb-2 px-4 py-4 text-sm rounded-xl" name="" id="news-date" required>
            <br>
            <a href=""
                class="hidden inline-block bg-white w-60 text-center pt-2 pb-2 px-4 py-4 text-sm rounded-xl font-bold">Not
                Found</a>
        </div>
    </div>
    <table class="w-full">
        <thead>
            <tr class="bg-slate-400 sticky negative-top-offset">
                <th class="text-center font-bold text-gray-800 p-5">စဉ်</th>
                <th class="text-center font-bold text-gray-800 p-5">ခေါင်းစဉ်</th>
                <th class="text-center font-bold text-gray-800 p-5">ရက်စွဲ</th>
                <th class="text-center font-bold text-gray-800 p-5">OPTIONS</th>
            </tr>
        </thead>
        <tbody class="overflow-scroll" id="news-tbody">
            <?php
            $news_count = 1;
                foreach($all_news as $news){
                    
            ?>
            <tr class="bg-gray-300">
                <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $news_count ?></td>
                <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $news["title"] ?></td>
                <td class="text-center font-bold text-white p-5 bg-slate-500"><?php echo $news["date"] ?></td>
                <td class="text-center font-bold text-white p-5 bg-slate-500 flex justify-center">
                    <button class="bg-blue-500 m-5 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/view_news?id=' + <?php echo $news['news_id']  ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172 7.293 8.464 2 14.828 1.172 16 4 16l6-6 .707-.707L14.828 5a2 2 0 000-2.828l-1.414-1.414z" />
                        </svg>
                    </button>
                    <!-- update -->
                    <button class="bg-red-500 m-5 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center" onclick="newPage('/action/delete_news?id=' + <?php echo $news['news_id']  ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5zm3.293 4.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414L11.414 10l1.293 1.293a1 1 0 01-1.414 1.414L10 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L8.586 10 7.293 8.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- delete -->
                </td>
            </tr>

            <?php $news_count++;} ?>

        </tbody>
    </table>

</div>
<!-- news -->