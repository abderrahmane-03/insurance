<?php 
 
require_once($_SERVER["DOCUMENT_ROOT"]."/A-ASSURANCE/app/controllers/client.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans antialiased bg-gray-100 flex h-screen">
    
<div class="bg-yellow-400 text-black w-1/6 p-4">
    <h1 class="text-2xl font-bold mb-4">Insurance</h1>
    <ul class="space-y-2">
        <li><a href="../../app/views/Client.php" class="hover:text-yellow-300">Clients</a></li>
        <li><a href="../../app/views/claims.php" class="hover:text-yellow-300">Claims</a></li>
        <li><a href="../../app/views/premiums.php" class="hover:text-yellow-300">Premiums</a></li>
        <li><a href="../../app/views/articles.php" class="hover:text-yellow-300">Articles</a></li>
        <li><a href="../../app/views/Assurance.php" class="hover:text-yellow-300">Assurances</a></li>
    </ul>
</div>
    <div class="flex-1 p-4">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-bold">Clients List</h2>
            <button id="addClientBtn" class="bg-yellow-400 text-black px-4 py-2 rounded-xl">Add Client</button>
        </div>
        

        
            <table class="min-w-full bg-yellow-400 rounded-xl">
                <thead class="rounded">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">CIN</th>
                        <th class="py-2 px-4 border-b">Address</th>
                        <th class="py-2 px-4 border-b">Number</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                     $ClientService = new ClientService();
                     $rows = $ClientService->display();
                      foreach ($rows as $row) : ?>
                         <tr>
        <td class="py-2 px-4 border-b"><?= $row['Client_ID'] ?></td>
        <td class="py-2 px-4 border-b"><?= $row['Name'] ?></td>
        <td class="py-2 px-4 border-b"><?= $row['CIN'] ?></td>
        <td class="py-2 px-4 border-b"><?= $row['Address'] ?></td>
        <td class="py-2 px-4 border-b"><?= $row['Number'] ?></td>
        <td class="py-2 px-4 border-b">
            <button class="bg-green-500 text-white px-2 py-1 rounded mr-2">Edit</button>
            <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
        </td>
    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        
    </div>

    <div id="addClientModal" class="fixed inset-0 bg-gray-900 bg-opacity-80 backdrop-blur-sm hidden items-center flex justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Add Client</h2>
            <form id="addClientForm" action="../controllers/Client.php" method="post">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="CIN" class="block text-sm font-semibold text-gray-600">CIN:</label>
                    <input type="text" id="CIN" name="CIN" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-semibold text-gray-600">Address:</label>
                    <input type="text" id="address" name="address" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="number" class="block text-sm font-semibold text-gray-600">Number:</label>
                    <input type="text" id="number" name="number" class="w-full p-2 border rounded">
                </div>
                <button type="submit" name="action" value="addClient" class="bg-yellow-400 text-black px-4 py-2 rounded">Add Client</button>
                <button type="button" id="closeAddClientModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const addClientBtn = document.getElementById('addClientBtn');
        const closeAddClientModalBtn = document.getElementById('closeAddClientModal');

        if (addClientBtn && closeAddClientModalBtn) {
            addClientBtn.addEventListener('click', showAddClientModal);
            closeAddClientModalBtn.addEventListener('click', hideAddClientModal);
        }

        function showAddClientModal() {
            const addClientModal = document.getElementById('addClientModal');
            if (addClientModal) {
                addClientModal.classList.remove('hidden');
            }
        }

        function hideAddClientModal() {
            const addClientModal = document.getElementById('addClientModal');
            if (addClientModal) {
                addClientModal.classList.add('hidden');
            }
        }
    });
</script>



</body>

</html>