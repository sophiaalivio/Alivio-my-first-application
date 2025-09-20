<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Website</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="text-2xl font-extrabold text-blue-600">MyWebsite</div>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
          <a href="/" class="hover:text-blue-600 transition {{ request()->is('/') ? 'text-blue-600 font-bold' : '' }}">Home</a>
          <a href="/jobs" class="hover:text-blue-600 transition {{ request()->is('jobs') ? 'text-blue-600 font-bold' : '' }}">Jobs</a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Nav -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-md">
      <nav class="flex flex-col px-4 py-3 space-y-2 text-gray-700 font-medium">
        <a href="/" class="hover:text-blue-600 transition {{ request()->is('/') ? 'text-blue-600 font-bold' : '' }}">Home</a>
        <a href="/jobs" class="hover:text-blue-600 transition {{ request()->is('jobs') ? 'text-blue-600 font-bold' : '' }}">Jobs</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-50 to-blue-100">
    <div class="max-w-7xl mx-auto px-4 py-24 text-center">
      <h1 class="text-4xl sm:text-6xl font-extrabold text-gray-800 mb-6 leading-tight">
        {{ $heading }}
      </h1>
      <p class="text-lg sm:text-xl text-gray-600 mb-10">
        {{ $slot }}
      </p>
     
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t mt-20">
    <div class="max-w-7xl mx-auto px-4 py-8 text-center text-sm text-gray-500">
      &copy; 2025 MyWebsite. All rights reserved.
    </div>
  </footer>

  <!-- Script for Mobile Menu -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
