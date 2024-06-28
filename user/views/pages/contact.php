<div id="contact" class="hidden h-full">
    <?php
    $contact = json_decode($contact, true);
    ?>
    <div id="map" class="p-2 md:flex md:flex-row md:space-x-2">
        <iframe src="<?php echo $contact["map"] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="contact-form">
            <form action="/contact/new_contact" method="post">
                <h1 class="text-center font-bold text-3xl text-sky-600">Contact Us</h1>
                <div class="text-center ">
                    <?php 
                        if (isset($_GET["message"]) ){
                            echo "<span class='text-green-600 font-bold text-xl'>".$_GET["message"]."</span>";
                        }
                        if(isset($_GET["error"])){
                            echo "<span class='text-red-600 font-bold text-xl'>".$_GET["message"]."</span>";
                        }
                    ?>
                </div>
                <label for="Title">Title</label>
                <input type="text" name="title" class="p-2 border border-slate-400" placeholder="Title" id="">
                <label for="Email">Email</label>
                <input type="email" name="email" class="p-2 border border-slate-400" placeholder="example@gmail.com" id="">
                <label for="content">Content</label>
                <textarea name="content" class="p-2 border border-slate-400" placeholder="Content" id=""></textarea>
                <input type="submit" value="Done" class="bg-sky-800 text-white pt-2 pb-2 pl-4 pr-4 rounded-xl font-bold w-fit m-auto block cursor-pointer hover:bg-sky-300">
            </form>
        </div>
    </div>
    <div class="p-5 bg-slate-300">
        <div class="text-xl font-bold text-center p-5">Contact</div>
        <div class="flex flex-row space-x-2 md:w-2/5">
            <div class="font-bold text-md text-slate-600">Address</div>
            <div>- <?php echo htmlspecialchars($contact["address"]); ?></div>
        </div>
        <div class="flex flex-row space-x-2 md:w-2/5">
            <div class="font-bold text-md text-slate-600">Email</div>
            <div>- <?php echo htmlspecialchars(implode(", ", $contact["email"])); ?></div>
        </div>
        <div class="flex flex-row space-x-2 md:w-2/5">
            <div class="font-bold text-md text-slate-600">Phone</div>
            <div>- <?php echo htmlspecialchars(implode(", ", $contact["phone"])); ?></div>
        </div>
    </div>
</div>