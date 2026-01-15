<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once __DIR__ . "/../../partials/header.php"; ?>

<div class="container mt-4">

    <h2 class="mb-4">Orders Overview</h2>

    <!-- FILTERS -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-end">

                <!-- COMPANY SELECT -->
                <div class="col-md-3">
                    <label class="form-label">Company</label>
                    <select name="company_id" class="form-select">
                        <option value="0">All companies</option>
                        <?php foreach ($companies as $company): ?>
                            <option value="<?= $company['id']; ?>">
                                <?=($company['name']);?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- DAY SELECT -->
                <div class="col-md-3">
                    <label class="form-label">Day</label>
                    <select name="day" class="form-select">
                        <option value="0">All days</option>
                        <?php foreach ($days as $day):?>
                            <option value="<?=$day['id'];?>">
                                <?=ucfirst($day['day']);?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- CATEGORY SELECT -->

                <div class="col-md-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id" class="form-select">
                        <option value="0">All categories</option>
                        <?php foreach ($categories as $category):?>
                            <option value="<?= $category['id'];?>">
                                <?=ucfirst($category['name']);?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- SUBMIT -->
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Filter Orders
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- RESULTS -->
    <?php if(!empty($orders_by_day)):?>
        <?php foreach($orders_by_day as $day => $meals):?>

            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <strong>Day:</strong> <?=ucfirst($day);?>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Meal</th>
                                <th class="text-center">Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($meals as $meal): ?>
                                <tr>
                                    <td><?=($meal['meal_name']);?></td>
                                    <td class="text-center">
                                        <strong><?=$meal['total_qty'];?></strong>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">
            No orders found for selected filters.
        </div>
    <?php endif; ?>

</div>

</body>
</html>
