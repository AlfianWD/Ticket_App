<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Ticket_App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link  rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

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
          <div class="container-fluid  d-flex flex-row-reverse">
            <li class="nav nav-item dropdown">
              <a class="nav-link dropdown-toggle text-black align-item-center mt-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                .....
              </a>
              <ul class="dropdown-menu-end dropdown-menu">
                <div class="">
                  <li>
                    <a href="https://time.is/Sidoarjo" id="time_is_link" rel="nofollow" class="dropdown-item text-decoration-none text-dark">
                      <strong>Waktu di Sidoarjo : </strong> 
                      <span class="fs-6 text" id="Sidoarjo_z41c"></span> 
                    </a>
                  </li>   
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="login.html" class="dropdown-item text-black link-underline link-underline-opacity-0">Logout</a></li>
                </div>
              </ul>
            </li>
            <i class="bi bi-person-circle align-item-center ms-2 me-1 fs-2"></i>
          </div>
        </div>
    </nav>
    
    <main>
      <div class="container-fluid d-flex flex-lg-row flex-column p-5 gap-5 justify-content-center">
        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-people-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Jumlah Antrian</h3>
          </div>

          <div>
            <span>Hallo World</span>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-check-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Antrian Sekarang</h3>
          </div>

          <div>
            <span>Hallo World</span>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-plus-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Antrian Selanjutnya</h3>
          </div>

          <div>
            <span>Hallo World</span>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Sisa Antrian</h3>
          </div>

          <div>
            <span>Hallo World</span>
          </div>
        </div>
      </div>

      <div class="container-fluid mt-2">
        <div class="container bg-white shadow-sm rounded">
          <table id="tabel" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Nomor antrian</th>
                <th scope="col">Panggil</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
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
    <script scr="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>