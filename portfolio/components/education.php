<section id="education" class="py-24 bg-gray-50/50 relative border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3.5 py-1.5 rounded-full border border-indigo-100/50 shadow-sm">
                Academic Background
            </span>

            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-4">
                Education & Credentials
            </h2>

            <p class="mt-4 text-gray-500 text-lg">
                A continuous journey of technical learning and professional development in software systems.
            </p>
        </div>

        <!-- Education List -->
        <div class="max-w-3xl mx-auto space-y-6">

            <?php if ($educations && $educations->num_rows > 0): ?>

                <?php while ($education = $educations->fetch_assoc()): ?>

                    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm transition hover:shadow-md">

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">

                            <div class="flex items-center gap-3">

                                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-lg">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>

                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">
                                        <?= htmlspecialchars($education['school_name']) ?>
                                    </h3>

                                    <p class="text-sm text-indigo-600 font-medium">
                                        <?= htmlspecialchars($education['major']) ?>
                                    </p>
                                </div>

                            </div>

                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 self-start sm:self-auto">
                                <?= htmlspecialchars($education['start_year']) ?>
                                -
                                <?= !empty($education['end_year']) ? htmlspecialchars($education['end_year']) : 'Present'; ?>
                            </span>

                        </div>

                        <p class="text-gray-500 text-sm leading-relaxed">
                            <?= nl2br(htmlspecialchars($education['major_detail'])) ?>
                        </p>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <div class="text-center py-10">
                    <p class="text-gray-500">
                        No education records found.
                    </p>
                </div>

            <?php endif; ?>

        </div>

    </div>
</section>