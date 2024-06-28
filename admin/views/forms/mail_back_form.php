<?php
    if(!isset($_GET["contact_id"])){
        header("Location: /home?p=user-contact");
        exit;
    }
    include(__DIR__."/../../model/db.php");
    $db = new DB();
    $user_contact = $db->get_data_by_id("contact", $_GET["contact_id"], "contact_id") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Contact</title>
    <script src="/assets/js/tailwind.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <style>
        .spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #000;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md relative">
        <div>
            <a href="/home?p=user-contact">Back</a>
        </div>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Reply to Contact</h2>
        <form id="reply-form" action="/action/mail_back" method="POST" class="space-y-4" onsubmit="handleFormSubmit(event)">
            <div id="alert-msg" class="text-bold">

            </div>
            <div>
                <label for="user-email" class="block text-gray-700 font-medium">User Email</label>
                <input type="email" id="user-email" value="<?php echo $user_contact["email"] ?>" name="mail" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                <input type="hidden" name="mail" value="<?php echo $user_contact["email"] ?>">
            </div>
            <div>
                <label for="reply-subject" class="block text-gray-700 font-medium">Reply Subject</label>
                <input type="text" id="reply-subject" value="<?php echo $user_contact["title"] ?>" name="subject" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="user-content" class="block text-gray-700 font-medium">User Content</label>
                <textarea name="" id="" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" disabled><?php echo $user_contact["content"] ?></textarea>
            </div>
            <div>
                <label for="reply-content" class="block text-gray-700 font-medium">Reply Content</label>
                <textarea id="reply-content" name="reply-content" rows="4" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <input type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" value="Send Reply" id="submit-btn">
            </div>
        </form>
        <div id="spinner" class="spinner absolute inset-0 flex items-center justify-center"></div>
    </div>
    <script>
        function handleFormSubmit(event) {
            event.preventDefault();
            
            const form = event.target;
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            const spinner = document.getElementById('spinner');
            const alert_msg =document.getElementById("alert-msg");
            const submit_btn =document.getElementById("submit-btn");

            // Show the spinner
            spinner.style.display = 'flex';
            submit_btn.disabled = true;
            xhr.open('POST', form.action, true);
            xhr.onload = function () {
                // Hide the spinner
                spinner.style.display = 'none';

                if (xhr.status === 200) {
                    form.reset(); // Reset the form fields
                    alert_msg.classList.remove("text-red-600");
                    alert_msg.classList.add("text-green-600");
                    alert_msg.innerText = 'Mail has been sent successfully!';
                    submit_btn.disabled = false;
                } else {
                    alert_msg.classList.remove("text-green-600");
                    alert_msg.classList.add("text-red-600");
                    alert_msg.innerText = 'Error while sending mail';
                    submit_btn.disabled = false;
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>
