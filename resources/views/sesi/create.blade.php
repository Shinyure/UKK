@extends('layouts.register')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Admin Baru</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Form Pendaftaran Admin -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                                    </div>
                                    <form class="user" action="{{ route('register.submit')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="name" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password" required>
                                            <i class="fas fa-eye" id="togglePassword" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; margin-right: 20px;"></i>
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <input type="password" class="form-control form-control-user" id="password_confirmation"
                                                name="password_confirmation" placeholder="Konfirmasi Password" required>
                                            <i class="fas fa-eye" id="togglePasswordConfirmation" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; margin-right: 20px;"></i>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('/sesi/login') }}">Have Account? Login Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        // Toggle password visibility for both password fields
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
        const passwordConfirmation = document.querySelector('#password_confirmation');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        togglePasswordConfirmation.addEventListener('click', function () {
            const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmation.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
