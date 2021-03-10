@extends('layouts.instructor-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 jumbotron">
                <h3 class="mb-5">Participants</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Inscription</th>
                            <th scope="col">Participant</th>
                            <th scope="col">Cours</th>
                            <th scope="col">Votre revenu</th>
                            <th scope="col">Frais de Kahier</th>
                            <th scope="col">Taxe TVA</th>
                            <th scope="col">Prix payé</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eleves as $data)
                        <tr>
                            <th>{{$data->created_at->format('Y-m-d')}}</th>
                            <td>{{$data->email}}</td>
                            <td>{{$data->course->title}}</td>
                            <td>{{$data->instructor_part}} €</td>
                            <td>{{$data->kahier_part}} €</td>
                            <td>{{$data->tva}} €</td>
                            <td>{{$data->amount}} €</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection