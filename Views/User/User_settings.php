<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User — YourCompany</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php require_once __DIR__ . "/../../views/partials/header.php"; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <h2 class="mb-4 text-center">Edit Your Profile</h2>

            
            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form action="update_user.php" method="POST" class="p-4 border rounded bg-white">
                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=$user['name']?>" required>
                    <input type="hidden" name="id" value='<?=$user_id?>'>
                    <input type="hidden" name='role' value='<?=$user['role']?>'>
                    <input type="hidden" name='password_update' value='<?=$user['password_update']?>'>
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?=$user['surname']?>" required>
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Email</label>
                    <input type="email" class="form-control" id="surname" name="email" value="<?=($user['email']) ?? ''?>" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?=$user['username']?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Leave blank to keep current password">
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
