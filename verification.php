<?php
include 'dashboard_auth.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['id'])) {
  $id = intval($_POST['id']);
  $status = $_POST['action'] === 'approve' ? 'approved' : 'rejected';
  mysqli_query($conn, "UPDATE verifications SET status='$status' WHERE id=$id");
  header("Location: verification.php");
  exit;
}

$status_filter = $_GET['status'] ?? 'all';
$where = $status_filter !== 'all' ? "WHERE v.status = '$status_filter'" : "";

$query = "SELECT v.*, u.email, u.name FROM verifications v 
          JOIN users u ON v.user_id = u.id 
          $where 
          ORDER BY v.submitted_at DESC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - Verifications</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <?php include 'sidebar.php'; ?>
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Verifications</h2>
        <form method="GET">
          <select name="status" onchange="this.form.submit()"
            class="border-gray-300 text-sm rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            <option value="all" <?= $status_filter === 'all' ? 'selected' : '' ?>>All</option>
            <option value="pending" <?= $status_filter === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="approved" <?= $status_filter === 'approved' ? 'selected' : '' ?>>Approved</option>
            <option value="rejected" <?= $status_filter === 'rejected' ? 'selected' : '' ?>>Rejected</option>
          </select>
        </form>
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
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">
                  <div class="font-medium"><?= htmlspecialchars($row['email']) ?></div>
                  <div class="text-xs text-gray-500"><?= htmlspecialchars($row['name']) ?></div>
                </td>
                <td class="px-6 py-4"><?= htmlspecialchars($row['document_type']) ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($row['submitted_at']) ?></td>
                <td class="px-6 py-4">
                  <?php
                  $statusColor = [
                    'pending' => 'yellow',
                    'approved' => 'green',
                    'rejected' => 'red'
                  ];
                  $color = $statusColor[$row['status']] ?? 'gray';
                  ?>
                  <span class="px-2 py-1 text-xs bg-<?= $color ?>-100 text-<?= $color ?>-700 rounded-full">
                    <?= ucfirst($row['status']) ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                  <?php if ($row['status'] === 'pending'): ?>
                    <form method="POST" class="inline">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button name="action" value="approve" class="text-green-600 hover:underline text-sm">Approve</button>
                    </form>
                    <form method="POST" class="inline">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button name="action" value="reject" class="text-red-600 hover:underline text-sm">Reject</button>
                    </form>
                  <?php else: ?>
                    <button class="text-gray-400 text-sm cursor-not-allowed"
                      disabled><?= ucfirst($row['status']) ?></button>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
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