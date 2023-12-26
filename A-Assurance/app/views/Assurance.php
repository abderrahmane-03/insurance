<?php 
 
require_once($_SERVER["DOCUMENT_ROOT"]."/A-ASSURANCE/app/controllers/Assurance.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurances</title>
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
            <h2 class="text-2xl font-bold">Assurances List</h2>
            <button id="addAssuranceBtn" class="bg-yellow-400 text-black px-4 py-2 rounded">Add Assurance</button>
        </div>

        
            <table class="min-w-full bg-yellow-400 rounded-xl">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Logo</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $AssuranceService = new AssuranceService();
                     $assurances = $AssuranceService->display();
                     foreach ($assurances as $assurance) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $assurance['Assurance_ID']; ?></td>
                            <td class="py-2 px-4 border-b"><?= $assurance['Name']; ?></td>
                            <td class="py-2 px-4 border-b"><img src="<?= $assurance['Logo'];?>"></td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

    <div id="addAssuranceModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center flex justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Add Assurance</h2>
            <form id="addAssuranceForm" action="../controllers/assurance.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="logo" class="block text-sm font-semibold text-gray-600">Logo:</label>
                    <input type="file" id="logo" name="logo" class="w-full p-2 border rounded">
                </div>
                <button type="submit" name="action" value="addAssurance" class="bg-yellow-400 text-white px-4 py-2 rounded">Add Assurance</button>
                <button type="button" id="closeAddAssuranceModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const addAssuranceBtn = document.getElementById('addAssuranceBtn');
            const closeAddAssuranceModalBtn = document.getElementById('closeAddAssuranceModal');

            if (addAssuranceBtn && closeAddAssuranceModalBtn) {
                addAssuranceBtn.addEventListener('click', showAddAssuranceModal);
                closeAddAssuranceModalBtn.addEventListener('click', hideAddAssuranceModal);
            }

            function showAddAssuranceModal() {
                const addAssuranceModal = document.getElementById('addAssuranceModal');
                if (addAssuranceModal) {
                    addAssuranceModal.classList.remove('hidden');
                }
            }

            function hideAddAssuranceModal() {
                const addAssuranceModal = document.getElementById('addAssuranceModal');
                if (addAssuranceModal) {
                    addAssuranceModal.classList.add('hidden');
                }
            }
        });
    </script>

</body>

</html>
