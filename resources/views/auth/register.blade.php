@extends('layouts.app')

@section('content')
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('register') }}" class="comment-form contact-form" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Nom</label>
                            <input type="text" class="type @error('nom') is-invalid @enderror"
                                placeholder="Entrez votre nom" name="nom" required autocomplete="nom" autofocus>
                            @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="title">Prenom</label>
                            <input type="text" class="type @error('prenom') is-invalid @enderror"
                                placeholder="Entrez votre prenom" name="prenom" required autocomplete="prenom"
                                autofocus>
                            @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="title">Pseudonyme</label>
                            <input type="text" class="type @error('pseudo') is-invalid @enderror"
                                placeholder="Entrez un pseudo" name="pseudo" required autocomplete="pseudo" autofocus>
                            @error('pseudo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="title">Adresse E-mail</label>
                            <input type="email" class="type @error('email') is-invalid @enderror"
                                placeholder="Entrez votre adresse e-mail" name="email" required autocomplete="email"
                                autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="title">Mot de passe</label>
                            <input type="password" class="type @error('password') is-invalid @enderror"
                                placeholder="Entrez votre mot de passe" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="title">Confirmer de passe</label>
                            <input type="password" placeholder="Entrez à nouveau votre mot de passe"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="primary-btn">
                                <i class="fas fa-sign-in-alt"></i>
                                S'inscrire
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
