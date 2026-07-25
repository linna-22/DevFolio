<footer class="bg-white border-t border-gray-100 py-12 mt-20">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">

        <p class="text-sm text-gray-500">
            &copy; <?= date('Y') ?> <?= htmlspecialchars($owner['fullname']) ?>. All rights reserved.
        </p>

        <div class="flex items-center gap-6 text-gray-400 text-lg">

            <?php if ($socials && $socials->num_rows > 0): ?>

                <?php while ($social = $socials->fetch_assoc()): ?>

                    <a
                        href="<?= htmlspecialchars($social['url']) ?>"
                        target="<?= htmlspecialchars($social['target']) ?>"
                        title="<?= htmlspecialchars($social['name']) ?>"
                        class="hover:text-indigo-600 transition duration-300">

                        <i class="<?= htmlspecialchars($social['logo']) ?>"></i>

                    </a>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>
</footer>