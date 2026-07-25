<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Project Management</h1>

    <div class="flex flex-col sm:flex-row gap-3">
        <!-- Search Box -->
        <div class="relative">
            <input type="text" placeholder="Search project..."
                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none w-full md:w-64">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>

        <!-- Add User Button -->
        <button onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 transition">
            <i class="fas fa-plus"></i> Add New Project
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
                    <th class="px-6 py-4">Desc</th>
                    <th class="px-6 py-4">Image</th>
                    <th class="px-6 py-4">URL</th>
                    <th class="px-6 py-4">Target</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="projectTable" class="divide-y divide-gray-100 text-gray-700">

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
<div id="projectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-4xl">

        <!-- Header -->
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 id="modalTitle" class="text-xl font-bold text-gray-800">
                Add New Project
            </h2>

            <button onclick="toggleModal(false)" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form -->
        <form id="projectForm" class="p-6 space-y-5" enctype="multipart/form-data">

            <input type="hidden" id="project_id" name="project_id">

            <!-- Row 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Project Title
                    </label>

                    <input type="text" id="title" name="title" placeholder="Portfolio Website"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Project URL
                    </label>

                    <input type="url" id="url" name="url" placeholder="https://example.com"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

            </div>

            <!-- Description -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea id="desc" name="desc" rows="4" placeholder="Write a short description..."
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>

            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Target
                    </label>

                    <select id="target" name="target"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                        <option value="_self">Same Tab</option>
                        <option value="_blank">New Tab</option>

                    </select>

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Project Image
                    </label>

                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                </div>

            </div>

            <!-- Preview -->
            <div id="imagePreview" class="hidden">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Current Image
                </label>

                <img id="preview" src="" class="w-40 h-28 object-cover rounded-lg border">

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-5 border-t">

                <button type="button" onclick="toggleModal(false)"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 hover:bg-gray-100">

                    Cancel

                </button>

                <button type="submit" id="saveBtn"
                    class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                    Save Project

                </button>

            </div>

        </form>

    </div>
</div>

<script>
    function toggleModal(show) {

        const modal = document.getElementById("projectModal");

        if (show) {

            modal.classList.remove("hidden");
            modal.classList.add("flex");

        } else {

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            $("#projectForm")[0].reset();
            $("#project_id").val("");

            $("#modalTitle").text("Add New Project");
            $("#saveBtn").text("Save Project");

            $("#preview").attr("src", "");
            $("#imagePreview").addClass("hidden");
        }

    }
</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>