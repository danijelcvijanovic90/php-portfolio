<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact — YourCompany</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . "/../views/partials/header.php"; ?>

  <section class="py-5 bg-light">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-6">

          <h1 class="fw-bold mb-4 text-center">Contact Us</h1>
          <p class="text-center mb-4">
            Have a question, need a quote, or want to schedule catering?  
            Send us a message and we’ll get back to you shortly.
          </p>

          <form action="send.php" method="POST" class="p-4 border rounded bg-white">

            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number (optional)</label>
              <input type="text" class="form-control" id="phone" name="phone">
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Message</button>
          </form>

        </div>
      </div>

    </div>
  </section>

  <?php require_once __DIR__. "/../views/partials/footer.php"; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
