@extends('layout')
@section('content')

    <section class="ud-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ud-blog-details-image">
                        <img
                            src="images/Produit/pro.webp"
                            alt="blog details"
                        />
                        <div class="ud-blog-overlay">
                            <div class="ud-blog-overlay-content">
                                <div class="ud-blog-author">
                                    <img src="images/Produit/pro.webp" alt="author" />
                                    <span>
                       By <a href="javascript:void(0)"> Samuyl Joshi </a>
                    </span>
                                </div>

                                <div class="ud-blog-meta">
                                    <p class="date">
                                        <i class="lni lni-calendar"></i> <span>12 Jan 2024</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="ud-blog-details-content">
                        <h2 class="ud-blog-details-title">
                            Facing a challenge is kind of a turn-on for an easy rider
                        </h2>

=
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ud-blog-sidebar">
                        <div class="ud-newsletter-box">
                            <img
                                src="assets/images/blog/dotted-shape.svg"
                                alt="shape"
                                class="shape shape-1"
                            />
                            <img
                                src="assets/images/blog/dotted-shape.svg"
                                alt="shape"
                                class="shape shape-2"
                            />
                            <h3 class="ud-newsletter-title">Join our newsletter!</h3>
                            <p>Enter your email to receive our latest newsletter.</p>
                            <form class="ud-newsletter-form">
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Your Email address"
                                />
                                <button class="ud-main-btn">Subscribe Now</button>
                                <p class="ud-newsletter-note">Don't worry, we don't spam</p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
