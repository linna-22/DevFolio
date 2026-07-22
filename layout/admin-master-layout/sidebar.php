<?php
// Get the current filename (e.g., 'user.php')
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="w-64 bg-white shadow-sm hidden md:block">
    <nav class="p-4 space-y-2">
        <!-- Define a helper function or logic for active state -->
        <?php
        function isActive($page, $current)
        {
            return ($page === $current)
                ? 'bg-indigo-50 text-indigo-600'
                : 'text-gray-600 hover:bg-gray-50';
        }
        ?>

        <a href="../admin/index.php"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition <?php echo isActive('index.php', $current_page); ?>">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="../admin/hero.php"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition <?php echo isActive('hero.php', $current_page); ?>">
            <i class="fas fa-chart-line"></i> Hero
        </a>
        <a href="../admin/project.php"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition <?php echo isActive('project.php', $current_page); ?>">
            <i class="fas fa-folder"></i> Project
        </a>
        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="<?= BASE_URL ?>/admin/user.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition <?= isActive('user.php', $current_page); ?>">
                <i class="fas fa-users"></i> Users
            </a>
        <?php endif; ?>
    </nav>
</aside>