@extends('base')

@section('content')
    <h1>This is a show page.</h1>
    <div style="margin: 80px;">
      <div style="margin-bottom: 60px; border: solid 1px lightgrey; border-radius: 2px; padding: 80px;">
        <h3><a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
        <p>{{ $post->body }}</p>
        <p>Status: {{ $post->status }}</p>
      </div>
    </div>
@endsection