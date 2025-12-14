<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Company Settings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once __DIR__ . "\..\..\Partials\Header.php" ?>
<div class="container mt-5">
  <h2>Company Settings</h2>

  <ul class="nav nav-tabs" id="companySettingsTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="add-company-tab" data-bs-toggle="tab" data-bs-target="#add-company" type="button" role="tab">Add Company</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="delete-company-tab" data-bs-toggle="tab" data-bs-target="#delete-company" type="button" role="tab">Delete Company</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="list-companies-tab" data-bs-toggle="tab" data-bs-target="#list-companies" type="button" role="tab">All Companies</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="details-company-tab" data-bs-toggle="tab" data-bs-target="#details-company" type="button" role="tab">Company Details</button>
    </li>
  </ul>

  <div class="tab-content mt-3">

    <!-- Add Company -->
    <div class="tab-pane fade show active" id="add-company" role="tabpanel">
        
      <form action="/Orderly/public/admin/company_settings.php" method="POST">
        <input type="hidden" name="add_company" value="1">

        <div class="mb-3">
          <label class="form-label">Company Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Notes</label>
          <input type="text" name="notes" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Add Company</button>
      </form>
    </div>

    <!-- Delete Company -->
    <div class="tab-pane fade" id="delete-company" role="tabpanel">
      <form action="company_delete.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Company ID to Delete</label>
          <input type="number" name="company_id" class="form-control" required>
        </div>
        <button class="btn btn-danger">Delete Company</button>
      </form>
    </div>

    <!-- All Companies -->
    <div class="tab-pane fade" id="list-companies" role="tabpanel">
      <h5>All Companies</h5>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // foreach($companies as $c){
          //   echo "<tr>
          //     <td>{$c['id']}</td>
          //     <td>{$c['name']}</td>
          //     <td>{$c['address']}</td>
          //     <td>{$c['phone']}</td>
          //   </tr>";
          // }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Company Details -->
    <div class="tab-pane fade" id="details-company" role="tabpanel">
      <form action="company_details.php" method="GET" class="mb-3">
        <div class="mb-3">
          <label class="form-label">Company Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter company name">
        </div>
        <button class="btn btn-secondary" type="submit">Search</button>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // foreach($filtered as $f){
          //   echo "<tr>
          //     <td>{$f['id']}</td>
          //     <td>{$f['name']}</td>
          //     <td>{$f['address']}</td>
          //     <td>{$f['phone']}</td>
          //   </tr>";
          // }
          ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
