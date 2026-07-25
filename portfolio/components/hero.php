<section id="hero" class="max-w-6xl mx-auto px-6 pt-20 pb-32 flex flex-col justify-center min-h-[80vh]">

    <div class="max-w-3xl">

        <?php
        $status = strtolower(trim($hero['freelance_status'] ?? ''));
        $isAvailable = ($status === 'yes');
        ?>

        <span class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold uppercase tracking-wider rounded-full mb-6
    <?= $isAvailable ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' ?>">

            <span class="w-2 h-2 rounded-full animate-pulse
        <?= $isAvailable ? 'bg-emerald-500' : 'bg-red-500' ?>">
            </span>

            <?= $isAvailable
                ? 'Available for freelance projects'
                : 'Currently unavailable for freelance work'; ?>

        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 tracking-tight leading-none mb-8">

            <?= htmlspecialchars($hero['title'] ?? 'Building digital experiences that matter.'); ?>

        </h1>

        <p class="text-lg md:text-xl text-gray-500 font-normal leading-relaxed mb-10 max-w-2xl">

            <?= nl2br(htmlspecialchars($hero['desc'] ?? 'I am a software developer specializing in modern web ecosystems. I craft clean, well-architected applications with high visual polish.')); ?>

        </p>

        <div class="flex flex-wrap gap-4">

            <a href="#project"
                class="bg-gray-900 hover:bg-gray-800 text-white font-medium px-8 py-4 rounded-xl transition shadow-md">

                View My Work

            </a>

            <a href="#about"
                class="bg-white hover:bg-gray-50 text-gray-700 font-medium px-8 py-4 rounded-xl border border-gray-200 transition">

                Read My Story

            </a>

        </div>

    </div>

</section>