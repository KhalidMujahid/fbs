<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FBS Admin - Verifications</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r hidden md:block">
      <div class="p-6">
        <h1 class="text-2xl font-bold text-green-600">FBS Admin</h1>
      </div>
      <nav class="px-4 space-y-4">
        <a href="dashboard.html" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Dashboard</span>
        </a>
        <a href="users.html" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="users" class="w-5 h-5"></i><span>Users</span>
        </a>
        <a href="transactions.html" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="credit-card" class="w-5 h-5"></i><span>Transactions</span>
        </a>
        <a href="support.html" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="life-buoy" class="w-5 h-5"></i><span>Support</span>
        </a>
        <a href="verification.html" class="flex items-center space-x-2 text-green-600 font-semibold">
          <i data-lucide="shield-check" class="w-5 h-5"></i><span>Verifications</span>
        </a>
      </nav>
    </aside>

    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Verifications</h2>
        <select class="border-gray-300 text-sm rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
          <option value="all">All</option>
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
        </select>
      </div>

      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-sm text-gray-700">
          <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
              <th class="px-6 py-3 text-left">User</th>
              <th class="px-6 py-3 text-left">Document</th>
              <th class="px-6 py-3 text-left">Submitted</th>
              <th class="px-6 py-3 text-left">Status</th>
              <th class="px-6 py-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="font-medium">john.doe@example.com</div>
                <div class="text-xs text-gray-500">John Doe</div>
              </td>
              <td class="px-6 py-4">Passport</td>
              <td class="px-6 py-4">2025-05-12</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
              </td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="text-green-600 hover:underline text-sm">Approve</button>
                <button class="text-red-600 hover:underline text-sm">Reject</button>
              </td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="font-medium">jane.smith@fxmail.com</div>
                <div class="text-xs text-gray-500">Jane Smith</div>
              </td>
              <td class="px-6 py-4">Driver’s License</td>
              <td class="px-6 py-4">2025-05-10</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Approved</span>
              </td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="text-gray-400 text-sm cursor-not-allowed" disabled>Approved</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();
  </script>

</body>
</html>
