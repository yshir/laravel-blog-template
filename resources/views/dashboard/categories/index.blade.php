@extends('dashboard.layouts.table_list')

@section('categories_sidebar_class', 'active')

@section('t-title', 'Category List')
@section('t-category', 'Here is all categories')
@section('create_btn')
    <a href="{{ route('dashboard.categories.create') }}"><button class="btn btn-primary">Create New Category</button></a>
@endsection

@section('t-content')
<thead>
    <th>Name</th>
    <th>Slug</th>
  </thead>
  <tbody>
      @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td style="display:flex; justify-content:flex-end;">
                <a href="{{ route('dashboard.categories.edit', $category->id) }}" style="padding-right:4rem;"><button class="btn btn">Edit</button></a>
                <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" style="padding-right:4rem;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
      @endforeach
  </tbody>
@endsection