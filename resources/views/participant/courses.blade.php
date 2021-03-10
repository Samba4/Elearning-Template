@extends('layouts.app')

@section('content')

<section class="related-post-section spad">
    <div class="container">
        @if(count($courseUser) < 1) <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Mes cours</h2>
                    <p class="mt-3">Dès maintenant achetez un cours !</p>
                    <a href="{{route('courses')}}" class="primary-btn mt-3">
                        <i class="fas fa-search"></i>
                        Rechercher un cours
                    </a>
                </div>
            </div>
    </div>
    @endif
    <div class="row">
        <div class="courses">
            @if(count($courseUser) > 0)
            @foreach ($courseUser as $item)
            <div class="course my-5 row">
                <div class="col-lg-3">
                    <div class="about-pic">
                        <a href="{{route('participant.show', $item->course->slug)}}">
                            <img src="/storage/courses/{{$item->course->user_id}}/{{$item->course->image}}"
                                alt="Course img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text pt-0">
                        <h3>{{$item->course->title}}</h3>
                        <p>{{$item->course->subtitle}}</p>
                        <p>Par <b>{{$item->course->user->nom}} {{$item->course->user->prenom}}</b></p>
                        <span class="tag">{{$item->course->category->name}}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="{{route('participant.show', $item->course->slug)}}" class="primary-btn">
                        Continuer
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    @endif
</section>

@stop
