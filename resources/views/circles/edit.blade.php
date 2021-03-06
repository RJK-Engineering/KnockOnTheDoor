@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Edit Circle</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('circles.update', $circle->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="title" name="title"
             value="{{ old('title', $circle->title) ?: $circle->title }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{
          old('description', $circle->description)
      }}</textarea>
    </div>
    <div class="form-group">
      <label for="webpage">Webpage</label>
      <input class="form-control" id="webpage" name="webpage"
             value="{{ old('webpage', $circle->webpage) ?: $circle->webpage }}">
    </div>
    <div class="form-group">
      <label for="file">Image</label>
      <img src="{{ $circle->imagePublicUrl() }}" height='100px'>
      <input class="btn" class="form-control-file" type="file" name="file" id="file">
      <input class="btn" type="submit" formaction="{{-- route('circles.update.image', $circle->id) --}}" value="Upload Image">
    </div>
    <input class="btn" type="submit" value="Update">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
