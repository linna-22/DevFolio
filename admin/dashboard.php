<?php
require_once "../includes/auth.php";
// Define the specific content for the Dashboard page
ob_start();
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview <?php echo $_SESSION['user']['name']; ?></h1>
    <p class="text-gray-500">Welcome back to your workspace.</p>
</div>

<!-- Quick Actions Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Hero Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-heading text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Hero Section</h3>
        <p class="text-sm text-gray-500 mb-4">Manage your landing page intro.</p>
        <a href="hero.php" class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Project Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-folder-open text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Projects</h3>
        <p class="text-sm text-gray-500 mb-4">Manage portfolio work items.</p>
        <a href="project.php" class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Education Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-graduation-cap text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Education</h3>
        <p class="text-sm text-gray-500 mb-4">Manage academic history.</p>
        <a href="education.php" class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Social Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-share-alt text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Social Links</h3>
        <p class="text-sm text-gray-500 mb-4">Manage your profile URLs.</p>
        <a href="social.php" class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>