<?php
include (__DIR__ . "/../../includes/reviews/get_reviews.php");
?>
<div id="reviews" class="hidden overflow-scroll w-full">
    <h4 class="text-center text-slate-800 underline mt-2 mb-2">အကြံပြုချက်များ</h4>
    <div class="w-full">
        <div class="md:w-3/5 w-3/4 m-auto">
            <?php
            if (isset($_GET["review_message"])) {
                echo "<div class='text-center text-green-600 text-xl font-bold'>" . $_GET["review_message"] . "</div>";
            } else {
                echo "<div class='text-center text-red-600 text-xl font-bold'>" . $_GET["review_error"] . "</div>";
            }
            ?>
            <form action="/upload_review" method="post" class="flex flex-row space-x-2">
                <textarea name="content" id="" class="border border-slate-300 p-2"
                    placeholder="အကြံပြုချက်များ..." required></textarea>
                <input type="submit" value="တင်ရန်"
                    class="w-fit p-2 m-auto bg-sky-600 text-slate-100 rounded-md cursor-pointer hover:bg-sky-400">
            </form>
        </div>
        <div class="md:w-3/5 w-3/4 mt-5 m-auto">
            <?php
            foreach ($reviews as $review) {
                ?>
                <div class="border-b border-slate-800">
                    <div class="font-bold text-md text-slate-600 flex justify-center">
                        <img src="profiles/<?php echo $review["profile_url"] ?>" class="w-10 h-10 rounded-full" alt="" srcset="">
                        <span class="m-2"><?php echo $review["username"] ?></span>
                    </div>
                    <div class="text-sm text-slate-400">
                        <?php echo $review["reviewed_date"] ?>
                    </div>
                    <div class="text-slate-600 p-2">
                        <?php echo $review["content"] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>