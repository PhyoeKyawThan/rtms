<div id="check_driving" class="hidden p-5 flex flex-col footer-background h-full">
    <div class="backdrop-blur-lg h-full shadow-2xl">
    <h1 class="text-slate-100 font-bold text-xl text-center">Check Driving License Card</h1>
    <?php
    if (isset($_GET["valid"])) {

        echo "<div class='text-green-600 font-bold text-center text-xl'>";
        echo "Your Driving License Card Is Valid";
        echo "</div>";
    }
    if(isset($_GET["invalid"])){
        echo "<div class='text-red-600 font-bold text-center text-xl'>";
        echo "Your Driving License Card Is Invalid";
        echo "</div>";
    }
    ?>
    <div id="check-form" class="w-3/5 m-auto mt-5">
        <form action="/driving/check_card" method="post" class="flex flex-row space-x-1">
            <input type="text" name="card_no" placeholder="Card Number..."
                class="p-2 border border-slate-800 font-bold rounded-xl" id="check-card-number" required>
            <input type="submit" value="Check"
                class="w-fit font-bold p-2 bg-sky-600 rounded-xl w-fit text-white hover:bg-sky-300">
        </form>
    </div>
    </div>
</div>