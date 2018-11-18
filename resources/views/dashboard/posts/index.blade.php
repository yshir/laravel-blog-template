@extends('dashboard.layouts.table_list')

@section('posts_sidebar_class', 'active')

@section('t-title', 'Post List')
@section('t-category', 'Here is  all posts')
@section('create_btn')
    <a href="{{ route('dashboard.posts.create') }}"><button class="btn btn-primary">Create New Post</button></a>
@endsection

@section('t-content')
<thead>
    <th>ID</th>
    <th>Title</th>
    <th>Category</th>
    <th>Status</th>
    <th>Publishd At</th>
  </thead>
  <tbody>
      @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ isset($post->category) ? $post->category->name : '未分類' }}</td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->published_at }}</td>
            <td><a href="{{ route('posts.show', ['id' => $post->slug]) }}">Show</a></td>
            <td><a href="{{ route('dashboard.posts.edit', ['id' => $post->id]) }}">Edit</a></td>
        </tr>
      @endforeach
  </tbody>
@endsection