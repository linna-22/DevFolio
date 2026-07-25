<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Hero Section</h1>

    <div class="flex flex-col sm:flex-row gap-3">

        <!-- Add User Button -->
        <button id="addHeroBtn" onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 transition">
            <i class="fas fa-plus"></i>
            Add Hero
        </button>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4">Frelance Status</th>
                    <th class="px-6 py-4 text-start">Action</th>
                </tr>
            </thead>
            <tbody id="heroTable" class="divide-y divide-gray-100 text-gray-700">

            </tbody>

        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <span class="text-sm text-gray-500">Showing 1 to 1 of 1 entries</span>
        <div class="flex gap-2">
            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500 hover:bg-gray-50 disabled:opacity-50"
                disabled>Previous</button>
            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500 hover:bg-gray-50">Next</button>
        </div>
    </div>
</div>

<!-- The Modal Structure -->
<div id="heroModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 id="modalTitleHero" class="text-xl font-bold text-gray-800">
                Add New Hero
            </h2>
            <button onclick="toggleModal(false)" class="text-gray-400 hover:text-gray-600"><i
                    class="fas fa-times"></i></button>
        </div>

        <form id="heroForm" class="p-6 space-y-4">
            <input type="hidden" id="hero_id" name="id">
            <!-- Reuse your form fields here -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Freelance Status</label>
                    <select name="freelance_status" id="freelance_status"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>

                    <textarea name="desc" id="desc" rows="4" placeholder="Enter description..."
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition resize-none"></textarea>
                </div>

            </div>
            <!-- Add remaining fields: Email, Password, Job, Address -->

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="toggleModal(false)"
                    class="px-6 py-2 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" id="saveBtn" class="bg-indigo-600 text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {

        const modal = document.getElementById("heroModal");

        if (show) {

            modal.classList.remove("hidden");
            modal.classList.add("flex");

        } else {

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            $("#heroForm")[0].reset();
            $("#hero_id").val("");

            $("#modalTitleHero").text("Edit Hero Information");
            $("#saveBtn").text("Save Hero");

        }

    }
</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>