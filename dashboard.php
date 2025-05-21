<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
  header("Location: index.php");
  exit();
}
?>

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
    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-6">

      <div class="flex justify-between items-center mb-6">
        <div>
          <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
          <p class="text-sm text-gray-500">Welcome, <?php echo htmlspecialchars($_SESSION['admin_email']); ?></p>
        </div>
        <div class="flex items-center space-x-4">
          <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100">
            <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
          </button>
          <img src="https://via.placeholder.com/23" alt="Admin"
            class="w-10 h-10 rounded-full border-2 border-green-500">
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

      <div class="mt-8 text-right">
        <a href="logout.php" class="inline-block text-sm text-red-500 hover:underline">Logout</a>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();
  </script>
</body>

</html>