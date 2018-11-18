@extends('dashboard.layouts.app')

@section('categories_sidebar_class', 'active')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Category</h4>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('dashboard.categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="Name" value="{{ $errors->any() ? old('name') : $category->name }}" required>
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
                                <input type="text" name="slug" class="form-control border-input" placeholder="Slug" value="{{ $errors->any() ? old('slug') : $category->slug }}" required>
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