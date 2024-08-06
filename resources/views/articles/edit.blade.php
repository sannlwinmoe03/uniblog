@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 800px">

    @if($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $err)
            {{$err}}
        @endforeach
    </div>

    @endif
    <form method="post">

        @csrf
        <input type="text" name="title" class="form-control mb-2" placeholder="Title" value="{{$article->title}}">
        <textarea name="body" class="form-control mb-2" placeholder="Body">{{$article->body}}</textarea>
        <select class="form-select mb-4" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category['id'] }}">
                {{ $category['name'] }}
              </option>
            @endforeach
          </select>

        <button class="btn btn-primary">Update Article</button>

    </form>


</div>

@endsection