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
                <div class="col-lg-4">
                    <div class="ud-blog-sidebar">
                        <div class="ud-newsletter-box">
                            <h3 class="ud-newsletter-title">Acheter notre produit</h3>
                            <p>Découvrez notre produit de qualité supérieure et facilitez-vous la vie dès aujourd'hui !</p>
                            <form class="ud-newsletter-form">

                                <div class="form-group">
                                    <label for="quantite">Quantité</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="quantite"
                                        placeholder="0"
                                    />
                                </div>
                                <button class="btn btn-primary">Acheter maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="ud-blog-details-content">
                        <h2 class="ud-blog-details-title">
                            Facing a challenge is kind of a turn-on for an easy rider
                        </h2>
                        <p class="ud-blog-details-para">
                            There’s a time and place for everything… including asking for
                            reviews. For instance: you should not asking for a review on
                            your checkout page. The sole purpose of this page is to guide
                            your customer to complete their purchase, and this means that
                            the page should be as minimalist and pared-down possible. You
                            don’t want to have any unnecessary elements or Call To Actions.
                        </p>
                        <p class="ud-blog-details-para">
                            There’s a time and place for everything… including asking for
                            reviews. For instance: you should not asking for a review on
                            your checkout page. The sole purpose of this page is to guide
                            your customer to complete their purchase, and this means that
                            the page should be as minimalist and pared-down possible. You
                            don’t want to have any unnecessary elements or Call To Actions.
                        </p>


                        
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>



@endsection
