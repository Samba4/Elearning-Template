<div class="bd-title text-center">
    <div class="bd-tag-share">
        <div class="tag d-flex-lg text-md-center justify-content-around">
            @foreach ($categories as $categorie)
            <p class="primary-btn m-2">{{$categorie->name}}</p>
            @endforeach
        </div>
    </div>
</div>
