<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Laravel App</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="./">MyApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./even">Even Numbers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./prime">Prime Numbers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./multable">Multiplication Table</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="card text-center shadow-lg p-4">
      <h1 class="card-title mb-3">Welcome to Home Page</h1>
      <p class="card-text text-muted">Explore even numbers, prime numbers, and multiplication tables with ease!</p>
    </div>
  </div>

</body>
</html>