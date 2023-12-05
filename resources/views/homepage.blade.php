<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

</head>
<body>
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color: #9EC8B9;">
    <div class="container-fluid">
      <a class="navbar-brand d-inline-flex">
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="50px" height="50px" class="ms-2 mt-1 align-item-center">
        <div style="margin-left:20px;">
          <strong style="font-size:16px; display:block;">Desa Rangkah Kidul</strong>
          <span class="fs-6 text">Kabupaten Sidoarjo</span>
        </div>
      </a>
      <div class="d-inline-flex ml-auto text-end">
        <a href="https://time.is/Sidoarjo" id="time_is_link" rel="nofollow" class="text-decoration-none text-dark">
          <strong>Waktu di Sidoarjo : </strong> 
          <span class="fs-6 text" id="Sidoarjo_z41c"></span> 
        </a>
        
      </div>
    </div>
  </nav>

  <main>
    <div class="card-main">
      <div class="mx-auto shadow-sm p-1 mt-4 container-lg bg-white rounded" style="width:30%;">
        <div class="container d-inline-flex grap-5">
          <i class="bi bi-people-fill p-2" style="font-size:24px;"></i>
          <h3 class="p-2">Nomor antrian</h3>  
        </div> 
      </div>

      <div class="mx-auto shadow-sm p-5 mt-2 container-lg bg-white rounded" style="width:30%;">
        <div class="p-2 mt-2 border border-success-subtle rounded">
          <h2 class="text-center m-2">Antrian</h2>
          <h3 class="text-center" style="font-size:4rem;">....</h3>
        </div>
        <button type="button" class="mt-5 btn btn-outline-primary" style="width:100%;">Ambil antrian</button>
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
  {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
</body>
</html>