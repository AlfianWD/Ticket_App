<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resi | Ticket Booth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand d-inline-flex">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="50px" height="50px" class="ms-2 mt-1 align-item-center">
            <div style="margin-left:20px;">
              <strong style="font-size:16px; display:block;">Desa Rangkah Kidul</strong>
              <span class="fs-6 text">Kabupaten Sidoarjo</span>
            </div>
          </a>
    
        
          <div class="d-flex">
            <li class="nav nav-item dropdown me-2">
              <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Time
              </a>
              <ul class="dropdown-menu-end dropdown-menu">
                <div class="dropdown-item">
                  <a href="https://time.is/Sidoarjo" id="time_is_link" rel="nofollow" class="text-decoration-none text-dark">
                    <strong>Waktu di Sidoarjo : </strong> 
                    <span class="fs-6 text" id="Sidoarjo_z41c"></span> 
                  </a>
                </div>
              </ul>
            </li>
            <a class="btn btn-outline-info shadow-sm text-black me-4 link-underline link-underline-opacity-0 rounded-pill" href="login.html">
              Login
            </a>
          </div>
        </div>
      </nav>

      <main>
        <div class="container-fluid">
            <div class="container shadow-sm mt-4 bg-white rounded">
              <div class="container-sm d-inline-flex grap-5">
                <i class="bi bi-people-fill p-1 fs-3"></i>
                <h3 class="p-2">Nomor Antrian</h3>  
              </div> 
            </div>
    
            <div class="mx-auto shadow-sm p-5 mt-2 container bg-white rounded">
              <div class="container-lg p-2 border rounded-4">
                <h2 class="text-center">Antrian Anda</h2>
                <h3 id="nomorAntrian" class="text-center mt-4" style="font-size:4rem;">00</h3>
              </div>
            </div>
        </div>
      </main>

      <footer>
        <div class="container-sm text-center mt-5">
          <span class="text-muted ">©copyright {{ date('Y')}} - Desa Rangkah Kidul. All rights reserved.</span> 
        </div>
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
      <script src="//widget.time.is/id.js"></script>
      <script>
        time_is_widget.init({
            Sidoarjo_z41c: {
                template:"TIME<br>DATE", 
                date_format:"dayname, dnum monthname year"
            }
        });
      </script>
      <script src="{{ asset('assets/js/resi.js') }}"></script>
</body>
</html>