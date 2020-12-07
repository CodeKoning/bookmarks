@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Edit a Bookmark</h1><br>
  <form action="/bookmarks/{{$bookmark->id}}/edit" method="POST">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="bookmark_url_name">URL Name</label>
        <input type="text" value="{{$bookmark->url_name}}" id="bookmark_url" class="form-control" name="bookmark_url_name"><br>
      </div>
      <div class="form-group">
        <label for="bookmark_url">URL</label>
        <input type="text" value="{{$bookmark->url}}" id="bookmark_url" class="form-control" name="bookmark_url"><br>
      </div>
      <button onclick="ConfirmDelete()" type="submit" class="btn btn-primary">Save</button>
  </form>
  </div>
@endsection