@extends("layouts.app")

@section("content")

<div class="container" style="max-width: 800px">

    

    
    <div class="card mb-2 border-primary">
        <div class="card-body">
            <h3 class="h4">{{$article->title}}</h3>
            <div class="card-subtitle mb-2 text-muted small">
              By <b>{{ $article->user->name }}</b>,
                {{ $article->created_at->diffForHumans() }},
                Category: <b>{{ $article->category->name }}</b>
            </div>
        <div>
        {{$article->body}}
       


    </div>

    @auth
<a href="{{url("/articles/edit/$article->id")}}" class="btn btn-sm btn-outline-danger"> Edit</a>
<a href="{{url("/articles/delete/$article->id")}}" class="btn btn-sm btn-outline-danger"> Delete</a>
@endauth


</div>
</div>
        
<ul class="list-group mb-2">
    <li class="list-group-item active">
      <b>Comments ({{ count($article->comments) }})</b>
    </li>
@foreach($article->comments as $comment)
      <li class="list-group-item">
<a href="{{ url("/comments/delete/$comment->id") }}"
              class="btn-close float-end">
          </a>
          {{ $comment->content }}
          <div class="small mt-2">
            By <b>{{ $comment->user->name }}</b>,
            {{ $comment->created_at->diffForHumans() }}
          </div>
        </li>
      @endforeach
    </ul>

    @auth
  <form action="{{ url('/comments/add') }}" method="post">
    @csrf
    <input type="hidden" name="article_id"
      value="{{ $article->id }}">
    <textarea name="content" class="form-control mb-2" 
      placeholder="New Comment"></textarea>
    <input type="submit" value="Add Comment"
      class="btn btn-secondary">
  </form>
  @endauth

</div>


@endsection