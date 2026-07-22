<?php
require_once "../includes/auth.php";
ob_start();
?>

<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <h1 class="text-2xl font-bold text-gray-800">User Management</h1>

    <div class="flex flex-col sm:flex-row gap-3">
        <!-- Search Box -->
        <div class="relative">
            <input type="text" placeholder="Search users..."
                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none w-full md:w-64">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>

        <!-- Add User Button -->
        <button onclick="toggleModal(true)"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 transition">
            <i class="fas fa-plus"></i> Add User
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
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Gender</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Job Title</th>
                    <th class="px-6 py-4">Address</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="userTable" class="divide-y divide-gray-100 text-gray-700">

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
<div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Add New User</h2>
            <button onclick="toggleModal(false)" class="text-gray-400 hover:text-gray-600"><i
                    class="fas fa-times"></i></button>
        </div>

        <form id="userForm" class="p-6 space-y-4">
            <input type="hidden" id="user_id" name="id">
            <!-- Reuse your form fields here -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="full_name" id="full_name"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <select name="gender" id="gender"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div id="passwordSection">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div id="roleSection" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>

                    <select name="role" id="role"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">

                        <option value="admin">Admin</option>
                        <option value="user">User</option>

                    </select>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                    <input type="text" name="job_title" id="job_title"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" id="address"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>

            </div>
            <!-- Add remaining fields: Email, Password, Job, Address -->

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="toggleModal(false)"
                    class="px-6 py-2 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" id="saveBtn" class="bg-indigo-600 text-white px-4 py-2 rounded">
                    Add User
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {

        const modal = document.getElementById("userModal");

        if (show) {

            modal.classList.remove("hidden");
            modal.classList.add("flex");
            if ($("#user_id").val() !== "") {
                $("#passwordSection").hide();
                $("#roleSection").show();
            } else {
                $("#passwordSection").show();
                $("#roleSection").hide();
            }

        } else {

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            // Reset form
            $("#userForm")[0].reset();
            $("#user_id").val("");
            $("#modalTitle").text("Add New User");

            $("#saveBtn").text("Save User");

        }


    }
</script>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>