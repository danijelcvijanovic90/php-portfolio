<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About — YourCompany</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php require_once __DIR__ . "/../views/partials/header.php"; ?>
  <!-- HERO -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        
        <div class="col-lg-7">
          <h1 class="display-5 fw-bold mb-3">About <span class="text-primary">Orderly</span></h1>
          <p class="lead">
            We provide premium corporate catering services: tailored menus, reliable delivery, and 
            memorable food experiences for companies of all sizes. From meetings to full events — we deliver excellence.
          </p>
          
        </div>

        <div class="col-lg-5 text-center mt-4 mt-lg-0">
          <img src="https://via.placeholder.com/450x300?text=Catering+Image" 
               class="img-fluid rounded" alt="Catering">
        </div>

      </div>
    </div>
  </section>

  <!-- WHO WE ARE -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-bold mb-4">Who We Are</h2>
      <p class="mb-4">
        Orderly is a team of experienced chefs and coordinators focused on delivering high-quality 
        food and flawless service. We help businesses elevate their events with fresh ingredients, great taste,
        and reliable organization.
      </p>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="py-5 bg-light">
    <div class="container">
      
      <h2 class="fw-bold mb-5">What We Offer</h2>
      
      <div class="row g-4">
        
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Corporate Breakfasts</h5>
              <p class="card-text">
                Fresh and balanced options for meetings, morning events, and office gatherings.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Business Lunch & Dinners</h5>
              <p class="card-text">
                Full meals, buffets, and chef-prepared menus tailored to your company's needs.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Event Catering</h5>
              <p class="card-text">
                Complete event support: food, logistics, setup, and coordination for smooth execution.
              </p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- WHY CHOOSE US -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-bold mb-4">Why Choose Us?</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Experienced team of chefs and coordinators</li>
        <li class="list-group-item">Flexible catering packages for all company sizes</li>
        <li class="list-group-item">Fresh, premium ingredients</li>
        <li class="list-group-item">Reliable delivery and professional service</li>
        <li class="list-group-item">Simple ordering</li>
      </ul>
    </div>
  </section>

  <!-- FOOTER -->
  <?php require_once __DIR__. "/../views/partials/footer.php"; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>

</body>
</html>
