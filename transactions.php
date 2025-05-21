<?php
require 'dashboard_auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - Transactions</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-6">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Transactions</h2>
        <select class="border-gray-300 text-sm rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
          <option>All</option>
          <option>Deposits</option>
          <option>Withdrawals</option>
          <option>Pending</option>
          <option>Failed</option>
        </select>
      </div>

      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-left text-sm text-gray-700">
          <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
              <th class="px-6 py-3">User</th>
              <th class="px-6 py-3">Type</th>
              <th class="px-6 py-3">Amount</th>
              <th class="px-6 py-3">Date</th>
              <th class="px-6 py-3">Status</th>
              <th class="px-6 py-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody id="transaction-body">
            <tr>
              <td colspan="6" class="px-6 py-4 text-center text-gray-400">Loading transactions...</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();

    async function loadTransactions() {
      const res = await fetch('transactions_api.php');
      const data = await res.json();
      const tbody = document.getElementById('transaction-body');
      tbody.innerHTML = '';

      if (!data.length) {
        tbody.innerHTML = `<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No transactions found.</td></tr>`;
        return;
      }

      data.forEach(tx => {
        const color = tx.status === 'Success' ? 'green'
          : tx.status === 'Pending' ? 'yellow'
            : 'red';

        const row = `
          <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-4 font-medium">${tx.user_name}</td>
            <td class="px-6 py-4">${tx.type}</td>
            <td class="px-6 py-4 text-${color}-600 font-semibold">$${parseFloat(tx.amount).toFixed(2)}</td>
            <td class="px-6 py-4">${new Date(tx.created_at).toLocaleDateString()}</td>
            <td class="px-6 py-4">
              <span class="px-2 py-1 text-xs bg-${color}-100 text-${color}-700 rounded-full">${tx.status}</span>
            </td>
            <td class="px-6 py-4 text-right">
              <button class="text-blue-600 hover:underline text-sm">
                ${tx.status === 'Failed' ? 'Retry' : 'View'}
              </button>
            </td>
          </tr>
        `;
        tbody.insertAdjacentHTML('beforeend', row);
      });
    }

    loadTransactions();
  </script>
</body>

</html>