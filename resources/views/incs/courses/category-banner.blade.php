@php
use App\Category;
@endphp

<div class="ui secondary  menu">
    <a href="{{route('courses')}}" class="item active">
        Tous
    </a>
    @foreach (Category::all() as $item)
    <a href="{{route('course.filter', $item->id) }}" class="item">
        {{$item->name}}
    </a>
    @endforeach
    <div class="right menu">
        <div class="item">
            <div class="ui icon input">
                <input type="text" placeholder="Search...">
                <i class="search link icon"></i>
            </div>
        </div>
    </div>
</div>
