@extends('layouts.app')

@section('content')
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('login') }}" class="comment-form contact-form" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Adresse E-mail</label>
                            <input type="text" class="type @error('email') is-invalid @enderror"
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
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="primary-btn">
                                <i class="fas fa-sign-in-alt"></i>
                                Se connecter
                            </button>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{route('register')}}" class="primary-btn">
                                <i class="fas fa-user-alt-slash"></i>
                                Pas de compte?
                            </a>
                        </div>
                        @if (Route::has('password.request'))
                        <div class="col-lg-4">
                            <a href="{{ route('password.request') }}" class="primary-btn">
                                <i class="fas fa-key"></i>
                                Mot de passe oublié
                            </a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
