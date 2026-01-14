<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Category & My Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require_once __DIR__ . "/../../views/partials/header.php"; ?>

<?php if(!empty($_SESSION['success_delete'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success_delete']; ?></div>
    <?php unset($_SESSION['success_delete']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error_delete'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error_delete']; ?></div>
    <?php unset($_SESSION['error_delete']); ?>
<?php endif; ?>

<body class="bg-light">

<div class="container py-4">
    <div class="row justify-content-center">

        <!-- LEFT SIDE - CATEGORY SELECT -->
        <div class="col-lg-5 col-md-6 col-12 mb-4">
            <h3 class="mb-3 text-center">Choose Category</h3>
            <p class="text-center">Select breakfast for the morning shift, lunch for the mid-shift, and dinner for the afternoon shift.</p>
            <form method="GET" action="orders_by_category.php" class="border p-4 rounded shadow-sm bg-white">
                <div class="mb-3">
                    <label class="form-label fw-bold">Select category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Choose category --</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Show Menu</button>
            </form>
        </div>

        <!-- RIGHT SIDE - MY ORDERS -->
        <div class="col-lg-5 col-md-6 col-12 mb-4">
            <h3 class="mb-3 text-center">My Orders</h3>
            <div class="border p-4 rounded shadow-sm bg-white">
                <?php if(!empty($my_orders)): ?>
                    <?php foreach($my_orders as $order): ?>
                        <div class="card mb-3 border-success">
                            <div class="card-header bg-success text-white fw-bold"><?= ucfirst($order['day']) ?></div>
                            <div class="card-body p-0">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td><?= $order['name'] ?></td>
                                            <td class="text-end">
                                                <span class="badge bg-success">Ordered</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="delete_order_by_user.php" method="POST">
                                    <input type="hidden" name='order_id' value="<?=$order['id']?>">
                                    <button class='btn btn-danger float-end'>Remove</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center mb-0">No orders yet.</div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

</body>
</html>
