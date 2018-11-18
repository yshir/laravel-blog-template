@extends('dashboard.layouts.table_list')

@section('users_sidebar_class', 'active')

@section('t-title', 'All Users')
@section('t-category', 'This is user list')
@section('create_btn')
    <a href="{{ route('dashboard.users.create') }}"><button class="btn btn-primary">Create New User</button></a>
@endsection

@section('t-content')
<thead>
    <th></th>
    <th>Name</th>
    <th>Role</th>
    <th>Email</th>
    <th>Twitter</th>
    <th>Facebook</th>
    <th>Posts</th>
  </thead>
  <tbody>
      @foreach ($users as $user)
        <tr>
            <td style="text-align:center;"><img class="avatar border-white" src="{{ $user->avatar }}" alt="..."/></td>
            <td>{{ isset($user->nickname) ? $user->nickname : $user->name }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>{!! isset(json_decode($user->sns_links)->twitter) ? '<i class="ti-check">' : '' !!}</td>
            <td>{!! isset(json_decode($user->sns_links)->facebook) ? '<i class="ti-check">' : '' !!}</td>
            <td>{{ $user->posts->count() }}</td>
            <td><a href="{{ route('dashboard.users.edit', ['id' => $user->id]) }}">Edit</a></td>
        </tr>
      @endforeach
  </tbody>
@endsection