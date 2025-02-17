<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <!-- Carousel Section -->
           <div class="mb-6 relative w-full overflow-hidden rounded-xl">
                <div class="carousel flex w-full h-64 rounded-lg shadow-lg relative">
                    <div class="carousel-item w-full flex-shrink-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                        <img src="https://postandporch.com/cdn/shop/articles/AdobeStock_209124760.jpg?v=1662575433" alt="Carousel Image 1" class="w-full h-full object-cover">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0 opacity-0 transition-opacity duration-1000 ease-in-out hidden">
                        <img src="https://cdn.houseplansservices.com/content/f3oo5es0q168o22dudkh98tskp/w991x660.jpg?v=2" alt="Carousel Image 2" class="w-full h-full object-cover">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0 opacity-0 transition-opacity duration-1000 ease-in-out hidden">
                        <img src="https://d3p0bla3numw14.cloudfront.net/news-content/img/2021/05/19092739/rumah-idaman-modern.jpg" alt="Carousel Image 3" class="w-full h-full object-cover">
                    </div>
                </div>
                <!-- Navigation Buttons -->
                <button id="prevBtn" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">❮</button>
                <button id="nextBtn" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">❯</button>
            </div>
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Users</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">1,245</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Active Rooms</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">245</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Bookings Today</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">78</p>
                </div>
            </div>
             
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slides = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.add("opacity-0", "hidden");
                    slide.classList.remove("opacity-100");
                    if (i === index) {
                        slide.classList.remove("hidden");
                        setTimeout(() => {
                            slide.classList.remove("opacity-0");
                            slide.classList.add("opacity-100");
                        }, 50);
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(currentIndex);
            }

            document.getElementById("nextBtn").addEventListener("click", nextSlide);
            document.getElementById("prevBtn").addEventListener("click", prevSlide);

            // Auto-slide every 3 seconds
            setInterval(nextSlide, 3000);
        });

       
    </script>
</x-app-layout>



