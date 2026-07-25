<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Education Section</h1>

    <div class="flex flex-col sm:flex-row gap-3">
        <button id="addEducationBtn" onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 transition">
            <i class="fas fa-plus"></i>
            Add Education
        </button>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-left text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">School</th>
                    <th class="px-6 py-4">Major</th>
                    <th class="px-6 py-4">Major Detail</th>
                    <th class="px-6 py-4">Start Year</th>
                    <th class="px-6 py-4">End Year</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>

            <tbody id="educationTable" class="divide-y divide-gray-100 text-gray-700">

            </tbody>

        </table>

    </div>

    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">

        <span class="text-sm text-gray-500">
            Education List
        </span>

        <div class="flex gap-2">

            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500 disabled:opacity-50" disabled>
                Previous
            </button>

            <button class="px-3 py-1 border border-gray-200 rounded text-gray-500">
                Next
            </button>

        </div>

    </div>

</div>

<!-- Modal -->
<div id="educationModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">

        <div class="p-6 border-b border-gray-100 flex justify-between items-center">

            <h2 id="modalTitleEducation" class="text-xl font-bold text-gray-800">
                Add New Education
            </h2>

            <button onclick="toggleModal(false)" class="text-gray-500 hover:text-red-500">
                <i class="fas fa-times"></i>
            </button>

        </div>

        <form id="educationForm" class="p-6 space-y-5">

            <input type="hidden" id="education_id" name="education_id">

            <!-- School -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        School Name
                    </label>

                    <input type="text" id="school_name" name="school_name" placeholder="University Name"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Major
                    </label>

                    <input type="text" id="major" name="major" placeholder="Computer Science"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>
            </div>

            <!-- Major + Start Year -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">



                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Start Year
                    </label>

                    <input type="number" id="start_year" name="start_year" placeholder="2023" min="1900" max="2100"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        End Year
                    </label>

                    <input type="number" id="end_year" name="end_year" placeholder="2027" min="1900" max="2100"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>


            </div>

            <!-- Major Detail -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Major Detail
                </label>

                <textarea id="major_detail" name="major_detail" rows="4" placeholder="Describe your education..."
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-4 border-t">

                <button type="button" onclick="toggleModal(false)"
                    class="px-6 py-2 rounded-lg bg-gray-100 hover:bg-gray-200">

                    Cancel

                </button>

                <button type="submit" id="saveBtn"
                    class="px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                    Save Education

                </button>

            </div>

        </form>

    </div>

</div>

<script>

    function toggleModal(show) {

        const modal = document.getElementById("educationModal");

        if (show) {

            modal.classList.remove("hidden");
            modal.classList.add("flex");

        } else {

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            $("#educationForm")[0].reset();
            $("#education_id").val("");

            $("#modalTitleEducation").text("Add New Education");
            $("#saveBtn").text("Save Education");

        }

    }

</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>