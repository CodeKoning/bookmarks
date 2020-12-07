@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create a Bookmark</h1><br>
    <form action="/bookmarks/create" method="POST">
      @csrf
      <div class="form-group">
        <label for="bookmark_url_name">Name your URL</label>
        <input type="text" id="bookmark_url" class="form-control" name="bookmark_url_name"><br>
      </div>
      <div class="form-group">
        <label for="bookmark_url">URL</label>
        <input type="text" id="bookmark_url" class="form-control" name="bookmark_url"><br>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
@endsection