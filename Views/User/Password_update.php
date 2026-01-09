<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3 class="mb-0">Change Password</h3>

                    <h5>Before first use please change password</h5>
                    <p>Password must be at least 8 characters long.</p>
                    <p>Password must not contain spaces.</p>
                    <p>Password and Confirm New Password needs to match.</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="password_update.php">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control border border-primary" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control border border-primary" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary d-flex">
                                Update Password
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
