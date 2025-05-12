<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/access/library/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12 d-flex align-items-center">
            <form class="form-login w-100" action="{{ route('admin.post_login') }}" method="POST">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" name="email" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember_me" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button  type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>
        <div class="col-12 col-lg-6">
            <img src="{{ asset('/access/frontend/images/logo_1.png') }}" alt="login" class="img-fluid">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('/access/library/jquery/jquery-3.7.1.min.js') }}"></script>
</body>
</html>
