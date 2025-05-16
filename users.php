<?php
include 'dashboard_auth.php';
include 'db.php';
?>

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
    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Users</h2>
        <input type="text" placeholder="Search users..."
          class="px-4 py-2 w-64 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-green-500" />
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
            <?php
            $query = "SELECT * FROM users ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $statusColor = [
                  'active' => 'green',
                  'pending' => 'yellow',
                  'suspended' => 'red'
                ][$row['status']] ?? 'gray';

                echo '<tr class="border-b hover:bg-gray-50">';
                echo '<td class="px-6 py-4 font-medium">' . htmlspecialchars($row['name']) . '</td>';
                echo '<td class="px-6 py-4">' . htmlspecialchars($row['email']) . '</td>';
                echo '<td class="px-6 py-4"><span class="px-2 py-1 text-xs bg-' . $statusColor . '-100 text-' . $statusColor . '-700 rounded-full">'
                  . ucfirst($row['status']) . '</span></td>';
                echo '<td class="px-6 py-4">' . htmlspecialchars($row['role']) . '</td>';
                echo '<td class="px-6 py-4 text-right space-x-2">';


                echo '<a href="user.php?id=' . $row['id'] . '" class="text-blue-600 hover:underline text-sm">View</a>';


                if ($row['status'] == 'suspended') {
                  echo '<a href="update_status.php?id=' . $row['id'] . '&action=reactivate" class="text-green-600 hover:underline text-sm">Reactivate</a>';
                } else {
                  echo '<a href="update_status.php?id=' . $row['id'] . '&action=suspend" class="text-red-600 hover:underline text-sm">Suspend</a>';
                }

                echo '</td></tr>';
              }
            } else {
              echo '<tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td></tr>';
            }
            ?>

          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>lucide.createIcons();</script>
</body>

</html>