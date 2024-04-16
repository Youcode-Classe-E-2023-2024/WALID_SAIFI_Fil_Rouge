<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home - Append Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset("frontend/assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
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
            <h1>Append</h1>
            <span>.</span>
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('home')}}" class="active">Home</a></li>
                <li><a href="{{ url('/') }}#about">About</a></li>
                <li><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
                <li class="dropdown has-dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dd-box-shadow">
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown has-dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                            <ul class="dd-box-shadow">
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>

            </ul>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

        <a class="btn-getstarted" href="{{route('login')}}">Login</a>

    </div>
</header><!-- End Header -->

<main id="main">






    <!-- Recent-posts Section - Home Page -->
    <section id="Produit" class="recent-posts">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Produit </h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach ($products as $product)
                    <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <article>
                            <div class="post-img">
                                <!-- Afficher l'image du produit (remplacer par le chemin réel) -->
                                <img src="{{asset('images/produit/'.$product->image)}}" alt="" class="img-fluid">
                            </div>
                            <!-- Vérifier si la catégorie existe avant d'accéder à sa propriété 'name' -->
                            @if ($product->category)
                                <p class="post-category">{{ $product->category->name }}</p>
                            @else
                                <p class="post-category">Catégorie non définie</p>
                            @endif
                            <h2 class="title">
                                <!-- Afficher le titre du produit -->
                                <a href="blog-details.html">{{ $product->titre }}</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/'.$product->user->image)}}" alt="" class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <!-- Vérifier si l'utilisateur existe avant d'accéder à ses propriétés 'name' et 'prenom' -->
                                    @if ($product->user)
                                        <p class="post-author">{{ $product->user->name }} {{ $product->user->prenom }}</p>
                                    @else
                                        <p class="post-author">Utilisateur non défini</p>
                                    @endif
                                    <!-- Afficher la date de création du produit (format à adapter selon vos besoins) -->
                                    <p class="post-date">
                                        <time datetime="{{ $product->created_at }}">{{ $product->created_at->format('M j, Y') }}</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                @endforeach


                <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <article>
                        <div class="post-img">
                            <img src="frontend/assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="post-category">Sports</p>
                        <h2 class="title">
                            <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <img src="frontend/assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Allisa Mayer</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 5, 2024</time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div><!-- End post list item -->

                <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <article>
                        <div class="post-img">
                            <img src="frontend/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="post-category">Entertainment</p>
                        <h2 class="title">
                            <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <img src="frontend/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Mark Dower</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 22, 2022</time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div><!-- End post list item -->

                <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <article>
                        <div class="post-img">
                            <img src="frontend/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="post-category">Entertainment</p>
                        <h2 class="title">
                            <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <img src="frontend/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Mark Dower</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 22, 2022</time>
                                </p>
                            </div>
                        </div>


                    </article>
                </div><!-- End post list item -->

                <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <article>
                        <div class="post-img">
                            <img src="frontend/assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                        </div>
                        <p class="post-category">Entertainment</p>
                        <h2 class="title">
                            <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <img src="frontend/assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Mark Dower</p>
                                <p class="post-date">
                                    <time datetime="2022-01-01">Jun 22, 2022</time>
                                </p>
                            </div>
                        </div>


                    </article>
                </div><!-- End post list item -->

            </div><!-- End recent posts list -->

        </div>

    </section><!-- End Recent-posts Section -->







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
