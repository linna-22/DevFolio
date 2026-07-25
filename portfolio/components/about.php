<section id="about" class="py-24 bg-white relative border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- Left Column -->
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl opacity-10 blur-xl"></div>

                <div class="relative bg-gray-50 border border-gray-200/60 p-8 rounded-3xl shadow-sm">

                    <div class="flex items-center gap-4 mb-6">

                        <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-2xl font-bold shadow-md shadow-indigo-100">
                            <i class="fas fa-code"></i>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-gray-900">
                                <?= htmlspecialchars($about['position'] ?? ''); ?>
                            </h3>

                            <p class="text-sm text-indigo-600 font-medium">
                                <?= htmlspecialchars($about['position_desc'] ?? ''); ?>
                            </p>
                        </div>

                    </div>

                    

                    <div class="flex flex-wrap gap-2">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">
                            PHP / Laravel
                        </span>

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">
                            Tailwind CSS
                        </span>

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">
                            JavaScript
                        </span>

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">
                            Git Workflow
                        </span>

                    </div>

                </div>

            </div>

            <!-- Right Column -->

            <div>

                <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3.5 py-1.5 rounded-full border border-indigo-100/50 shadow-sm">
                    About Me
                </span>

                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-4 mb-6">
                    <?= htmlspecialchars($about['aboutme_title'] ?? 'Dedicated to crafting clean, scalable digital experiences'); ?>
                </h2>

                <p class="text-gray-500 text-lg mb-6 leading-relaxed">
                    <?= nl2br(htmlspecialchars($about['description'] ?? '')); ?>
                </p>

                <div class="grid grid-cols-2 gap-6 pt-4 border-t border-gray-100">

                    <div>

                        <span class="block text-3xl font-extrabold text-indigo-600 mb-1">
                            <?= htmlspecialchars($about['experience'] ?? '0+'); ?>
                        </span>

                        <span class="text-sm text-gray-500 font-medium">
                            Years Experience
                        </span>

                    </div>

                    <div>

                        <span class="block text-3xl font-extrabold text-indigo-600 mb-1">
                            <?= htmlspecialchars($about['completed_projects'] ?? '0+'); ?>
                        </span>

                        <span class="text-sm text-gray-500 font-medium">
                            Completed Projects
                        </span>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>