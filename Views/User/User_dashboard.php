<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

<?php require_once __DIR__ . "/../partials/header.php"; ?>

    <div class="container py-5">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Companies -->
        <div class="col">
            <div class="card text-center text-white bg-primary h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-building fs-1"></i>
                    <h5 class="card-title mt-3">Companies</h5>
                    <p class="card-text">View all companies</p>
                    <a href="companies.php" class="btn btn-light mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="col">
            <div class="card text-center text-white bg-success h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-basket fs-1"></i>
                    <h5 class="card-title mt-3">Orders</h5>
                    <p class="card-text">View all orders</p>
                    <a href="orders.php" class="btn btn-light mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col">
            <div class="card text-center text-white bg-warning h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-people fs-1"></i>
                    <h5 class="card-title mt-3">Users</h5>
                    <p class="card-text">Manage users</p>
                    <a href="users.php" class="btn btn-light mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Reports -->
        <div class="col">
            <div class="card text-center text-white bg-danger h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <i class="bi bi-bar-chart fs-1"></i>
                    <h5 class="card-title mt-3">Reports</h5>
                    <p class="card-text">View statistics</p>
                    <a href="reports.php" class="btn btn-light mt-auto">Open</a>
                </div>
            </div>
        </div>
    </div>
</div>

    

    <!-- Bootstrap 5 JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
