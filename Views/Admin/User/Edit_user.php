<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php require_once __DIR__ . "/../../partials/header.php" ?>

 <?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<body class="bg-light">


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit User</h5>
                </div>

                <div class="card-body">
                    <form action="update_user.php" method="POST">
                        <input type="hidden" name="id" value="<?=$user_info['id']?>">
                        <input type="hidden" name="password_update" value="<?=$user_info['password_update'] ?>">
                        

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"  name="name" class="form-control" value="<?=$user_info['name']?>">
                        </div>

                        <!-- Surname -->
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" name="surname" class="form-control" value="<?=$user_info['surname']?>">
                        </div>

                         <!-- email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$user_info['email']?>">
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?=$user_info['username']?>">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-muted">
                                Leave empty if you don't want to change password
                            </small>
                        </div>

                        <!-- Password -->

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <small class="text-muted">
                                Leave empty if you don't want to change password
                            </small>
                        </div>


                        <!-- Role -->
                        <div class="mb-4">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="user" <?= $user_info['role'] === 'user' ? 'selected': '' ?> >User</option>
                                <option value="admin" <?= $user_info['role'] === 'admin' ? 'selected': '' ?>>Admin</option> <!-- if user role is admin select this, else empty string -->
                            </select>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="get_users_and_companies.php" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>
