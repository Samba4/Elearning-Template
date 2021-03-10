@extends('layouts.app')
<title>Cours d'uDemy | Kahier</title>

@section('content')
<section class="blog-hero-section set-bg pb-5" data-setbg="{{$cours['image_240x135']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bh-text">
                    <h2>{{$cours['title']}}</h2>
                    <ul>
                        <li><span>Par <strong>{{$cours['visible_instructors'][0]['display_name']}}</strong></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="bd-text">
                    <div class="bd-title text-center">
                        <h3>{{$cours['title']}}</h3>
                        <div class="bd-tag-share">
                            <div class="tag d-flex justify-content-center">
                                <a href="#">Développement Web</a>
                            </div>
                        </div>
                    </div>
                    <div class="bd-more-pic">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{$cours['image_480x270']}}" alt="Image du cours">
                            </div>
                            <div class="col-md-6">
                                <div class="price-item top-rated">
                                    <div class="tr-tag">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="pi-price mt-5">
                                        @if ($cours['price_detail']['amount'] == "0")
                                        <h2>Cours offert</h2>
                                        @else
                                        <h2><span>€</span>{{$cours['price_detail']['amount']}}</h2>
                                        @endif
                                    </div>
                                    <a href="https://www.udemy.com{{$cours['url']}}" class="price-btn">M'inscrire <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection