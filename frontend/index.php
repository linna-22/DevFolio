<?php
// frontend/index.php
$pageTitle = "DevFolio — Build Your Professional Portfolio";
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Public Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand Logo & Name -->
            <div class="flex items-center gap-3">
                <img src="../assets/images/devfilio-logo.png" alt="DevFolio Logo" class="w-12 h-12 object-contain">
                <div class="font-bold text-xl text-indigo-600 tracking-tight">DEV<span class="text-gray-500">FOLIO</span></div>
            </div>

            <!-- Navigation Links & Auth Actions -->
            <div class="flex items-center gap-6">
                <a href="#features"
                    class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition hidden sm:inline-block">Features</a>
                <a href="#work"
                    class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition hidden sm:inline-block">Showcase</a>

                <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                    <a href="login.php"
                        class="text-sm font-semibold text-gray-700 hover:text-indigo-600 transition px-4 py-2">Sign
                        In</a>
                    <a href="register.php"
                        class="text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 transition px-5 py-2.5 rounded-xl shadow-sm shadow-indigo-100">Get
                        Started</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-24 md:py-32 bg-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
            <span
                class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600 mb-8 border border-indigo-100/50 shadow-sm">
                <i class="fas fa-sparkles"></i> The Ultimate Developer Portfolio Builder
            </span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-gray-900 max-w-3xl mx-auto leading-[1.15]">
                Showcase your code. <span class="text-indigo-600">Build your career.</span>
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Create a high-impact, minimalist portfolio and manage your projects with an enterprise-grade admin
                dashboard in minutes.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="register.php"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl transition shadow-lg shadow-indigo-200">
                    Create Your Portfolio Free
                </a>
                <a href="#features"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-gray-700 hover:bg-gray-50 border border-gray-200 rounded-xl transition">
                    Explore Examples
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white relative border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span
                    class="text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3.5 py-1.5 rounded-full border border-indigo-100/50 shadow-sm">
                    Engineered for Performance
                </span>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-4">
                    Everything you need to stand out in tech
                </h2>
                <p class="mt-4 text-gray-500 text-lg">
                    Stop wasting hours configuring custom templates from scratch. Get a production-ready portfolio and
                    powerful control center instantly.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Feature Card 1 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-indigo-100 group-hover:scale-110 transition">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lightning Fast Setup</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Deploy a fully responsive portfolio and secure admin panel in seconds. No complicated build
                        steps or framework configurations required.
                    </p>
                </div>

                <!-- Feature Card 2 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-emerald-100 group-hover:scale-110 transition">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Modular Architecture</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Easily add, edit, or remove project showcases and dynamic data entries using a clean,
                        component-driven administration interface.
                    </p>
                </div>

                <!-- Feature Card 3 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-purple-100 group-hover:scale-110 transition">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Minimalist High-Fashion UI</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Crafted with a clean aesthetic featuring Plus Jakarta Sans typography, refined grid systems, and
                        smooth interactive carousels.
                    </p>
                </div>

                <!-- Feature Card 4 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-amber-500 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-amber-100 group-hover:scale-110 transition">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure Admin Control</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Manage your personal projects safely behind cookie-based authentication middleware with dynamic
                        active state tracking.
                    </p>
                </div>

                <!-- Feature Card 5 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-500 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-blue-100 group-hover:scale-110 transition">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Fully Responsive Grid</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Optimized down to every pixel. Your portfolio looks breathtaking whether viewed on ultra-wide
                        desktop monitors or mobile phones.
                    </p>
                </div>

                <!-- Feature Card 6 -->
                <div
                    class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="w-14 h-14 rounded-2xl bg-rose-500 text-white flex items-center justify-center text-xl mb-6 shadow-md shadow-rose-100 group-hover:scale-110 transition">
                        <i class="fas fa-code-branch"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Developer-First Workflow</h3>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Built natively with clean PHP structure, output buffering (`ob_start`), and standard Tailwind
                        classes that are easy to customize.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Selected Work / Projects Carousel Section -->
    <section id="work" class="py-24 border-y border-gray-100 overflow-hidden bg-gray-50/50">
        <div class="max-w-6xl mx-auto px-6">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Selected Work</h2>
                    <p class="mt-4 text-gray-500 max-w-xl">A curated preview of design systems and web apps built using
                        our platform.</p>
                </div>

                <!-- Carousel Navigation Arrows -->
                <div class="flex items-center gap-3">
                    <button onclick="scrollCarousel('left')"
                        class="w-12 h-12 rounded-full border border-gray-200 bg-white flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button onclick="scrollCarousel('right')"
                        class="w-12 h-12 rounded-full border border-gray-200 bg-white flex items-center justify-center text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm cursor-pointer">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Carousel Track Container -->
            <div id="projectCarousel"
                class="flex gap-8 overflow-x-auto scroll-smooth no-scrollbar pb-6 -mx-6 px-6 snap-x snap-mandatory">

                <!-- Project Card 1 -->
                <div class="w-full sm:w-[calc(50%-1rem)] min-w-[85%] sm:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                    <div class="bg-gray-100 rounded-3xl overflow-hidden aspect-video relative mb-5 border border-gray-200/60 transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-1">
                        <img src="https://i.pinimg.com/vwebp/1200x/4d/d5/18/4dd518e71ee140902c824cfab614fc44.webp" alt="E-Commerce Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">
                                E-Commerce Architecture</h3>
                            <p class="text-sm text-gray-500 mt-1">Full-stack web app development</p>
                        </div>
                        <span class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-indigo-600 group-hover:text-white transition"><i
                                class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div class="w-full sm:w-[calc(50%-1rem)] min-w-[85%] sm:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                    <div class="bg-gray-100 rounded-3xl overflow-hidden aspect-video relative mb-5 border border-gray-200/60 transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-1">
                        <img src="https://i.pinimg.com/vwebp/1200x/ec/bf/99/ecbf999bdb58a840be252aa58311291a.webp" alt="Admin UI & Analytics" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Admin UI
                                & Analytics</h3>
                            <p class="text-sm text-gray-500 mt-1">Dashboard design & component engineering</p>
                        </div>
                        <span class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-indigo-600 group-hover:text-white transition"><i
                                class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </div>

                <!-- Project Card 3 -->
                <div class="w-full sm:w-[calc(50%-1rem)] min-w-[85%] sm:min-w-[calc(50%-1rem)] snap-start group cursor-pointer flex-shrink-0">
                    <div class="bg-gray-100 rounded-3xl overflow-hidden aspect-video relative mb-5 border border-gray-200/60 transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-1">
                       <img src="https://i.pinimg.com/vwebp/1200x/89/b0/b2/89b0b28e633ce9a02ea091bc42603218.webp" alt="Admin UI & Analytics" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Mobile
                                Typography App</h3>
                            <p class="text-sm text-gray-500 mt-1">Android font installation tutorial tool</p>
                        </div>
                        <span class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-indigo-600 group-hover:text-white transition"><i
                                class="fas fa-arrow-right text-xs"></i></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-12 border-t border-gray-100">
        <div
            class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-6 text-sm text-gray-500">
            <div class="flex items-center gap-3">
                <img src="../assets/images/devfilio-logo.png" alt="DevFolio Logo" class="w-6 h-6 object-contain">
                <span>&copy; 2026 DevFolio Dashboard. All rights reserved.</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="login.php" class="hover:text-indigo-600 transition">Sign In</a>
                <a href="register.php" class="hover:text-indigo-600 transition">Register</a>
            </div>
        </div>
    </footer>

    <!-- Carousel Script -->
    <script>
        function scrollCarousel(direction) {
            const carousel = document.getElementById('projectCarousel');
            const scrollAmount = carousel.clientWidth / 2;
            if (direction === 'left') {
                carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }
    </script>
</body>

</html>