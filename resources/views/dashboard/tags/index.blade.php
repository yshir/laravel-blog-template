@extends('dashboard.layouts.table_list')

@section('tags_sidebar_class', 'active')

@section('t-title', 'Tag List')
@section('t-category', 'Here is all tags')
@section('create_btn')
    <a href="{{ route('dashboard.tags.create') }}"><button class="btn btn-primary">Create New Tag</button></a>
@endsection

@section('t-content')
<thead>
    <th>Name</th>
    <th>Slug</th>
  </thead>
  <tbody>
      @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td style="display:flex; justify-content:flex-end;">
                <a href="{{ route('dashboard.tags.edit', $tag->id) }}" style="padding-right:4rem;"><button class="btn btn">Edit</button></a>
                <form action="{{ route('dashboard.tags.destroy', $tag->id) }}" method="POST" style="padding-right:4rem;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
      @endforeach
  </tbody>
@endsection