@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Saved URL Dashboard') }}</div>

                <div id="card-main" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('URL List') }}
                    <h1 id="greeting" class="mt-3">Start by adding your favorite URLs</h1>
                    <div class="list-group mt-3">
                      @foreach($bookmarks as $bookmark)
                      <div class="row mt-3">
                        <a href="https://{{ $bookmark->url }}" class="ml-3 col-9 list-group-item list-group-item-action">
                          {{ $bookmark->url_name }}
                        </a>
                        <a href="bookmarks/{{ $bookmark->id }}/edit" class="ml-3 col-1 btn btn-info mt-3" role="button">Edit</a>
                        <form action="/bookmarks/{{$bookmark->id}}/destroy" method="POST">
                          @csrf
                          @method('DELETE')
                          <input type="hidden">
                          <button type="submit" class="ml-3 btn btn-outline-danger mt-3" role="button">Delete</button>
                        </form>
                      </div>
                      @endforeach
                    </div>
                </div>
            </div>
            <a href="bookmarks/create" class="btn btn-info mt-3" role="button">Create new URL</a>
        </div>
    </div>
</div>
<script>
  let number_of_rows = document.getElementsByClassName("row");
  if(number_of_rows.length > 1){
    var greeting = document.getElementById("greeting");
    greeting.remove();
  }
</script>
@endsection
