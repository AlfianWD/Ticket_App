<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="total-antrian" content="{{ $totalAntrian ?? 0 }}">
    <meta name="antrian-sekarang" content="{{ $antrianSekarang->nomor_antrian ?? 0 }}">
    <meta name="antrian-selanjutnya" content="{{ $antrianSelanjutnya->nomor_antrian ?? 0 }}">
    <meta name="sisa-antrian" content="{{ $sisaAntrian ?? 0 }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | Ticket_App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

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
                @auth
                  {{ auth()->user()->username }}
                @endauth
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
                  <li>
                    <form method="post" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item text-black link-underline link-underline-opacity-0">Logout</button>
                    </form>
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
            <h1 id="totalAntrian">{{ $totalAntrian }}</h1>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-check-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Antrian Sekarang</h3>
          </div>

          <div>
            <h1 id="antrianSekarang">{{ $antrianSekarang->nomor_antrian ?? '00' }}</h1>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-plus-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Antrian Selanjutnya</h3>
          </div>

          <div>
            <h1 id="antrianSelanjutnya">{{ $antrianSelanjutnya->nomor_antrian ?? '00' }}</h1>
          </div>
        </div>

        <div class="container bg-white shadow-sm rounded p-3">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-fill me-2 fs-2"></i>
            <h3 class="fs-5 mt-2">Sisa Antrian</h3>
          </div>

          <div>
            <h1 id="sisaAntrian">{{ $sisaAntrian->nomor ?? '0' }}</h1>
          </div>
        </div>
      </div>

      <div class="container-fluid mt-2">
        <div class="container-md border bg-white border-black rounded">
          <div class="container-md d-grid gap-2 d-md-block">
            <button type="button" class="shadow-md mx-auto btn btn-outline-primary mt-4 ms-2 mb-4">Refresh</button>
          </div>
          <div class="container-md bg-white shadow-sm rounded">
            <table id="tabel" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nomor antrian</th>
                      <th scope="col">Panggil</th>
                  </tr>
              </thead>
              <tbody id="tabelBody">
                @if(isset($nomor))
                  @foreach ($nomor as $nomor_antrian)
                      <tr>
                          <td>{{ $nomor_antrian->tanggal }}</td>
                          <td>{{ $nomor_antrian->nomor_antrian }}</td>
                          <td>
                            <button id="btnPanggil" type="button" class="btn btn-outline-success">
                              <span>panggil</span>
                            </button>
                          </td>
                      </tr>
                  @endforeach
                @else
                  <tr>
                    <td>Tidak ada data yang didapatkan
                  </tr>
                @endif
              </tbody>
          </table>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="mt-4 mb-5 pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//widget.time.is/id.js"></script>
    <script>
      time_is_widget.init({
          Sidoarjo_z41c: {
              template:"TIME<br>DATE", 
              date_format:"dayname, dnum monthname year"
          }
      });
    </script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  </body>
</html>