<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashbord/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashbord/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashbord/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dashbord/images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="{{ asset('dashbord/images/shopabda.png') }}" alt="logo">
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="pt-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Nom d'utilisateur</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-account-outline text-primary"></i>
                </span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Nom d'utilisateur">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Mot de passe</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-lock-outline text-primary"></i>
                </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Mot de passe">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="remember">
                                        Rester connecté
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CONNEXION</button>
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Vous n'avez pas de compte? <a href="{{route('register')}}" class="text-primary">Créer</a>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2024  All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('dashbord/vendors/base/vendor.bundle.base.js') }}"></script>

<!-- endinject -->
<!-- inject:js -->
<script src="{{asset('dashbord/js/off-canvas.js')}}"></script>
<script src="{{asset('dashbord/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('dashbord/js/template.js')}}"></script>
<!-- endinject -->
</body>

</html>
