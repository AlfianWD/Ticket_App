<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>
<body class="bg-body-tertiary">
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand">LOGO KANTOR DESA</a>
    </div>
  </nav>

  <main>
    <div class="card-main">
      <div class="mx-auto shadow-sm p-1 mt-5 container-lg bg-white rounded" style="width:30%;">
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
    <div class="container text-center mt-5">
      <span class="text-muted ">© {{ date('Y') }} - Ticket-Queqe. All rights reserved.</span> 
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>