<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Produit </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('dashbord/images/shopabda.png')}}" rel="icon">
    <link href="{{asset("dashbord/images/shopabda.png")}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{asset('css_desc/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css_desc/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css_desc/lineicons.css')}}" />
    <link rel="stylesheet" href="{{asset('css_desc/ud-styles.css')}}" />

    <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('frontend/assets/css/main.css')}}" rel="stylesheet">



    <style>
        .index-page .header {
            --background-color: rgb(33 39 40);
            --heading-color: #ffffff;
            --nav-color: rgba(255, 255, 255, 0.515);
            --nav-hover-color: #ffffff;
        }

    </style>

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>ShopAbda</h1>
            <span>.</span>
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('home')}}" class="active">Home</a></li>
                <li><a href="{{ url('/') }}#about">About</a></li>
                <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>

                <li><a href="{{ url('/') }}#contact">Contact</a></li>
                <!-- Augmentation de la taille de l'icône de panier -->
                <li>
                    <a href="#" class="dropdown has-dropdown">
                        <i id="cart-icon" class="bi bi-cart text-danger" style="font-size: 24px;"></i>
                        <span id="cart-count" class="text-danger">{{ $cartCount }}</span>
                        <ul class="dd-box-shadow">

                            @foreach($panier as $item)
                                <li class="d-flex align-items-center">

                                    <i class="bi bi-trash text-danger fs-5 me-2 delete-product" data-product-id="{{ $item->product->id }}"></i>

                                    <span class="text-dark">  {{ $item->product->titre }}  X  {{$item->quantite}} </span>
                                </li>
                            @endforeach
                            <li>
                                <form action="{{route('valider.Achat')}}" method="get">
                                <button class="btn btn-primary ms-auto" type="submit">Valider l'achat</button>
                                </form>
                            </li>
                        </ul>

                    </a>
                </li>


            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

        @if(Auth::check())

            <form action="{{ route('user.deconnecter') }}" method="POST">
                @csrf
                <button type="submit" class="btn-getstarted">
                    Déconnexion
                </button>
            </form>

        @else

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        @endif

    </div>
</header><!-- End Header -->

<main>
    @yield('content')

</main>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>Append</span>
                </a>
                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>A108 Adam Street</p>
                <p>New York, NY 535022</p>
                <p>United States</p>
                <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                <p><strong>Email:</strong> <span>info@example.com</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>&copy; <span>Copyright</span> <strong class="px-1">Append</strong> <span>All Rights Reserved</span></p>
        <div class="credits">

            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer><!-- End Footer -->

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionnez tous les éléments avec la classe "delete-product"
        const deleteButtons = document.querySelectorAll('.delete-product');

        // Parcourez chaque bouton de suppression
        deleteButtons.forEach(button => {
            // Ajoutez un écouteur d'événements pour le clic
            button.addEventListener('click', function() {
                // Récupérez l'identifiant du produit à supprimer
                const productId = this.getAttribute('data-product-id');

                // Envoyez une requête AJAX pour supprimer le produit
                fetch(`/panier/supprimer/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => {

                        if (response.ok) {
                            window.location.reload();
                        } else {

                            console.error('La suppression du produit a échoué.');
                        }
                    })
                    .catch(error => {

                        console.error('Une erreur s\'est produite lors de la suppression du produit :', error);
                    });
            });
        });
    });
</script>


<!-- Vendor JS Files -->
<script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>
