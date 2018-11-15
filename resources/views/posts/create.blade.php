@extends('base')

@section('content')
    <h1>This is a create page.</h1>
    <div style="margin: 80px;">
      <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="title" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('slug') }}</label>

            <div class="col-md-6">
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" required autofocus>

                @if ($errors->has('slug'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="meta_description" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('meta_description') }}</label>

            <div class="col-md-6">
                <input id="meta_description" type="text" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" value="{{ old('meta_description') }}" required autofocus>

                @if ($errors->has('meta_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

            <div class="col-md-6">
                <select id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" autofocus>
                    <option value="">未分類</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="thumbnail" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('thumbnail') }}</label>

            <div class="col-md-6">
                <input id="thumbnail" type="file" class="form-control{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}" name="thumbnail" accept="image/*" capture="camera" autofocus>

                @if ($errors->has('thumbnail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('thumbnail') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="body" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('body') }}</label>

            <div class="col-md-6">
                <textarea id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required autofocus></textarea>

                @if ($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="published_at" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('published_at') }}</label>

            <div class="col-md-6">
                <input id="published_at" type="date" class="form-control{{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" value="{{ empty(old('published_at')) ? date('Y-m-d') : old('published_at')  }}" required autofocus>

                @if ($errors->has('published_at'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('published_at') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="status" style="margin-right: 20px;" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

            <div class="col-md-6">
                <select id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required autofocus>
                    @foreach (['draft', 'published'] as $status)
                        <option value={{ $status }}>{{ $status }}</option>
                    @endforeach
                </select>

                @if ($errors->has('status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
      </form>
    </div>
@endsection