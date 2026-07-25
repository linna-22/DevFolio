<?php
require_once "../includes/auth.php";
require_once "../config/app.php";
// Define the specific content for the Dashboard page
ob_start();
?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview <span class="text-blue-700"><?php echo $_SESSION['user']['name']; ?></span></h1>
    <p class="text-gray-500">Welcome back to your workspace.</p>
</div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">
                🌐 Your Portfolio
            </h2>

            <p class="text-gray-500 mb-4">
                Share your personal portfolio with anyone using the link below.
            </p>

            <div class="flex items-center gap-2 bg-gray-100 rounded-lg px-4 py-3 w-fit">
                <i class="fas fa-link text-indigo-600"></i>

                <input
                    id="portfolioLink"
                    type="text"
                    readonly
                    value="http://localhost<?= BASE_URL ?>/portfolio/?username=<?= $_SESSION['user']['username']; ?>"
                    class="bg-transparent outline-none text-gray-700 w-96"
                >
            </div>
        </div>

        <div class="flex gap-3">

            <a
                href="<?= BASE_URL ?>/portfolio/?username=<?= $_SESSION['user']['username']; ?>"
                target="_blank"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg font-semibold flex items-center gap-2 transition"
            >
                <i class="fas fa-eye"></i>
                View Portfolio
            </a>

            <button
                id="copyPortfolio"
                class="border border-gray-300 hover:bg-gray-100 px-5 py-3 rounded-lg font-semibold flex items-center gap-2 transition"
            >
                <i class="fas fa-copy"></i>
                Copy Link
            </button>

        </div>

    </div>
</div>
<!-- Quick Actions Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Hero Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-heading text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Hero Section</h3>
        <p class="text-sm text-gray-500 mb-4">Manage your landing page intro.</p>
        <a href="hero.php"
            class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    <!-- About Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-user text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">About</h3>
        <p class="text-sm text-gray-500 mb-4">Manage your personal information.</p>
        <a href="about.php"
            class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Project Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-folder-open text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Projects</h3>
        <p class="text-sm text-gray-500 mb-4">Manage portfolio work items.</p>
        <a href="project.php"
            class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Education Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-graduation-cap text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Education</h3>
        <p class="text-sm text-gray-500 mb-4">Manage academic history.</p>
        <a href="education.php"
            class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Social Card -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <i class="fas fa-share-alt text-indigo-600 text-2xl mb-4"></i>
        <h3 class="font-bold text-gray-800">Social Links</h3>
        <p class="text-sm text-gray-500 mb-4">Manage your profile URLs.</p>
        <a href="social.php"
            class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
            Go to <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    <!-- User Card -->
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
            <i class="fas fa-users text-indigo-600 text-2xl mb-4"></i>
            <h3 class="font-bold text-gray-800">Users</h3>
            <p class="text-sm text-gray-500 mb-4">Manage system user accounts.</p>
            <a href="user.php"
                class="text-indigo-600 font-semibold text-sm flex items-center gap-2 hover:gap-3 transition-all">
                Go to <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php endif; ?>
    <script>
            document.getElementById("copyPortfolio").addEventListener("click", function () {

                    const input = document.getElementById("portfolioLink");

                    navigator.clipboard.writeText(input.value);

                Swal.fire({
                    icon: "success",
                    title: "Copied!",
                    text: "Portfolio link copied successfully.",
                    timer: 1500,
                    showConfirmButton: false
            });

        });
    </script>
</div>

<?php
$content = ob_get_clean();
include '../layout/admin-master-layout/app.php';
?>