<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">About Section</h1>

    <div class="flex flex-col sm:flex-row gap-3">

        <!-- Add User Button -->
        <button id="addaboutBtn" onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 transition">
            <i class="fas fa-plus"></i>
            Add About Info
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
                    <th class="px-6 py-4">Position</th>
                    <th class="px-6 py-4">Position Detail</th>
                    <th class="px-6 py-4">skills</th>
                    <th class="px-6 py-4">About Me</th>
                    <th class="px-6 py-4">Desc</th>
                    <th class="px-6 py-4">Experience</th>
                    <th class="px-6 py-4">Project</th>
                    <th class="px-6 py-4 text-start">Action</th>
                </tr>
            </thead>
            <tbody id="aboutTable" class="divide-y divide-gray-100 text-gray-700">

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
<div id="aboutModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-3xl">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <h2 id="modalTitleAbout" class="text-xl font-bold text-gray-800">
                Add About Information
            </h2>

            <button onclick="toggleModal(false)"
                class="text-gray-400 hover:text-gray-600 transition">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <form id="aboutForm" class="p-6 space-y-5">

            <input type="hidden" id="about_id" name="id">

            <!-- Row 1 -->
            <div class="grid grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Position
                    </label>

                    <input
                        type="text"
                        id="position"
                        name="position"
                        placeholder="Full Stack Developer"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Skills
                    </label>

                    <input
                        type="text"
                        id="skills"
                        name="skills"
                        placeholder="Laravel, React, PHP..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

            </div>

            <!-- Row 2 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Position Description
                </label>

                <textarea
                    id="position_desc"
                    name="position_desc"
                    rows="3"
                    placeholder="Describe your position..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 resize-none focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
            </div>

            <!-- Row 3 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    About Me Title
                </label>

                <input
                    type="text"
                    id="aboutme_title"
                    name="aboutme_title"
                    placeholder="About Me"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <!-- Row 4 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    About Me Description
                </label>

                <textarea
                    id="aboutme_desc"
                    name="aboutme_desc"
                    rows="4"
                    placeholder="Tell visitors about yourself..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 resize-none focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
            </div>

            <!-- Row 5 -->
            <div class="grid grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Experience (Years)
                    </label>

                    <input
                        type="number"
                        id="experience"
                        name="experience"
                        min="0"
                        placeholder="3"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Completed Projects
                    </label>

                    <input
                        type="number"
                        id="completed_project"
                        name="completed_project"
                        min="0"
                        placeholder="25"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-5 border-t">

                <button
                    type="button"
                    onclick="toggleModal(false)"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                    Cancel
                </button>

                <button
                    type="submit"
                    id="saveBtn"
                    class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white transition">
                    Save
                </button>

            </div>

        </form>

    </div>
</div>

<script>
    function toggleModal(show) {

        const modal = document.getElementById("aboutModal");

        if (show) {

            modal.classList.remove("hidden");
            modal.classList.add("flex");

        } else {

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            $("#aboutForm")[0].reset();
            $("#about_id").val("");

            $("#modalTitleAbout").text("Add New About");
            $("#saveBtn").text("Save About");

        }

    }
</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>