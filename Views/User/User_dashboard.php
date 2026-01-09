<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

 <?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php require_once __DIR__ . "/../partials/header.php"; ?>

<div class="container py-5">
    <h1 class="mb-4 text-center">User Dashboard <?= "(" .$user['name']. " " . $user['surname'] .")" ?></h1>

    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

        <!-- Orders -->
        <div class="col">
            <div class="card text-center text-white bg-success h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-basket fs-1"></i>
                    <h5 class="card-title mt-3">Orders</h5>
                    <p class="card-text">
                        Order meals from today's menu
                    </p>
                    <a href="orders.php" class="btn btn-light mt-auto">
                        Open
                    </a>
                </div>
            </div>
        </div>

        <!-- My Orders -->
        <div class="col">
            <div class="card text-center text-white bg-primary h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-list-check fs-1"></i>
                    <h5 class="card-title mt-3">My Orders</h5>
                    <p class="card-text">
                        View your order history
                    </p>
                    <a href="my_orders.php" class="btn btn-light mt-auto">
                        Open
                    </a>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="col">
            <div class="card text-center text-white bg-dark h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-gear fs-1"></i>
                    <h5 class="card-title mt-3">Settings</h5>
                    <p class="card-text">
                        Update your profile information
                    </p>
                    <a href="user_settings.php" class="btn btn-light mt-auto">
                        Open
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS + Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>
