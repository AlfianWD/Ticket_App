<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

</head>
<body>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid m-2">
                        <div class="navbar-brand d-flex text-black">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="50px" height="50px" class="ms-2 mt-1 align-item-center">
                            <div class="mt-2" style="margin-left: 20px;">
                                <strong style="font-size: 16px; display: block;">Desa Rangkah Kidul</strong>
                                <span class="fs-6 text">Kabupaten Sidoarjo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="d-grip">
                            <button type="submit" class="mt-2 btn btn-outline-primary" style="width:100%;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-sm text-center mt-5">
          <span class="text-muted ">©copyright {{ date('Y')}} - Desa Rangkah Kidul. All rights reserved.</span> 
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
