<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin Dashboard</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <aside class="w-64 bg-white border-r hidden md:block">
      <div class="p-6">
        <h1 class="text-2xl font-bold text-green-600">FBS Admin</h1>
      </div>
      <nav class="px-4">
        <ul class="space-y-4">
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            <a href="#">Dashboard</a>
          </li>
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="users" class="w-5 h-5"></i>
            <a href="#">Users</a>
          </li>
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="credit-card" class="w-5 h-5"></i>
            <a href="#">Transactions</a>
          </li>
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="shield-check" class="w-5 h-5"></i>
            <a href="#">Verification</a>
          </li>
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="message-square" class="w-5 h-5"></i>
            <a href="#">Support</a>
          </li>
          <li class="flex items-center space-x-3 text-gray-700 hover:text-green-600">
            <i data-lucide="settings" class="w-5 h-5"></i>
            <a href="#">Settings</a>
          </li>
        </ul>
      </nav>
    </aside>

    
    <main class="flex-1 p-6">
     
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
        <div class="flex items-center space-x-4">
          <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100">
            <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
          </button>
          <img src="#" alt="Admin" class="w-10 h-10 rounded-full border-2 border-green-500">
        </div>
      </div>

      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-md">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Total Users</p>
              <h3 class="text-2xl font-bold text-gray-800">12,345</h3>
            </div>
            <i data-lucide="users" class="w-6 h-6 text-green-500"></i>
          </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow hover:shadow-md">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Total Deposits</p>
              <h3 class="text-2xl font-bold text-gray-800">$85,120</h3>
            </div>
            <i data-lucide="dollar-sign" class="w-6 h-6 text-green-500"></i>
          </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow hover:shadow-md">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Pending Verifications</p>
              <h3 class="text-2xl font-bold text-gray-800">35</h3>
            </div>
            <i data-lucide="shield-alert" class="w-6 h-6 text-yellow-500"></i>
          </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow hover:shadow-md">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Support Tickets</p>
              <h3 class="text-2xl font-bold text-gray-800">7</h3>
            </div>
            <i data-lucide="life-buoy" class="w-6 h-6 text-red-500"></i>
          </div>
        </div>
      </div>


      <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="text-lg font-semibold mb-4">Recent Transactions</h4>
          <ul class="space-y-3 text-sm text-gray-700">
            <li class="flex justify-between border-b pb-2">
              <span>John Doe</span>
              <span class="text-green-600">+ $500</span>
            </li>
            <li class="flex justify-between border-b pb-2">
              <span>Jane Smith</span>
              <span class="text-red-600">- $200</span>
            </li>
            <li class="flex justify-between">
              <span>Mike Ross</span>
              <span class="text-green-600">+ $750</span>
            </li>
          </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="text-lg font-semibold mb-4">Verification Requests</h4>
          <ul class="space-y-3 text-sm text-gray-700">
            <li class="flex justify-between border-b pb-2">
              <span>Anna Grey</span>
              <span class="text-yellow-500">Pending</span>
            </li>
            <li class="flex justify-between border-b pb-2">
              <span>Tom Hank</span>
              <span class="text-green-500">Approved</span>
            </li>
            <li class="flex justify-between">
              <span>Chris Rock</span>
              <span class="text-yellow-500">Pending</span>
            </li>
          </ul>
        </div>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();
  </script>
</body>
</html>
