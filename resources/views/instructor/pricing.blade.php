@extends('layouts.instructor-app')
<title>Tarifs - {{$course->title}} | Kahier</title>
@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <h3>Tarification</h3>
                <form action="{{route('pricing.store', $course->id)}}" class="comment-form contact-form" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="content">
                        <p>Tarification en vigueur pour ce cours :
                            {{$course->price}}€
                        </p>
                        <p>Choisissez un niveau de tarif pour votre cours ci-dessous et cliquez sur « Enregistrer ». Le
                            prix affiché visible par les participants dans d'autres devises est calculé à l'aide d'une
                            grille tarifaire en fonction du tarif auquel celui-ci correspond.</p>
                        <p>
                            La société Kahier Inc prélèvera des frais de service à hauteur de 15 % sur chacun de vos
                            cours vendus. Comme exigé par la loi, Kahier prélève également les taxes sur les
                            transactions
                            applicables aux achats réalisés dans certaines juridictions fiscales.
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <select class="form-control" name="price">
                            <option value="02.99" {{$course->price === 02.99 ? 'selected' : ''}}>2,99</option>
                            <option value="04.99" {{$course->price === 04.99 ? 'selected' : ''}}>4,99 €</option>
                            <option value="09.99" {{$course->price === 09.99 ? 'selected' : ''}}>9,99 €</option>
                            <option value="14.99" {{$course->price === 14.99 ? 'selected' : ''}}>14,99 €</option>
                            <option value="19.99" {{$course->price === 19.99 ? 'selected' : ''}}>19,99 €</option>
                            <option value="27.99" {{$course->price === 27.99 ? 'selected' : ''}}>27,99 €</option>
                            <option value="34.99" {{$course->price === 34.99 ? 'selected' : ''}}>34,99 €</option>
                            <option value="39.99" {{$course->price === 39.99 ? 'selected' : ''}}>39,99 €</option>
                            <option value="59.99" {{$course->price === 59.99 ? 'selected' : ''}}>59,99 €</option>
                            <option value="69.99" {{$course->price === 69.99 ? 'selected' : ''}}>69,99 €</option>
                            <option value="79.99" {{$course->price === 79.99 ? 'selected' : ''}}>79,99 €</option>
                            <option value="99.99" {{$course->price === 99.99 ? 'selected' : ''}}>99,99 €</option>
                            <option value="119.99" {{$course->price === 119.99 ? 'selected' : ''}}>119,99 €</option>
                            <option value="149.99" {{$course->price === 149.99 ? 'selected' : ''}}>149,99 €</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <p class="text-dark">Après déduction des taxes et frais de services liés à la gestion de la
                            plateforme, vous receverez la somme de
                            <strong>{{round($course->price*0.65,2)}}€</strong> par cours vendus.
                        </p>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-save"></i>
                            Sauvegarder
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection