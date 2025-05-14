<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - User Profile</title>
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
        <a href="dashboard.php" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Dashboard</span>
        </a>
        <a href="users.php" class="flex items-center space-x-2 text-green-600 font-semibold">
          <i data-lucide="users" class="w-5 h-5"></i><span>Users</span>
        </a>
        <a href="transactions.php" class="flex items-center space-x-2 text-gray-700 hover:text-green-600">
          <i data-lucide="credit-card" class="w-5 h-5"></i><span>Transactions</span>
        </a>
      </nav>
    </aside>

  
    <main class="flex-1 p-6">
     
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Profile</h2>
        <button class="flex items-center space-x-2 px-4 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
          <i data-lucide="trash-2" class="w-4 h-4"></i><span>Delete User</span>
        </button>
      </div>

      
      <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
          <div class="space-y-1">
            <h3 class="text-xl font-semibold">John Doe</h3>
            <p class="text-sm text-gray-500">john@example.com</p>
            <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
          </div>
          <div class="mt-4 md:mt-0 flex space-x-2">
            <button class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 text-sm">Suspend</button>
            <button class="px-4 py-2 bg-green-100 text-green-700 rounded hover:bg-green-200 text-sm">Verify</button>
          </div>
        </div>
      </div>

      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="font-semibold text-gray-800 mb-2">Account Details</h4>
          <p><span class="font-medium">User ID:</span> #123456</p>
          <p><span class="font-medium">Role:</span> Trader</p>
          <p><span class="font-medium">Balance:</span> $1,200.00</p>
          <p><span class="font-medium">Registered:</span> 2025-01-15</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="font-semibold text-gray-800 mb-2">Verification</h4>
          <p><span class="font-medium">Email:</span> Verified</p>
          <p><span class="font-medium">Phone:</span> Pending</p>
          <p><span class="font-medium">KYC:</span> Not Submitted</p>
        </div>
      </div>

      
      <div class="bg-white shadow rounded-lg p-6">
        <h4 class="font-semibold text-gray-800 mb-4">Recent Transactions</h4>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-gray-700">
            <thead class="text-gray-600 bg-gray-100 border-b">
              <tr>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Amount</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">Deposit</td>
                <td class="px-4 py-3 text-green-600">$500.00</td>
                <td class="px-4 py-3">2025-05-10</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Success</span>
                </td>
              </tr>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">Withdrawal</td>
                <td class="px-4 py-3 text-red-600">$200.00</td>
                <td class="px-4 py-3">2025-05-11</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();
  </script>
</body>
</html>
