<?php
// session_start();
// if(!isset($_SESSION["current_admin"])){
//     header("Location: login_view.php");
// }
?>
<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ဖြေသူ အချက်အလက်</title>
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
    <form action="/action/add_driving_license" method="post">
        <div><a href="/home?p=driving">နောက်သို့ပြန်သွားရန်</a></div>
        <h3>ယာဉ်မောင်းလိုင်စဉ်လာ‌ ‌ရောက် ဖြေသူ အချက်အလက်</h3>
        <h4>
            <?php
            if(isset($_GET["message"])){
                echo $_GET["message"];
            }
            ?>
        </h4>
        <label for="အမည်">အမည်:</label><br>
        <input type="text" id="အမည်" name="name" required><br>

        <label for="မှတ်ပုံတင်အမှတ်">မှတ်ပုံတင်အမှတ်:</label><br>
        <input type="text" id="မှတ်ပုံတင်အမှတ်" name="nrc" required><br>

        <label for="လိုင်စဉ်">လိုင်စဉ်:</label><br>
        <input type="text" id="လိုင်စဉ်" name="license" required><br>

        <label for="အဖအမည်">အဖအမည်:</label><br>
        <input type="text" id="အဖအမည်" name="father_name" required><br>

        <label for="မွေးနေ့">မွေးနေ့:</label><br>
        <input type="date" id="မွေးနေ့" name="birth_date" required><br>

        <label for="နေရပ်လိပ်စာ">နေရပ်လိပ်စာ:</label><br>
        <input type="text" id="နေရပ်လိပ်စာ" name="address" required><br>

        <label for="ကုန်ဆုံးရက်">ကုန်ဆုံးရက်:</label><br>
        <input type="date" id="ကုန်ဆုံးရက်" name="exp_date" required><br>
        <label for="license_type">လိုင်စဉ် ပုံစံ</label>
        <select name="license_type" id="license_type" style="width: 100%;" required>
            <option>ရွေးရန်</option>
            <option value="သ">သ</option>
            <option value="က">က</option>
            <option value="ခ">ခ</option>
            <option value="ဃ">ဃ</option>
            <option value="င">င</option>
            <option value="ဟ">ဟ</option>
            <option value="ဌ">ဌ</option>
            <option value="စ">စ</option>
        </select>
        <label for="ကဒ်နံပါတ်">ကဒ်နံပါတ်:</label><br>
        <input type="text" id="ကဒ်နံပါတ်" name="card_number" required><br>

        <input type="submit" value="ပေးပို့မည်">
    </form>

</body>

</html>