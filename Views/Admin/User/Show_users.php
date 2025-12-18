<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users by Company</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once __DIR__ . "/../../Partials/header.php"; ?>
<div class="container mt-5">
  <h2>Users in Company</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Company</th>
        <th>Email</th>
        <th>Role</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($user_company)): ?>
        <?php foreach ($user_company as $user): ?>
          <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['surname'] ?></td>
            <td><?= $user['username'] ?></td> 
            <td><?= $user['company_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><a href="/orderly/public/admin/delete_user.php?id=<?=$user['id']?>" onclick="return confirm('Are you sure?');" class="btn btn-primary">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center">No users found for this company</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <button class="btn btn-secondary" onclick="window.history.back();"> Back </button>
</div>
</body>
</html>
