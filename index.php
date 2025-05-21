<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login - FBS</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <?php session_start(); ?>

  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
    <div class="mb-6 text-center">
      <h1 class="text-2xl font-bold text-green-600">FBS Admin Login</h1>
      <p class="text-sm text-gray-500">Sign in to your admin account</p>
    </div>

    <div id="error-message" class="text-red-500 text-sm mb-4 text-center"></div>

    <form id="login-form" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
        <div class="mt-1 relative">
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 text-sm">
          <i data-lucide="mail" class="absolute right-3 top-2.5 w-4 h-4 text-gray-400"></i>
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="mt-1 relative">
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 text-sm pr-10">
          <button type="button" onclick="togglePassword()" class="absolute right-3 top-2.5 text-gray-400">
            <i id="eyeIcon" data-lucide="eye" class="w-4 h-4"></i>
          </button>
        </div>
      </div>

      <div>
        <button type="submit"
          class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 text-sm font-semibold">
          Sign In
        </button>
      </div>
    </form>

    <div class="text-center mt-4">
      <p class="text-xs text-gray-400">© 2025 FBS Admin. All rights reserved.</p>
    </div>
  </div>

  <script>
    lucide.createIcons();

    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const icon = document.getElementById('eyeIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
      } else {
        passwordInput.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
      }

      lucide.createIcons();
    }

    // Handle form submission via fetch
    document.getElementById("login-form").addEventListener("submit", async (e) => {
      e.preventDefault();

      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const errorDiv = document.getElementById("error-message");

      if (!email || !password) {
        errorDiv.textContent = "Email and password are required.";
        return;
      }

      const formData = new FormData();
      formData.append("email", email);
      formData.append("password", password);

      try {
        const response = await fetch("index_auth.php", {
          method: "POST",
          body: formData
        });

        const data = await response.json();

        if (data.status === "success") {
          window.location.href = "dashboard.php";
        } else {
          errorDiv.textContent = data.message || "Login failed.";
        }
      } catch (error) {
        console.error("Login error:", error);
        errorDiv.textContent = "Something went wrong. Please try again.";
      }
    });
  </script>
</body>

</html>