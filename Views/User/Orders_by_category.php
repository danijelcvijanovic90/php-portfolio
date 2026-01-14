<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php require_once __DIR__ . "/../../views/partials/header.php"; ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['success_delete'])): ?>
    <div class="alert alert-success d-flex justify-content-center"><?= $_SESSION['success_delete']; ?></div>
    <?php unset($_SESSION['success_delete']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['error_delete'])): ?>
    <div class="alert alert-danger d-flex justify-content-center"><?= $_SESSION['error_delete']; ?></div>
    <?php unset($_SESSION['error_delete']); ?>
<?php endif; ?>

<body class="bg-light">

<div class="container-fluid py-4">
    <div class="row">

    
        <!-- LEFT SIDE - WEEKLY MENU -->
        <div class="col-lg-8 mb-4">
            <input type="hidden" name='user_id' value='<?=$user_id?>'>
            <h3 class="mb-4">Weekly Menu</h3>
            <?php foreach($grouped_menu as $day => $meals): ?>
                <div class="card mb-4">
                    <div class="card-header fw-bold"><?= ucfirst($day) ?></div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="w-25">Meal</th>
                                    <th class="w-50">Description</th>
                                    <th class="w-15">Category</th>
                                    <th class="w-10 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($meals as $meal): ?>
                                    <tr>
                                        <td><?= $meal['meal_name'] ?></td>
                                        <td><?= $meal['description'] ?></td>
                                        <td><?= $meal['category_name'] ?></td>
                                        <td class="text-end">
                                        <form action="orders_by_category.php" method="POST">
                                        <input type="hidden" name='menu_id' value="<?=$meal['menu_id']?>">
                                        <input type="hidden" name='meal_id' value="<?=$meal['meal_id']?>">
                                        <input type="hidden" name='category_id' value="<?=$meal['category_id']?>">
                                            <button class="btn btn-sm btn-primary">Order</button>
                                        </form>
                                        </td>
                                    </tr>                                    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        

        <!-- RIGHT SIDE - MY ORDERS -->
        <div class="col-lg-4">
            <h3 class="mb-4">My Orders</h3>
            <?php if(!empty($my_orders)): ?>
                <?php foreach($my_orders as $order): ?>
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white fw-bold"><?= ucfirst($order['day']) ?></div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <tbody>                                    
                                        <tr>
                                            <td><?=$order['name']?></td>
                                            <td><?=$order['category_name']?></td>
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
                <div class="alert alert-info">No orders yet.</div>
            <?php endif; ?>
        </div>

    </div>
</div>

 <button class='btn btn-secondary' onclick="history.back()" >Back</button>

</body>
</html>