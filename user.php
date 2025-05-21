<?php
include 'dashboard_auth.php';
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("User ID is required and must be numeric.");
}

$user_id = intval($_GET['id']);

// Fetch the user
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
if (!$user_query || mysqli_num_rows($user_query) === 0) {
  die("User not found.");
}

$user = mysqli_fetch_assoc($user_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['balance']) && is_numeric($_POST['balance'])) {
    $new_balance = floatval($_POST['balance']);
    $formatted_balance = number_format($new_balance, 2, '.', '');

    $update_query = "UPDATE users SET balance = $formatted_balance WHERE id = $user_id";
    $update = mysqli_query($conn, $update_query);

    if ($update) {
      $user['balance'] = $formatted_balance;
      echo "<script>alert('Balance updated successfully.'); window.location.href = window.location.href;</script>";
      exit;
    } else {
      echo "<script>alert('Failed to update balance.');</script>";
    }
  } else {
    echo "<script>alert('Please enter a valid numeric balance.');</script>";
  }
}
?>

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
    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Profile</h2>
        <a href="delete_user.php?id=<?= $user['id'] ?>"
          class="flex items-center space-x-2 px-4 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
          <i data-lucide="trash-2" class="w-4 h-4"></i><span>Delete User</span>
        </a>
      </div>

      <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
          <div class="space-y-1">
            <h3 class="text-xl font-semibold"><?= htmlspecialchars($user['name']) ?></h3>
            <p class="text-sm text-gray-500"><?= htmlspecialchars($user['email']) ?></p>
            <span
              class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full"><?= ucfirst($user['status']) ?></span>
          </div>
          <div class="mt-4 md:mt-0 flex space-x-2">
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="font-semibold text-gray-800 mb-2">Account Details</h4>
          <p><span class="font-medium">User ID:</span> #<?= $user['id'] ?></p>
          <p><span class="font-medium">Role:</span> <?= htmlspecialchars($user['role']) ?></p>
          <p><span class="font-medium">Registered:</span> <?= htmlspecialchars($user['created_at']) ?></p>

          <form method="POST" class="mt-4">
            <label for="balance" class="block font-medium mb-1">Balance ($):</label>
            <input type="number" step="0.01" name="balance" value="<?= htmlspecialchars($user['balance']) ?>"
              class="w-full px-3 py-2 border rounded mb-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update
              Balance</button>
          </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <h4 class="font-semibold text-gray-800 mb-2">Verification</h4>
          <p><span class="font-medium">Email:</span> <?= ucfirst($user['email_verified'] ?? 'pending') ?></p>
          <p><span class="font-medium">Phone:</span> <?= ucfirst($user['phone_verified'] ?? 'pending') ?></p>
          <p><span class="font-medium">KYC:</span> <?= ucfirst($user['kyc_status'] ?? 'not submitted') ?></p>
        </div>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();
  </script>
</body>

</html>