@extends('layouts.app')
<title>Nos cours en ligne | Kahier </title>
@section('content')

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
                            <p>Par <b>{{$course->user->nom}} {{$course->user->prenom}}</b></p>
                            <span class="tag">{{$course->category->name}}</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @if ($course->price == "00.00")
                        <p><b>
                                Cours offert
                            </b></p>
                        <a href="{{route('souhaits', $course->id)}}">
                            <i style="color: rgb(202, 38, 92)" class="fas fa-heart fa-2x"></i>
                        </a>
                        @else
                        <p><b>
                                {{$course->price}}€
                            </b></p>
                        <a href="{{route('souhaits', $course->id)}}">
                            <i style="color: rgb(202, 38, 92)" class="fas fa-heart fa-2x"></i>
                        </a>
                        <a href="{{route('panier.store', $course->id)}}">
                            <i style="color: rgb(12, 11, 12)" class="fas fa-cart-arrow-down fa-2x"></i>
                        </a>
                        @endif
                    </div>
                </div>*
                @endforeach
            </div>
        </div>
</section>

@endsection
