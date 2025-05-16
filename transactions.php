<?php
require "dashboard_auth.php";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->query("SELECT * FROM transactions ORDER BY created_at DESC");
  $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($transactions);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - Transactions</title>
  <script src="https://unpkg.com/lucide@latest"></script>
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
          <tbody>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();

    async function loadTransactions() {
      const res = await fetch('transactions.php');
      const data = await res.json();

      const tbody = document.querySelector('tbody');
      tbody.innerHTML = "";

      data.forEach(tx => {
        const color = tx.status === 'Success' ? 'green' :
          tx.status === 'Pending' ? 'yellow' : 'red';

        tbody.innerHTML += `
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium">${tx.user_name}</td>
          <td class="px-6 py-4">${tx.type}</td>
          <td class="px-6 py-4 text-${color}-600 font-semibold">$${tx.amount}</td>
          <td class="px-6 py-4">${tx.created_at.split(' ')[0]}</td>
          <td class="px-6 py-4">
            <span class="px-2 py-1 text-xs bg-${color}-100 text-${color}-700 rounded-full">${tx.status}</span>
          </td>
          <td class="px-6 py-4 text-right">
            <button class="text-blue-600 hover:underline text-sm">${tx.status === 'Failed' ? 'Retry' : 'View'}</button>
          </td>
        </tr>
      `;
      });
    }

    loadTransactions();
  </script>
</body>

</html>