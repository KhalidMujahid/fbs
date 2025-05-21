<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/lucide@latest" defer></script>

<div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-gray-100">

  <div class="md:hidden flex items-center justify-between bg-white p-4 border-b w-full">
    <h1 class="text-xl font-bold text-green-600">FBS Admin</h1>
    <button @click="sidebarOpen = true" class="text-gray-700 focus:outline-none">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
  </div>

  <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden"
    x-transition:enter="transition ease-out duration-200" x-transition:leave="transition ease-in duration-150"></div>

  <aside
    class="fixed inset-y-0 left-0 w-64 bg-white border-r z-50 transform md:translate-x-0 md:static md:inset-0 transition-transform duration-200 ease-in-out"
    :class="{ '-translate-x-full': !sidebarOpen }">
    <div class="p-6 flex items-center justify-between md:justify-center border-b">
      <h2 class="text-2xl font-bold text-green-600">FBS Admin</h2>
      <button @click="sidebarOpen = false" class="md:hidden">
        <i data-lucide="x" class="w-5 h-5 text-gray-700"></i>
      </button>
    </div>

    <nav class="px-6 py-4">
      <ul class="space-y-4 text-sm text-gray-700">
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="users" class="w-5 h-5"></i>
          <a href="users.php">Users</a>
        </li>
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="credit-card" class="w-5 h-5"></i>
          <a href="transactions.php">Transactions</a>
        </li>
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="shield-check" class="w-5 h-5"></i>
          <a href="verification.php">Verification</a>
        </li>
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="message-square" class="w-5 h-5"></i>
          <a href="support.php">Support</a>
        </li>
        <li class="flex items-center space-x-3 hover:text-green-600">
          <i data-lucide="settings" class="w-5 h-5"></i>
          <a href="settings.php">Settings</a>
        </li>
      </ul>
    </nav>
  </aside>
</div>

<script>
  window.addEventListener('load', () => {
    lucide.createIcons();
  });
</script>