<?php
require_once "../includes/auth.php";
require_once "../config/db.php";

$userId = $_SESSION['user']['id'];

$stmt = $conn->prepare("
    SELECT *
    FROM users
    WHERE id = ?
");

$stmt->bind_param("i", $userId);
$stmt->execute();

$profile = $stmt->get_result()->fetch_assoc();

$user = $_SESSION['user'];

ob_start();
?>

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white shadow-lg">

        <div class="flex flex-col md:flex-row items-center gap-6">

            <!-- Avatar -->
            <div
                class="w-28 h-28 rounded-full bg-white text-indigo-600 flex items-center justify-center text-5xl font-bold shadow-lg">

                <?= strtoupper(substr($user['name'], 0, 1)); ?>

            </div>

            <div class="flex-1">

                <h1 class="text-3xl font-bold">

                    <?= htmlspecialchars($user['name']); ?>

                </h1>

                <p class="text-indigo-100 mt-2">

                    <?= htmlspecialchars($user['email']); ?>

                </p>

                <span
                    class="inline-block mt-4 px-4 py-1 rounded-full bg-white/20 text-sm font-medium">

                    <?= ucfirst($user['role']); ?>

                </span>

            </div>

            <!-- <a href="edit-profile.php"
                class="bg-white text-indigo-600 px-5 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">

                <i class="fas fa-edit mr-2"></i>

                Edit Profile

            </a> -->

        </div>

    </div>

    <!-- Personal Information -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mt-8">

        <div class="border-b px-6 py-4">

            <h2 class="text-xl font-bold text-gray-800">

                Personal Information

            </h2>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

            <div>

                <label class="text-sm text-gray-500">

                    Full Name

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= htmlspecialchars($user['name']); ?>

                </p>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Email

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= htmlspecialchars($user['email']); ?>

                </p>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Gender

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= htmlspecialchars($profile['gender'] ?? '-'); ?>

                </p>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Job Title

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= htmlspecialchars($profile['job_title'] ?? '-'); ?>

                </p>

            </div>

            <div class="md:col-span-2">

                <label class="text-sm text-gray-500">

                    Address

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= htmlspecialchars($profile['address'] ?? '-'); ?>

                </p>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Account Role

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= ucfirst($user['role']); ?>

                </p>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Member Since

                </label>

                <p class="mt-1 font-semibold text-gray-800">

                    <?= date("F d, Y", strtotime($profile['created_at'] ?? date('Y-m-d'))); ?>

                </p>

            </div>

        </div>

    </div>

</div>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>