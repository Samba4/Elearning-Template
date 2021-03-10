@extends('layouts.app')
<title>Nos cours en ligne | Kahier </title>
@section('content')

@php
use App\Category;
@endphp

<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Cours pour commencer</h2>
                    <p class="f-para">Apprenez auprès de véritables professionnels du métier.</p>
                </div>
            </div>
        </div>
        @include('incs.courses.category-banner')
        <div class="row">
            <div class="courses">
                @if (count($courses) > 0)
                @foreach ($courses as $course)
                <div class="course my-5 row">
                    <div class="col-lg-4">
                        <div class="about-pic">
                            <a href="{{route('course.show', $course->slug)}}">
                                <img src="/storage/courses/{{$course->user_id}}/{{$course->image}}"
                                    alt="Image du cours">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-text pt-0">
                            <h3>{{$course->title}}</h3>
                            <p>{{$course->subtitle}}</p>
                            <p>Crée par <b>{{$course->user->nom}} {{$course->user->prenom}}</b></p>
                            <span class="tag">{{$course->category->name}}</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <p><b>
                                {{$course->price}} €
                            </b></p>
                        <a href="{{route('souhaits', $course->id)}}">
                            <i style="color: rgb(202, 38, 92)" class="fas fa-heart fa-2x"></i>
                        </a>
                        <a href="{{route('panier.store', $course->id)}}">
                            <i style="color: rgb(12, 11, 12)" class="fas fa-cart-arrow-down fa-2x"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
@else
<div class="ui secondary menu">
    <div class="text-center">
        <div class="alert alert-danger alert-block" style="padding: 1.75rem 23.25rem">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Malheureusement</strong> la catégorie : "{{$categorie->name}}" ne possède pour
            l'instant aucun cours.
            </br>
            Vous pouvez toutefois en <a href="{{route('instructor.create')}}" style="color: #721C24"><strong>ajouter
                    un</strong></a>, si vous le souhaitez
            <i class="fas fa-exclamation-triangle"></i>
        </div>
    </div>
</div>
@endif

@endsection
