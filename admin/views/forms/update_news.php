<?php
<<<<<<< HEAD
include(__DIR__."/../../includes/news/get_news_by_id.php");
=======
include (__DIR__ . "/../../includes/news/get_news_by_id.php");
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
$news = get_data($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
=======

>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>သီတင်း မွမ်းမံရန်</title>
    <!-- Tailwind CSS CDN -->
    <script src="/assets/js/tailwind.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<<<<<<< HEAD
=======

>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <div class="mb-4">
        <a href="/home?p=news" class="text-blue-500 hover:underline">နောက်သို့ပြန်သွားရန်</a>
    </div>
    <div class="container mx-auto p-4">
<<<<<<< HEAD
        <form action="/action/update_news?news_id=<?php echo $news["news_id"] ?>" method="post" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto">
            <h1 class="text-2xl font-bold mb-4">မွမ်းမံရန်</h1>
            <?php if (isset($_GET["message"])) {
                echo "<h4 class='text-green-500 mb-4'>".$_GET["message"]."<h4>";
            } 
            if (isset($_GET["error"])) {
                echo "<h4 class='text-red-500 mb-4'>".$_GET["error"]."<h4>";
            }
            ?>
            <div class="mb-4">
                <!-- <input type="file" name="file" id="" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"> -->
            </div>
            <div class="mb-4">
                <input type="text" name="title" placeholder="သီတင်းခေါင်းစဉ်" id="" value="<?php echo $news["title"] ?>" required class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <textarea name="content" id="" placeholder="အကြောင်းအရာ.." required class="block w-full p-2 border border-gray-300 rounded-lg h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo $news["content"] ?></textarea>
            </div>
            <div>
                <input type="submit" value="မွမ်းမံမည်" class="w-full bg-blue-500 text-white p-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </form>
    </div>
</body>
</html>
=======
        <form action="/action/update_news?news_id=<?php echo $news["news_id"] ?>" method="post"
            class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto" enctype="multipart/form-data">
            <h1 class="text-2xl font-bold mb-4">မွမ်းမံရန်</h1>
            <?php if (isset($_GET["message"])) {
                echo "<h4 class='text-green-500 mb-4'>" . $_GET["message"] . "<h4>";
            }
            if (isset($_GET["error"])) {
                echo "<h4 class='text-red-500 mb-4'>" . $_GET["error"] . "<h4>";
            }
            ?>
            <div class="mb-4">
                <label for="file" class="block w-full">
                    <img src="/images/<?php echo $news["image"] ?>" alt="<?php echo $news["title"] ?>"
                            srcset="" class="w-40 h-40 shadow-lg rounded-md m-2 m-auto">
                </label>
                <input type="file" name="file" id="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
            </div>
            <div class="mb-4">
                <input type="text" name="title" placeholder="သီတင်းခေါင်းစဉ်" id="" value="<?php echo $news["title"] ?>"
                    required
                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <textarea name="content" id="" placeholder="အကြောင်းအရာ.." required
                    class="block w-full p-2 border border-gray-300 rounded-lg h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo $news["content"] ?></textarea>
            </div>
            <div>
                <input type="submit" value="မွမ်းမံမည်"
                    class="w-full bg-blue-500 text-white p-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </form>
    </div>
    <script>
        const file = document.getElementById("file");

        file.addEventListener("change", () => {
            const image_ = document.querySelector("label img");
            const file_ = file.files[0];
            if (file_) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    image_.src = e.target.result;
                }
                reader.readAsDataURL(file_);
            }
        });
    </script>
</body>

</html>
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
