@extends('dashboard.layouts.app')

@section('tags_sidebar_class', 'active')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Create New Tag</h4>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('dashboard.tags.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="Name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control border-input" placeholder="Slug" value="{{ old('slug') }}" required>
                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" style="margin: 20px;" class="btn btn-info btn-fill btn-wd">Save</button>
                    </div>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection