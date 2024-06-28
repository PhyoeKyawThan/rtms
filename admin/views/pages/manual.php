<?php
include(__DIR__."/../../includes/manual/get_all_manual.php");
?>
<div id="manual" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl shadow-outline p-9">
    <div class="font-bold <?php echo isset($_GET["message"]) && $_GET["message"] == "Success" ? "text-green-600": "text-red-600" ?> m-auto w-fit text-2xl">
        <?php
        if (isset($_GET["message"])) {
            echo $_GET["message"];
        }
        ?>
    </div>
    <h1 class="text-gray-600 font-bold text-xl">Manual</h1>
    <div id="add-manual-form" class="flex flex-row x-space-2 mt-5 bg-slate-200 p-5">
        <form action="/add_manual" method="post" enctype="multipart/form-data">
            <label for="new-manual" class="font-bold text-md text-salte-600">Upload New Manual: </label>
            <input type="file" name="file" id="new-manual" class="">
            <input type="submit" value="Upload"
                class="w-fit pt-2 pb-2 pl-5 pr-5 bg-sky-400 font-bold text-white rounded-3xl cursor-pointer hover:bg-sky-300">
        </form>
    </div>
    <table class="w-full mt-5">
        <thead>
            <tr class="border-2 border-slate-600 mt-5">
                <th>No.</th>
                <th>Manual</th>
                <th>Published Date</th>
                <th>Download</th>
                <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $manual_count = 1;
            foreach ($manuals as $manual) {
            ?>
                <tr class="<?php echo $manual_count%2 == 0 ? "bg-slate-400": "" ?>">
                    <td class="text-center pt-5 pb-5 font-bold text-slate-800"><?php echo $manual_count ?></td>
                    <td class="text-center pt-5 pb-5 font-bold text-slate-800"><?php echo $manual["manual_path"] ?></td>
                    <td class="text-center pt-5 pb-5 font-bold text-slate-800"><?php echo $manual["date"] ?></td>
                    <td class="text-center pt-5 pb-5 font-bold text-slate-800"><a href="/manuals/<?php echo $manual["manual_path"] ?>" download>Download</a></td>
                    <td class="text-center pt-5 pb-5 bg-red-600 rounded-xl m-2 block font-bold text-slate-100"><a href="/action/delete_manual?manual_id=<?php echo $manual["id"] ?>">DELETE</a></td>
                </tr>
            <?php $manual_count++;} ?>
        </tbody>
    </table>
</div>