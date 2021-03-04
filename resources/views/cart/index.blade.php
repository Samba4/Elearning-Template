@extends('layouts.app')
<title>Votre panier | Kahier</title>

@section('content')

<div class="container mb-4 pb-5">
    <div class="jumbotron">
        @if(count(\Cart::session(Auth::user()->id)->getContent()) > 0)
        <div class="d-flex justify-content-center mb-5">
            <a href="{{route('panier.clear')}}" class="btn btn-block btn-danger w-25">
                Vider le panier
            </a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-striped">
                        <tbody>
                            @foreach (\Cart::session(Auth::user()->id)->getContent() as $course)
                            @php

                            $tax = \Cart::getTotal() *0.20;
                            $roundedTax = round($tax, 2);

                            $commission = \Cart::getTotal() *0.15;
                            $roundedCom = round($commission, 2);

                            $total = \Cart::getTotal();
                            $realTotal = \Cart::getTotal();
                            @endphp
                            <tr>
                                <td><a href="{{route('course.show', $course->model->slug)}}"><img class="cart-img"
                                            src="/storage/courses/{{$course->model->user_id}}/{{$course->model->image}}" /></a>
                                </td>
                                <td>
                                    <a href="{{route('course.show', $course->model->slug)}}">
                                        <p><b>{{$course->model->title}}</b></p>
                                    </a>
                                    <p>Par {{$course->model->user->nom}} {{$course->model->user->prenom}}</p>
                                </td>
                                <td class="text-left">
                                    <small><a class="btn btn-danger"
                                            href="{{route('panier.destroy', $course->id)}}">Supprimer</a></small><br>
                                    <small><a class="btn border"
                                            href="{{route('souhaits.toWishList', $course->id)}}">Ajouter à la liste
                                            des envies</a></small></br>
                                </td>
                                <td class="text-right">
                                    @if ($course->model->price == "0.01")
                                    Cours offert
                                    @else
                                    {{$course->model->price}} €
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Frais de services | Kahier (15%)</td>
                                <td class="text-right">{{$roundedCom}} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Taxe (20%)</td>
                                <td class="text-right">{{round($roundedTax,2)}} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Sous-total</td>
                                <td class="text-right">{{ \Cart::getSubTotal() - $roundedTax - $roundedCom}} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total à régler</strong></td>
                                <td class="text-right">
                                    <strong>{{ round($realTotal,2)}}
                                        €</strong></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="{{route('courses')}}" class="btn btn-block btn-light">Continuer vos achats</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{route('payment')}}" class="btn btn-lg btn-block btn-success text-uppercase">Payer</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="empty-cart text-center">
            <i class="fas fa-shopping-cart fa-9x"></i>
            <h4 class="my-5">Votre panier est vide. Continuer vos achats et trouvez un cours !</h4>
            <a href="{{route('courses')}}" class="primary-btn">
                Continuer vos achats
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif
    </div>
    <div class="wish-list jumbotron pt-3">
        <h3 class="my-3">Récemment ajouté à la liste des envies</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    @foreach (\Cart::session(Auth::user()->id.'_whislist')->getContent() as $course)
                    <tr>
                        <td><a href="{{route('course.show', $course->model->slug)}}"><img class="cart-img"
                                    src="/storage/courses/{{$course->model->user_id}}/{{$course->model->image}}" /></a>
                        </td>
                        <td>
                            <a href="{{route('course.show', $course->model->slug)}}">
                                <p><b>{{$course->model->title}}</b></p>
                            </a>
                            <p>Par {{$course->model->user->nom}} {{$course->model->user->prenom}}</p>
                        </td>
                        <td class="text-left">
                            <small><a class="btn border"
                                    href="{{route('souhaits.destroy', $course->model->id)}}">Supprimer</a></small><br>
                            <small><a class="btn border" href="{{route('souhaits.toCart', $course->id)}}">Ajouter
                                    au panier</a></small>
                        </td>
                        <td class="text-right">{{$course->model->price}} €</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
