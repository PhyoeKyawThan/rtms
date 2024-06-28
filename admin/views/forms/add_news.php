<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>သီတင်းအသစ်တင်ရန်</title>
    <!-- Tailwind CSS CDN -->
    <script src="/assets/js/tailwind.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <div class="mb-4">
        <a href="/home?p=news" class="text-blue-500 hover:underline">နောက်သို့ပြန်သွားရန်</a>
    </div>
    <div class="container mx-auto p-4">
        <form action="/action/add_news" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto">
            <h1 class="text-2xl font-bold mb-4">သီတင်းအသစ်တင်ရန်</h1>
            <h4 class="text-green-500 mb-4"><?php if (isset($_GET["message"])) {
                echo $_GET["message"];
            } ?></h4>
            <div class="mb-4">
                <input type="file" name="file" id="" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
            </div>
            <div class="mb-4">
                <input type="text" name="title" placeholder="သီတင်းခေါင်းစဉ်" id="" required class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <textarea name="content" id="" placeholder="အကြောင်းအရာ.." required class="block w-full p-2 border border-gray-300 rounded-lg h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <input type="submit" value="တင်မည်" class="w-full bg-blue-500 text-white p-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </form>
    </div>
</body>
</html>
