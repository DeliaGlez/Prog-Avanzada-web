<?php
session_start(); 

if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">

    <div class="col-md-2 bg-dark text-white d-flex flex-column vh-100 position-sticky sticky-top">
        <h4 class="p-3">Sidebar</h4>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-white active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Customers</a>
          </li>
        </ul>

        <div class="mt-auto p-3">
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="AuthController.php" method="POST">
                  <input type="hidden" name="accion" value="logout">
                  <button class="dropdown-item" type="submit">Sign out</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <div class="col-md-10 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <form class="d-flex ms-auto" action="AuthController.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <div class="dropdown ps-3">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow dropdown-menu-end"
                    aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li>
                      <form action="AuthController.php" method="POST">
                        <input type="hidden" name="accion" value="logout">
                        <button class="dropdown-item" type="submit">Sign out</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </nav>

        <div class="container mt-4">
          <h2>Productos</h2>
          <div class="row">

            <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <div class="row">

                  <div id="carouselExampleIndicators" class="carousel slide col-12 col-md-3">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/1f/e3/4b/82/la-mama-triple-carne.jpg"
                          class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/1f/e3/4b/82/la-mama-triple-carne.jpg"
                          class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/1f/e3/4b/82/la-mama-triple-carne.jpg"
                          class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

                  <div class="col-9">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>

                </div>

                <div class="row">
                  <div class="col'12">
                    <caption>
                      Tabla
                      <hr>
                    </caption>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>




              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>