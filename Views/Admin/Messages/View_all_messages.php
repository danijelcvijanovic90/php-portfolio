<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Contact poruke</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>

<body class="bg-light">

<?php require_once __DIR__ . "/../../Partials/header.php"; ?>
      <!-- CONTENT -->
      <main class="col-md-10 p-4">

        <h2 class="mb-4 d-flex justify-content-center">Contact messages</h2>

        <div class="card">
          <div class="card-body d-flex flex-column">

            <table class="table table-striped table-hover align-middle">
              <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach($messages as $msg): ?>
                <tr>
                    <td><?=$msg['name']?></td>
                    <td><?=$msg['email']?></td>
                    <td><?=$msg['phone']?></td>
                    <td><?=$msg['subject']?></td>
                    <td><?=$msg['date']?></td>
                  <td>
                    <a href="view_single_message.php?id=<?=$msg['id']?>" class="btn btn-sm btn-primary">
                      View
                    </a>
                    <a href="delete_message.php?id=<?=$msg['id']?>" onclick="return confirm('Are you sure you want to delete this message?');"  class="btn btn-sm btn-primary">
                      Delete
                    </a>
                  </td>  
                </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-sm btn-secondary" onclick="window.history.back();">
             Back
            </button>
            </div>

          </div>
        </div>

      </main>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>

</body>
</html>
