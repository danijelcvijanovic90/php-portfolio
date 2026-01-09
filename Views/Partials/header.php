<?php 

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Services\Session_service;

$session = new Session_service();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyProject</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/orderly/public/index.php">Orderly</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">

        
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/contact.php">Contact</a>
        </li>

        <?php if(isset($_SESSION['logedin_admin'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/admin/admin_dashboard.php">Settings</a>
        </li>
        <?php endif; ?>

        <?php if(isset($_SESSION['logedin_user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/user/user_dashboard.php">User settings</a>
        </li>
        <?php endif; ?>

        <?php if (!isset($_SESSION['logedin_admin']) && !isset($_SESSION['logedin_user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php  else: ?>
        <li class="nav-item">
          <a class="nav-link" href="/orderly/public/logout.php">Logout</a>
        </li>
        <?php endif; ?>

        
      </ul>
    </div>
  </div>
</nav>
