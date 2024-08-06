@extends("layouts.app")

@section("content")

<div class="container" style="max-width: 800px">

    {{$articles->links()}}

    @if(session("info"))
    <div class="alert alert-info">
        {{session("info")}}
    </div>

    @endif

    @auth
        <a class="nav-link text-success"
        href="{{ url('/articles/add') }}">+ Add Post</a>
    @endauth

    @foreach ($articles as $article)
    <div class="card mb-2">
        <div class="card-body">
            <h3 class="h4">{{$article->title}}</h3>
            <div class="text-muted">
                {{$article->created_at}} <br>
                Category: <b>{{ $article->category->name }}</b>
            </div>
        <div>
        {{$article->body}}
    </div>
<a href="{{url("/articles/detail/$article->id")}}"> View Detail</a>

</div>
</div>
        
    @endforeach

    <a href="{{url("https://studentnewintiedumy-my.sharepoint.com/:w:/g/personal/i24027133_student_newinti_edu_my/ESwW6Jw5RuxMrDhI0TrZGrEBkHPY3RpkCBe6bkGNfWPFXw?e=LNDWOw")}}"> User Manual </a>

</div>


@endsection