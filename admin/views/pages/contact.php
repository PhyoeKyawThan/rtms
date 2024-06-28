<div id="contact" class="hidden h-full bg-slate-300 overflow-scroll rounded-xl shadow-outline p-9">
    <?php
    include (__DIR__ . "/../../model/contact_info.php");

    $contact_info = new ContactInfo(__DIR__ . "/../../public/assets/js/contact.json");

    // Fetch existing contact information
    $address = $contact_info->getAddress();
    $emails = $contact_info->getEmail();
    $phones = $contact_info->getPhone();
    $map = $contact_info->getMap();
    ?>

    <script>
        function addEmailField(value = '') {
            const emailContainer = document.getElementById('email-container');
            const emailField = document.createElement('div');
            emailField.className = 'flex items-center mb-2';
            emailField.innerHTML = `
                <input type="email" name="emails[]" class="email-input border border-gray-300 rounded p-2 flex-grow" placeholder="Enter email" value="${value}" required>
                <button type="button" class="remove-email ml-2 text-red-500" onclick="removeField(this)">Remove</button>
            `;
            emailContainer.appendChild(emailField);
        }

        function addPhoneField(value = '') {
            const phoneContainer = document.getElementById('phone-container');
            const phoneField = document.createElement('div');
            phoneField.className = 'flex items-center mb-2';
            phoneField.innerHTML = `
                <input type="text" name="phones[]" class="phone-input border border-gray-300 rounded p-2 flex-grow" placeholder="Enter phone number" value="${value}" required>
                <button type="button" class="remove-phone ml-2 text-red-500" onclick="removeField(this)">Remove</button>
            `;
            phoneContainer.appendChild(phoneField);
        }

        function removeField(button) {
            button.parentElement.remove();
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Pre-populate email fields
            <?php if (!empty($emails)): ?>
                <?php foreach ($emails as $email): ?>
                    addEmailField('<?php echo $email; ?>');
                <?php endforeach; ?>
            <?php endif; ?>

            // Pre-populate phone fields
            <?php if (!empty($phones)): ?>
                <?php foreach ($phones as $phone): ?>
                    addPhoneField('<?php echo $phone; ?>');
                <?php endforeach; ?>
            <?php endif; ?>
        });
    </script>
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6">Contact Info</h2>
            <form action="/update_contact" method="post">
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                    <input type="text" id="address" name="address" class="border border-gray-300 rounded p-2 w-full"
                        placeholder="Enter address" value="<?php echo $address; ?>" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Emails</label>
                    <div id="email-container"></div>
                    <button type="button" class="mt-2 text-blue-500" onclick="addEmailField()">Add Email</button>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Phone Numbers</label>
                    <div id="phone-container"></div>
                    <button type="button" class="mt-2 text-blue-500" onclick="addPhoneField()">Add Phone</button>
                </div>

                <div class="mb-4">
                    <label for="map" class="block text-gray-700 font-bold mb-2">Map URL</label>
                    <input type="url" id="map" name="map" class="border border-gray-300 rounded p-2 w-full"
                        placeholder="Enter map URL" value="<?php echo $map; ?>" required>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
</div>