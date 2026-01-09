<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - User Settings</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once __DIR__ . "\..\..\Partials\Header.php" ?>

 <?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="container mt-5">
  <h2>User Settings</h2>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="userSettingsTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="add-user-tab" data-bs-toggle="tab" data-bs-target="#add-user" type="button" role="tab">Add User</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="list-users-tab" data-bs-toggle="tab" data-bs-target="#list-users" type="button" role="tab">All Users</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="company-users-tab" data-bs-toggle="tab" data-bs-target="#company-users" type="button" role="tab">Users by Company</button>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content mt-3 ">

    <!-- Add User -->
    <div class="tab-pane fade show active " id="add-user" role="tabpanel">
      <input type="hidden" name="add_user">
      <form action="../admin/add_user.php" method="POST">
        <input type="hidden" name="add_user">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="surname" class="form-label">Surname</label>
          <input type="text" name="surname" id="surname" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" >
        </div>
        
        <div class="mb-3">
          <select name="company" id="company" class="form-select">
            <?php foreach($companies as $c): ?>
            <option value="<?=$c['id']?>"> <?=$c['name']?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" id="role" class="form-select">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary ">Add User</button>
      </form>
       
    </div>

    

    <!-- All Users -->
    <div class="tab-pane fade" id="list-users" role="tabpanel">
      <h5>All Users</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Company</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td><?=$user['id']?></td>
              <td><?=$user['name']?></td>
              <td><?=$user['surname']?></td>
              <td><?=$user['username']?></td>
              <td><?=$user['email']?></td>
              <td><?=$user['company_name'] ?></td>
              <td><?=$user['role']?></td>

              <td>
                <a href="edit_user_redirect.php?id=<?=$user['id']?>" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="delete_user.php" method='POST'>
                  <input type="hidden" name="id" value="<?= $user['id'] ?>">
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>  
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Users by Company -->
    <div class="tab-pane fade" id="company-users" role="tabpanel">
      <form action="../admin/user_company_view.php" method="GET" class="mb-3">
        <div class="mb-3">
          <select name="company_id" id="company_id" class="form-select">
            <?php foreach($companies as $c): ?>
            <option value="<?=$c['id']?>"> <?=$c['name']?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-secondary">Filter</button>
      </form>

      
 
    </div>
    <a href="admin_dashboard.php" class="btn btn-secondary mt-5">Back</a>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
