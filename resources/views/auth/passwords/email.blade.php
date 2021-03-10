@extends('layouts.app')

@section('content')
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('password.email') }}" class="comment-form contact-form" method="POST"
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
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-user-alt-slash"></i>
                            Envoyez lien de reinitialisation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
