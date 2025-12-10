

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orderly - Homepage</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require_once __DIR__ . "/../views/partials/header.php"; ?>

<!-- HERO SECTION -->
<section class="hero d-flex align-items-center flex-column">
  <h1 class="display-4 fw-bold">Welcome to Orderly</h1>
  <p class="lead ">Discover our most popular products and enjoy!</p>
  <a href="#popular-products" class="btn btn-warning btn-lg mt-3 center">See Products</a>
</section>

<!-- POPULAR PRODUCTS -->
<section id="popular-products" class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4 text-center">Most Popular Products</h2>
    <div class="row g-4">
      <!-- Kartice proizvoda -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100">
          <img src="https://picsum.photos/300/200?random=1" class="card-img-top" alt="Product 1">
          <div class="card-body">
            <h5 class="card-title">Product 1</h5>
            <p class="card-text">$12.99</p>
            <a href="#" class="btn btn-warning w-100">Order Now</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100">
          <img src="https://picsum.photos/300/200?random=2" class="card-img-top" alt="Product 2">
          <div class="card-body">
            <h5 class="card-title">Product 2</h5>
            <p class="card-text">$9.99</p>
            <a href="#" class="btn btn-warning w-100">Order Now</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100">
          <img src="https://picsum.photos/300/200?random=3" class="card-img-top" alt="Product 3">
          <div class="card-body">
            <h5 class="card-title">Product 3</h5>
            <p class="card-text">$15.50</p>
            <a href="#" class="btn btn-warning w-100">Order Now</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100">
          <img src="https://picsum.photos/300/200?random=4" class="card-img-top" alt="Product 4">
          <div class="card-body">
            <h5 class="card-title">Product 4</h5>
            <p class="card-text">$8.75</p>
            <a href="#" class="btn btn-warning w-100">Order Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- IMAGE GALLERY -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Our Gallery</h2>
    <div class="row g-4">
      <div class="col-md-4"><img src="https://picsum.photos/400/300?random=5" class="img-fluid rounded" alt="Gallery 1"></div>
      <div class="col-md-4"><img src="https://picsum.photos/400/300?random=6" class="img-fluid rounded" alt="Gallery 2"></div>
      <div class="col-md-4"><img src="https://picsum.photos/400/300?random=7" class="img-fluid rounded" alt="Gallery 3"></div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
