<header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-50">
    <div class="flex items-center gap-1">
        <img src="../assets/images/devfilio-logo.png" alt="DevFolio Logo" class="w-11 h-11 object-contain">
        <div class="font-bold text-xl text-indigo-600">DevFolio<span class="text-red-500">Dashboard</span></div>
    </div>
    <div class="flex items-center gap-2">
        <!-- <button class="text-gray-500 hover:text-indigo-600"><i class="fas fa-bell"></i></button> -->
        <p class="text-indigo-600"><?php echo $_SESSION['user']['name']; ?></p>
        <!-- Profile Dropdown Container -->
        <div class="relative">
            <!-- Clickable Avatar Button -->
            <?php
            $name = trim($_SESSION['user']['name'] ?? '');

            $words = explode(' ', $name);

            $initials = strtoupper(
                substr($words[0], 0, 1) .
                (isset($words[1]) ? substr($words[1], 0, 1) : '')
            );
            ?>

            <button onclick="toggleDropdown()"
                class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">

                <?= htmlspecialchars($initials) ?>

            </button>

            <!-- Dropdown Menu (Hidden by default) -->
            <div id="profileDropdown"
                class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-lg py-1 z-50">
                <a href="<?= BASE_URL ?>/admin/profile.php"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-user-circle text-gray-400"></i> Profile
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="<?= BASE_URL ?>/actions/auth/logout.php"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                    <i class="fas fa-sign-out-alt text-red-400"></i> Logout
                </a>
            </div>
        </div>

        <script>
            function toggleDropdown() {
                const dropdown = document.getElementById('profileDropdown');
                dropdown.classList.toggle('hidden');
            }

            // Optional: Close dropdown when clicking outside of it
            window.addEventListener('click', function (e) {
                const dropdown = document.getElementById('profileDropdown');
                const button = dropdown.previousElementSibling;
                if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        </script>
    </div>
</header>