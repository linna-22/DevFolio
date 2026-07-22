<?php
ob_start();
?>

<!-- 1. Hero Section -->
<section id="hero" class="max-w-6xl mx-auto px-6 pt-20 pb-32 flex flex-col justify-center min-h-[80vh]">
    <div class="max-w-3xl">
        <span class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-semibold uppercase tracking-wider rounded-full mb-6">
            <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span> Available for freelance projects
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 tracking-tight leading-none mb-8">
            Building digital experiences that matter.
        </h1>
        <p class="text-lg md:text-xl text-gray-500 font-normal leading-relaxed mb-10 max-w-2xl">
            I am a software developer specializing in modern web ecosystems. I craft clean, well-architected applications with high visual polish.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#project" class="bg-gray-900 hover:bg-gray-800 text-white font-medium px-8 py-4 rounded-xl transition shadow-md">
                View My Work
            </a>
            <a href="#about" class="bg-white hover:bg-gray-50 text-gray-700 font-medium px-8 py-4 rounded-xl border border-gray-200 transition">
                Read My Story
            </a>
        </div>
    </div>
</section>

<!-- 2. About Me Section -->
<section id="about" class="py-24 bg-white relative border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Column: Visual/Card representation -->
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl opacity-10 blur-xl"></div>
                <div class="relative bg-gray-50 border border-gray-200/60 p-8 rounded-3xl shadow-sm">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-2xl font-bold shadow-md shadow-indigo-100">
                            <i class="fas fa-code"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Software Developer</h3>
                            <p class="text-sm text-indigo-600 font-medium">Web & Mobile Environments</p>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-sm mb-6">
                        Passionate about clean architecture, high-performance web systems, and building intuitive user interfaces. Focused on modern full-stack workflows using robust frameworks and minimal high-fashion design guidelines.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">PHP / Laravel</span>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">Tailwind CSS</span>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">JavaScript</span>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">Git Workflow</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Text Details -->
            <div>
                <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3.5 py-1.5 rounded-full border border-indigo-100/50 shadow-sm">
                    About Me
                </span>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-4 mb-6">
                    Dedicated to crafting clean, scalable digital experiences
                </h2>
                <p class="text-gray-500 text-lg mb-6 leading-relaxed">
                    I specialize in bridging the gap between sophisticated back-end infrastructure and clean, minimalist user experiences. Whether developing custom e-commerce web applications or fine-tuning database schemas, performance and elegance are at the core of every project.
                </p>
                <div class="grid grid-cols-2 gap-6 pt-4 border-t border-gray-100">
                    <div>
                        <span class="block text-3xl font-extrabold text-indigo-600 mb-1">2+</span>
                        <span class="text-sm text-gray-500 font-medium">Years Experience</span>
                    </div>
                    <div>
                        <span class="block text-3xl font-extrabold text-indigo-600 mb-1">15+</span>
                        <span class="text-sm text-gray-500 font-medium">Completed Projects</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Selected Work / Projects Carousel Section -->
<section id="project" class="bg-white py-24 border-y border-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-6">
        
        <!-- Section Header with Carousel Navigation Arrows -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Selected Work</h2>
                <p class="mt-4 text-gray-500 max-w-xl">A curated selection of design systems and web applications built from scratch.</p>
            </div>
            
            <!-- Left / Right Arrow Buttons -->
            <div class="flex items-center gap-3">
                <button onclick="scrollCarousel('left')" class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button onclick="scrollCarousel('right')" class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Carousel Track Container -->
        <div id="projectCarousel" class="flex gap-8 overflow-x-auto scroll-smooth no-scrollbar pb-4 -mx-6 px-6 snap-x snap-mandatory">
            
            <!-- Project Card 1 -->
            <div class="min-w-[85%] md:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                <div class="bg-gray-100 rounded-2xl overflow-hidden aspect-video relative mb-6 border border-gray-100 transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center p-8">
                        <i class="fas fa-shopping-bag text-white text-5xl opacity-40"></i>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">E-Commerce Architecture</h3>
                        <p class="text-sm text-gray-500 mt-1">Full-stack web app development</p>
                    </div>
                    <span class="text-gray-400 group-hover:text-gray-900 transition"><i class="fas fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="min-w-[85%] md:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                <div class="bg-gray-100 rounded-2xl overflow-hidden aspect-video relative mb-6 border border-gray-100 transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center p-8">
                        <i class="fas fa-chart-pie text-white text-5xl opacity-40"></i>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Admin UI & Analytics</h3>
                        <p class="text-sm text-gray-500 mt-1">Dashboard design & component engineering</p>
                    </div>
                    <span class="text-gray-400 group-hover:text-gray-900 transition"><i class="fas fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- Project Card 3 -->
            <div class="min-w-[85%] md:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                <div class="bg-gray-100 rounded-2xl overflow-hidden aspect-video relative mb-6 border border-gray-100 transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center p-8">
                        <i class="fas fa-mobile-alt text-white text-5xl opacity-40"></i>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Mobile Typography App</h3>
                        <p class="text-sm text-gray-500 mt-1">Android font installation tutorial tool</p>
                    </div>
                    <span class="text-gray-400 group-hover:text-gray-900 transition"><i class="fas fa-arrow-right"></i></span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4. Education & Experience Section -->
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

        <!-- Education Timeline / Grid -->
        <div class="max-w-3xl mx-auto space-y-6">
            <!-- Education Item 1 -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm transition hover:shadow-md">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-lg">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">B.S. in Computer Science</h3>
                            <p class="text-sm text-indigo-600 font-medium">University of Technology</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 self-start sm:self-auto">
                        2020 – 2024
                    </span>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Focused on software engineering principles, advanced database management systems, full-stack web architecture, and secure algorithm implementation.
                </p>
            </div>

            <!-- Education Item 2 -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm transition hover:shadow-md">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Advanced Web & Mobile Engineering</h3>
                            <p class="text-sm text-emerald-600 font-medium">Professional Certification Track</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 self-start sm:self-auto">
                        2024 – Present
                    </span>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Specialized training focusing on modern enterprise frameworks like Laravel, tailwind utility systems, authentication middleware protocols, and cross-platform deployment standards.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Contact CTA Section -->
<section id="contact" class="max-w-4xl mx-auto px-6 py-28 text-center">
    <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight mb-6">Let's build something exceptional together.</h2>
    <p class="text-gray-500 text-lg mb-10 max-w-xl mx-auto">
        Have a new project or an interesting idea in mind? Drop me a message and let's discuss details.
    </p>
    <a href="mailto:hello@example.com" class="inline-flex items-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-4 rounded-xl transition shadow-md">
        <i class="fas fa-envelope"></i> Write an Email
    </a>
</section>

<!-- Carousel Script -->
<script>
    function scrollCarousel(direction) {
        const carousel = document.getElementById('projectCarousel');
        const scrollAmount = carousel.clientWidth * 0.75; // Scroll by 75% of view width
        
        if (direction === 'left') {
            carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }
</script>

<?php
$frontend_content = ob_get_clean();
include '../layout/frontend-layout/app.php';
?>