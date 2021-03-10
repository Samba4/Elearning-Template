@extends('layouts.app')

@section('content')

<section class="hero-section set-bg" data-setbg="{{ asset('img/hero.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <h2>Apprenez où vous voulez avec Kahier</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Découvrez plus de 100 000 cours</li>
                        <li class="list-group-item">Télécharger des cours pour les regarder hors ligne</li>
                        <li class="list-group-item">Écouter des cours en podcast</li>
                        <li class="list-group-item">Regarder des cours avec Chromecast ou l'Apple TV</li>
                    </ul>
                    @guest
                    <a href="{{route('login')}}" class="primary-btn my-5">Nous rejoindre</a>
                    @endguest
                    @auth
                    <a href="{{route('courses')}}" class="primary-btn my-5">Nos cours</a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('img/hero-right.png') }}" alt="">
            </div>
        </div>
    </div>
</section>


<section class="home-about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ha-pic mt-5">
                    <img src="https://blog.cursuspro.com/wp-content/uploads/2017/07/CursusPro_Tendances_e-learning.jpg"
                        alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ha-text">
                    <h2>A propos de Kahier</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in lacus a velit pretium
                        finibus. In vitae dolor tellus. Aenean a mi elit. Donec suscipit efficitur lectus at
                        condimentum. Ut non ante non eros hendrerit egestas. Etiam sit amet diam elementum, luctus
                        turpis vel, consectetur enim. Curabitur ante mi, mollis non fringilla at, tincidunt ut lectus.
                    </p>
                    <ul>
                        <li><i class="fas fa-check"></i> Plus de 120 formateurs compétents</li>
                        <li><i class="fas fa-check"></i> Plus de 500 cours disponibles</li>
                        <li><i class="fas fa-check"></i> Contenu vidéo</li>
                    </ul>
                    <a href="#" class="ha-btn">Voir les cours</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-member-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nos formateurs</h2>
                    <p>Voici les formateurs actifs de la plateforme. Vous aussi dès à présent devenez formateurs et
                        créez votre premier cours !</p>
                </div>
            </div>
        </div>
    </div>
    @foreach ($instructors as $instructor)
    <div class="member-item set-bg" data-setbg="{{asset('img/IMG-0506.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="https://github.com/Samba4" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://instagram.com/petithulk" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/petithulk" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/samba-coulibaly/" target="_blank"><i
                        class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>{{$instructor->prenom}} {{$instructor->nom}}</h5>
            <span>Formateur</span>
        </div>
    </div>
    @endforeach
</section>

<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Ces cours pourraient vous intéresser</h2>
                    <p>Vous ne trouvez pas le cours que vous souhaitez sur notre site ? Udemy propose plus de 10 000
                        cours, ainsi que plus de 500 formateurs, couvrant tous les secteurs du digital.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($udemy as $item)
            <div class="col-lg-6">
                <div class="latest-item set-bg" data-setbg="{{$item['image_480x270']}}">
                    <div class="li-tag">{{$item['price_detail']['amount']}} €</div>
                    <div class="li-text">
                        <h5><a href="{{route('udemy.show', $item['id'])}}">{{$item['title']}}</a></h5>
                        <span><i class="fa fas-user"></i> Par
                            <b>{{$item['visible_instructors'][0]['display_name']}}</b></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="newslatter-section mb-5 pb-5">
    <div class="container">
        <div class="newslatter-inner set-bg" data-setbg="img/newslatter-bg.jpg">
            <div class="ni-text">
                <h3>S'abonner à notre newsletter</h3>
                <p>Restez informé des derniers cours mis en ligne !</p>
            </div>
            <form action="#" method="POST" class="ni-form">
                <input type="text" placeholder="Votre adresse email" name="email">
                <button type="submit">M'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection
