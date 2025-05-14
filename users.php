<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - Users</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">

    <aside class="w-64 bg-white border-r hidden md:block">
      <div class="p-6">
        <h1 class="text-2xl font-bold text-green-600">FBS Admin</h1>
      </div>
      <nav class="px-4 space-y-4">
        <a href="index.php" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Dashboard</span>
        </a>
        <a href="/users.php" class="flex items-center space-x-2 text-green-600 font-semibold">
          <i data-lucide="users" class="w-5 h-5"></i><span>Users</span>
        </a>
        <a href="/transactions.php" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="credit-card" class="w-5 h-5"></i><span>Transactions</span>
        </a>
        <a href="/verification.php" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="shield-check" class="w-5 h-5"></i><span>Verification</span>
        </a>
      </nav>
    </aside>

    
    <main class="flex-1 p-6">
     
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Users</h2>
        <input
          type="text"
          placeholder="Search users..."
          class="px-4 py-2 w-64 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-green-500"
        />
      </div>

      
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-left text-sm text-gray-700">
          <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
              <th class="px-6 py-3">Name</th>
              <th class="px-6 py-3">Email</th>
              <th class="px-6 py-3">Status</th>
              <th class="px-6 py-3">Role</th>
              <th class="px-6 py-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">John Doe</td>
              <td class="px-6 py-4">john@example.com</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
              </td>
              <td class="px-6 py-4">Trader</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="text-blue-600 hover:underline text-sm">View</button>
                <button class="text-red-600 hover:underline text-sm">Suspend</button>
              </td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">Jane Smith</td>
              <td class="px-6 py-4">jane@example.com</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
              </td>
              <td class="px-6 py-4">Investor</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="text-blue-600 hover:underline text-sm">View</button>
                <button class="text-red-600 hover:underline text-sm">Suspend</button>
              </td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">Mike Ross</td>
              <td class="px-6 py-4">mike@example.com</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Suspended</span>
              </td>
              <td class="px-6 py-4">Trader</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="text-blue-600 hover:underline text-sm">View</button>
                <button class="text-green-600 hover:underline text-sm">Reactivate</button>
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
