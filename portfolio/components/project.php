<?php
require_once __DIR__ . "/../../config/app.php";
?>
<section id="project" class="bg-white py-24 border-y border-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Selected Work
                </h2>

                <p class="mt-4 text-gray-500 max-w-xl">
                    A curated selection of design systems and web applications built from scratch.
                </p>
            </div>

            <!-- Navigation -->
            <div class="flex items-center gap-3">
                <button onclick="scrollCarousel('left')"
                    class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                    <i class="fas fa-arrow-left"></i>
                </button>

                <button onclick="scrollCarousel('right')"
                    class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Carousel -->
        <div id="projectCarousel"
            class="flex gap-8 overflow-x-auto scroll-smooth no-scrollbar pb-4 -mx-6 px-6 snap-x snap-mandatory">

            <?php if ($projects && $projects->num_rows > 0): ?>

                <?php while ($project = $projects->fetch_assoc()): ?>

                    <div class="min-w-[85%] md:min-w-[calc(50%-1rem)] snap-start group flex-shrink-0">

                        <a href="<?= htmlspecialchars($project['url']) ?>" target="<?= htmlspecialchars($project['target']) ?>"
                            class="block">

                            <!-- Image -->
                            <div
                                class="relative h-64 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 shadow-sm transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-xl">

                                <?php if (!empty($project['image'])): ?>

                                    <img src="<?= BASE_URL . '/public/uploads/projects/' . htmlspecialchars($project['image']) ?>"
                                        alt="<?= htmlspecialchars($project['title']) ?>"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                <?php else: ?>

                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600">
                                        <i class="fas fa-image text-5xl text-white opacity-40"></i>
                                    </div>

                                <?php endif; ?>

                            </div>

                            <!-- Content -->
                            <div class="mt-6 flex items-center justify-between">

                                <div class="flex-1">

                                    <h3 class="text-lg font-bold text-gray-900 transition group-hover:text-indigo-600">
                                        <?= htmlspecialchars($project['title']) ?>
                                    </h3>

                                    <p class="mt-2 line-clamp-2 text-sm text-gray-500">
                                        <?= htmlspecialchars($project['desc']) ?>
                                    </p>

                                </div>

                                <span
                                    class="ml-4 flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-400 transition group-hover:border-indigo-200 group-hover:text-indigo-600">
                                    <i class="fas fa-arrow-right"></i>
                                </span>

                            </div>

                        </a>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <div class="w-full text-center py-20">
                    <p class="text-gray-500">
                        No projects available.
                    </p>
                </div>

            <?php endif; ?>

        </div>

    </div>
</section>