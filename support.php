<?php
require "dashboard_auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FBS Admin - Support</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-6">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Support Tickets</h2>
        <select id="statusFilter"
          class="border-gray-300 text-sm rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
          <option value="">All</option>
          <option value="Open">Open</option>
          <option value="Resolved">Resolved</option>
        </select>
      </div>

      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-sm text-gray-700">
          <thead class="bg-gray-100 border-b text-gray-600">
            <tr>
              <th class="px-6 py-3">User</th>
              <th class="px-6 py-3">Subject</th>
              <th class="px-6 py-3">Date</th>
              <th class="px-6 py-3">Status</th>
              <th class="px-6 py-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody id="ticketTableBody">
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    lucide.createIcons();

    async function loadSupportTickets(status = "") {
      const res = await fetch('support_api.php' + (status ? `?status=${status}` : ''));
      const tickets = await res.json();
      const tbody = document.getElementById('ticketTableBody');
      tbody.innerHTML = "";

      tickets.forEach(ticket => {
        const statusColor = ticket.status === 'Open' ? 'yellow' : 'green';

        tbody.innerHTML += `
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium">${ticket.user_email}</td>
          <td class="px-6 py-4">${ticket.subject}</td>
          <td class="px-6 py-4">${ticket.created_at.split(' ')[0]}</td>
          <td class="px-6 py-4">
            <span class="px-2 py-1 text-xs bg-${statusColor}-100 text-${statusColor}-700 rounded-full">${ticket.status}</span>
          </td>
          <td class="px-6 py-4 text-right space-x-2">
            <button class="text-blue-600 hover:underline text-sm">View</button>
            ${ticket.status === 'Open'
            ? `<button class="text-green-600 hover:underline text-sm" onclick="resolveTicket(${ticket.id})">Resolve</button>`
            : `<button class="text-red-600 hover:underline text-sm" onclick="deleteTicket(${ticket.id})">Delete</button>`}
          </td>
        </tr>
        `;
      });
    }

    async function resolveTicket(id) {
      await fetch(`resolve.php?id=${id}`, { method: 'POST' });
      loadSupportTickets();
    }

    async function deleteTicket(id) {
      await fetch(`delete.php?id=${id}`, { method: 'POST' });
      loadSupportTickets();
    }

    document.getElementById('statusFilter').addEventListener('change', (e) => {
      loadSupportTickets(e.target.value);
    });

    loadSupportTickets();
  </script>
</body>

</html>