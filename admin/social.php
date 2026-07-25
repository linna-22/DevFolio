<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Social Management</h1>

    <div class="flex flex-col sm:flex-row gap-3">

        <div class="relative">
            <input type="text"
                placeholder="Search social..."
                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none w-full md:w-64">

            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>

        <button onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">

            <i class="fas fa-plus"></i>
            Add Social

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
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Logo</th>
                    <th class="px-6 py-4">URL</th>
                    <th class="px-6 py-4">Target</th>
                    <th class="px-6 py-4 text-center">Action</th>

                </tr>

            </thead>

            <tbody id="socialTable" class="divide-y divide-gray-100 text-gray-700">

            </tbody>

        </table>

    </div>

</div>

<!-- Modal -->
<div id="socialModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl">

        <div class="p-6 border-b border-gray-100 flex justify-between items-center">

            <h2 id="modalTitle"
                class="text-xl font-bold">

                Add New Social

            </h2>

            <button onclick="toggleModal(false)"
                class="text-gray-500 hover:text-red-500">

                <i class="fas fa-times"></i>

            </button>

        </div>

        <form id="socialForm" class="p-6 space-y-5">

            <input
                type="hidden"
                id="social_id"
                name="social_id">

            <!-- Name -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Social Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="GitHub"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

            </div>

            <!-- URL -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    URL
                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    placeholder="https://github.com/username"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

            </div>

            <!-- Logo + Target -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Font Awesome Icon
                    </label>

                    <input
                        type="text"
                        id="logo"
                        name="logo"
                        placeholder="fab fa-github"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                    <p class="text-xs text-gray-500 mt-1">
                        Example: fab fa-github, fab fa-facebook, fab fa-linkedin
                    </p>

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Target
                    </label>

                    <select
                        id="target"
                        name="target"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                        <option value="_self">Same Tab</option>
                        <option value="_blank">New Tab</option>

                    </select>

                </div>

            </div>

            <div class="flex justify-end gap-3 pt-5 border-t">

                <button
                    type="button"
                    onclick="toggleModal(false)"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 hover:bg-gray-100">

                    Cancel

                </button>

                <button
                    type="submit"
                    id="saveBtn"
                    class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                    Save Social

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function toggleModal(show){

    const modal = document.getElementById("socialModal");

    if(show){

        modal.classList.remove("hidden");
        modal.classList.add("flex");

    }else{

        modal.classList.add("hidden");
        modal.classList.remove("flex");

        $("#socialForm")[0].reset();
        $("#social_id").val("");

        $("#modalTitle").text("Add New Social");
        $("#saveBtn").text("Save Social");

    }

}

</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>