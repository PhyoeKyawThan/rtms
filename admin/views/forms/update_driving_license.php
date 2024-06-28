<?php
// session_start();
// if(!isset($_SESSION["current_admin"])){
//     header("Location: login_view.php");
// }

include (__DIR__ . "/../../includes/driving/get_driving_by_id.php");

$detail = get_data($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>မွမ်းမံရန် ဖြေသူ အချက်အလက်</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        form {
            box-sizing: border-box;
            width: 60%;
            height: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>



    <form action="/action/update_driving_license?id=<?php echo $detail["driving_id"] ?>" method="post">
        <div><a href="/home?p=driving">နောက်သို့ပြန်သွားရန်</a></div>
        <h3>ယာဉ်မောင်းလိုင်စဉ်လာ‌ ‌ရောက် ဖြေသူ အချက်အလက် မွမ်းမံရန်</h3>
        <h4>
            <?php
            if (isset($_GET["message"])) {
                echo $_GET["message"];
            }
            ?>
        </h4>
        <label for="အမည်">အမည်:</label><br>
        <input type="text" value="<?php echo $detail["name"] ?>" name="name" required><br>
        
        <label for="လိုင်စဉ်">လိုင်စဉ်:</label><br>
        <input type="text" value="<?php echo $detail["license"] ?>" name="license" required><br>

        <label for="မှတ်ပုံတင်အမှတ်">မှတ်ပုံတင်အမှတ်:</label><br>
        <input type="text" value="<?php echo $detail["nrc"] ?>" name="nrc" required><br>

        <label for="အဖအမည်">အဖအမည်:</label><br>
        <input type="text" value="<?php echo $detail["father_name"] ?>" name="father_name" required><br>

        <label for="မွေးနေ့">မွေးနေ့:</label><br>
        <input type="date" value="<?php
        $birth_date = new DateTime($detail["birth_date"]);
        echo $birth_date->format("Y-m-d");
        ?>" name="birth_date" required><br>

        <label for="license-type">လိုင်စဉ် ပုံစံ</label>
        <select name="license_type" id="license-type" style="width: 100%;" required>
            <option>ရွေးရန်</option>
            <option value="သ" <?php echo $detail["license_type"] == "သ" ? "selected" : ""; ?>>သ</option>
            <option value="က" <?php echo $detail["license_type"] == "က" ? "selected" : ""; ?>>က</option>
            <option value="ခ" <?php echo $detail["license_type"] == "ခ" ? "selected" : ""; ?>>ခ</option>
            <option value="ဃ" <?php echo $detail["license_type"] == "ဃ" ? "selected" : ""; ?>>ဃ</option>
            <option value="င" <?php echo $detail["license_type"] == "င" ? "selected" : ""; ?>>င</option>
            <option value="ဟ" <?php echo $detail["license_type"] == "ဟ" ? "selected" : ""; ?>>ဟ</option>
            <option value="ဌ" <?php echo $detail["license_type"] == "ဌ" ? "selected" : ""; ?>>ဌ</option>
            <option value="စ" <?php echo $detail["license_type"] == "စ" ? "selected" : ""; ?>>စ</option>
        </select>

        <label for="နေရပ်လိပ်စာ">နေရပ်လိပ်စာ:</label><br>
        <input type="text" value="<?php echo $detail["address"] ?>" name="address" required><br>

        <label for="ကုန်ဆုံးရက်">ကုန်ဆုံးရက်:</label><br>
        <input type="date" value="<?php
        $exp_date = new DateTime($detail["exp_date"]);
        echo $exp_date->format("Y-m-d");
        ?>" name="exp_date" required><br>

        <label for="ကဒ်နံပါတ်">ကဒ်နံပါတ်:</label><br>
        <input type="text" value="<?php echo $detail["card_number"] ?>" name="card_number" required><br>
        <input type="submit" value="ပေးပို့မည်">
    </form>

</body>

</html>