@php
use App\Category;
use App\CourseUser;
use Darryldecode\Cart\Cart;
$courseUser = CourseUser::where('user_id', Auth::user()->id)->get();
@endphp


<nav class="mainmenu mobile-menu">
    <ul>
        <li class="active">
            <a href="{{route('main.home')}}">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>
        <li>
            <a href="{{route('courses')}}">
                <i class="fas fa-ellipsis-v"></i>
                Suivre un cours
            </a>
            <ul class="dropdown px-2 py-3">
                @foreach (Category::all() as $categorie)
                <li>
                    <a href="{{route('course.filter', $categorie->id) }}">
                        {!!$categorie->icon!!}
                        {{$categorie->name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li>
        </li>
        <li>
            <a href="{{route('instructor')}}">
                <i class="fas fa-chalkboard-teacher"></i>
                Formateur
            </a>
            <ul class="dropdown">
                <li>
                    <p class="px-2">Passez à la vue Formateur ici : revenez aux cours que vous enseignez.</p>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('participants')}}">
                <i class="fas fa-book"></i>
                Mes cours
            </a>
            <ul class="dropdown">
                @if(count($courseUser) > 0)
                @foreach ($courseUser as $item)
                <li>
                    <div class="d-flex  ml-2 my-3">
                        <a href="{{route('participant.show', $item->course->slug)}}">
                            <img class="avatar border-rounded"
                                src="/storage/courses/{{$item->course->user_id}}/{{$item->course->image}}" />
                        </a>
                        <div class="user-infos">
                            <a
                                href="{{route('participant.show', $item->course->slug)}}"><small>{{$item->course->title}}</small></a>
                        </div>
                    </div>
                </li>
                @endforeach
                @else
                <li>
                    <div class="empty-car">
                        <p class="text-center">Votre panier est vide.</p>
                        <a class="btn btn-link" href="{{route('courses')}}">
                            Continuez vos achats.
                        </a>
                    </div>
                </li>
                @endif
            </ul>
        </li>
        <li>
            <a href="{{route('panier')}}">
                <i class="fas fa-shopping-cart"></i>
                @if (count(\Cart::session(Auth::user()->id)->getContent()) > 0)
                <span
                    class="badge badge-pill badge-danger">{{count(\Cart::session(Auth::user()->id)->getContent())}}</span>
                @endif
            </a>
            @if (count(\Cart::session(Auth::user()->id)->getContent()) > 0)
            <ul class="dropdown px-2 py-2">
                @foreach (\Cart::session(Auth::user()->id)->getContent() as $item)
                <li>
                    <div class="d-flex">
                        <a href="{{route('course.show', $item->model->slug)}}"><img class="avatar border-rounded"
                                src="/storage/courses/{{$item->model->user_id}}/{{$item->model->image}}" />
                        </a>
                        <div class="user-infos ml-3">
                            <small>{{$item->model->title}}</small>
                            <p class="text-danger">{{$item->model->price}} €</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="empty-car">
                        <a class="btn btn-link" href="{{route('panier')}}">
                            Voir mon panier
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <ul class="dropdown px-2 py-2 text-lg-center">
                <li>
                    <div class="empty-car">
                        <p>Votre panier est vide.</p>
                        <a class="btn btn-link" href="{{route('courses')}}">
                            Continuez vos achats.
                        </a>
                    </div>
                </li>
            </ul>
            @endif
        </li>
        <li>
            <a href="{{route('panier')}}">
                <i class="fas fa-heart"></i>
                @if (count(\Cart::session(Auth::user()->id.'_whislist')->getContent()) > 0)
                <span
                    class="badge badge-pill badge-danger">{{count(\Cart::session(Auth::user()->id.'_whislist')->getContent())}}</span>
                @endif
            </a>
            @if (count(\Cart::session(Auth::user()->id.'_whislist')->getContent()) > 0)
            <ul class="dropdown px-2 py-2">
                @foreach (\Cart::session(Auth::user()->id.'_whislist')->getContent() as $item)
                <li>
                    <div class="d-flex">
                        <img class="avatar border-rounded"
                            src="/storage/courses/{{$item->model->user_id}}/{{$item->model->image}}" />
                        <div class="user-infos ml-3">
                            <small>{{$item->model->title}}</small>
                            <p class="text-danger">{{$item->model->price}} €</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="empty-car">
                        <a class="btn btn-link" href="{{route('panier')}}">
                            Voir mon panier
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <ul class="dropdown px-2 py-2 text-lg-center">
                <li>
                    <div class="empty-car">
                        <p>Votre liste d'envie est vide.</p>
                        <a class="btn btn-link" href="{{route('courses')}}">
                            Continuez vos achats.
                        </a>
                    </div>
                </li>
            </ul>
            @endif
        </li>
        <li>
            <a class="nav-link" href="#">
                <img class=" avatar-profile border-rounded rounded-circle"
                    src="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg" />
            </a>
            <ul class="dropdown">

                <li>
                    <div class="d-flex justify-content-between py-3 px-3">
                        <div class="user-infos">
                            <p>{{Auth::user()->nom}} {{Auth::user()->prenom}}</p>
                            <small>{{Auth::user()->email}}</small>
                        </div>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </li>
    </ul>
</nav>
