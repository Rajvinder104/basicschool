<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <base href="{{ asset('admin') }}/">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index2.html" class="h1"><b>Forgot Password</b></a>
            </div>
            <div class="card-body">
                @include('message')
                <form action="{{ route('forgot.password') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Continue</button>
                        </div>

                    </div>
                </form>
                <br>
                <p class="mb-1">
                    <a href="{{ route('login') }}">Back to login</a>
                </p>
            </div>

        </div>

    </div>


    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>
</body>

</html>
