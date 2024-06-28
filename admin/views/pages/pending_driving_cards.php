<div id="pending_driving" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl p-9">
    <?php include (__DIR__ . "/../../includes/driving/get_pending.php") ?>
    <h1 class="text-gray-600 font-bold text-xl">Pending Driving</h1>
    <table class="w-full text-center">
        <thead>
            <tr class="bg-slate-200">
                <th class="p-2">No.</th>
                <th class="p-2">Name</th>
                <th class="p-2">Current Current No.</th>
                <th class="p-2">Want License</th>
                <th class="p-2">Request Date</th>
                <th class="p-2">Approve</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pending_count = 1;
            foreach ($pendings as $pending) {
                ?>
                <tr class="p-10">
                    <td class="p-2"><?php echo $pending_count ?></td>
                    <td class="p-2"><?php echo $pending["name"] ?></td>
                    <td class="p-2"><?php echo $pending["current_card"] ?></td>
                    <td class="p-2"><?php echo $pending["want_license"] ?></td>
                    <td class="p-2"><?php echo $pending["date"] ?></td>
                    <td class="p-2 rounded-xl bg-green-600 w-fit font-bold text-slate-100">
                        <a href="/view_driving_license?id=<?php echo $pending["driving_id"] ?>">Approve</a>
                    </td>
                </tr>
                <?php $pending_count++;
            } ?>

        </tbody>
    </table>
</div>