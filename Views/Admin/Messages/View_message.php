<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Messages</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body class="bg-light">

<?php require_once __DIR__ . "/../../Partials/header.php"; ?>

<main class="container mt-5">
  <h2 class="mb-4 text-center">Messages</h2>

  <?php if (!empty($messages)): ?>
    <?php foreach ($messages as $msg): ?>
      <div class="card mb-3">
        <div class="card-header">
          <strong><?=$msg['subject']?></strong>
          <span class="text-muted float-end"><?=$msg['date']?></span>
        </div>
        <div class="card-body">
          <p><strong>Name:</strong> <?=$msg['name']?></p>
          <p><strong>Email:</strong> <?=$msg['email']?></p>
          <p><strong>Phone:</strong> <?=$msg['phone']?></p>
          <p><?=$msg['message']?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="alert alert-info text-center">
      No messages to display.
    </div>
  <?php endif; ?>

  <div class="d-flex justify-content-end mt-3 gap-1">
    <a onclick="window.history.back();" class="btn btn-sm btn-primary">Back</a>

  </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
