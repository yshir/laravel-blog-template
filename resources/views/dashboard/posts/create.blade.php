@extends('dashboard.layouts.app')

@section('posts_sidebar_class', 'active')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-post">
            <div class="image">
                <img src="{{ asset('paper-dashboard/img/background.jpg') }}" alt="..."/>
            </div>
            <div class="content">
                <p class="description text-center">
                Thumbnail
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Create Post</h4>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control border-input" placeholder="Title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="slug">URL</label>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <p class="form-control">https://test.com/post/</p>
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <div class="form-group">
                                        <input type="slug" name="slug" class="form-control border-input" placeholder="Slug" value="{{ old('slug') }}" required>
                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control border-input">
                                    @if (old('category_id'))
                                        <option value="{{ old('category_id') }}">{{ $categories[old('category_id')]->name }}</option>
                                    @endif
                                    <option value="">---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_description">Meta Description (Max: 300)</label>
                                <textarea name="meta_description" class="form-control" placeholder="Meta description..." rows="3">{{ old('meta_description') }}</textarea>
                                @if ($errors->has('meta_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label name="body">Body</label>
                                <textarea name="body" class="form-control" placeholder="Here can be your nice text" rows="10" required>{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="canonical">Canonical (optional)</label>
                                <input type="text" name="canonical" class="form-control border-input" placeholder="Duplicated page URL: https://example.com/foo/bar " value="{{ old('canonical') }}" {{ $canWriteAll ? '' : 'readonly' }}>
                                @if ($errors->has('canonical'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('canonical') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="head_html">Head HTML (optional)</label>
                                <textarea name="head_html" class="form-control" placeholder="<script>\nfoo?$!%$bar\n</script>" rows="3" {{ $canWriteAll ? '' : 'readonly' }}>{{ old('head_html') }}</textarea>
                                @if ($errors->has('head_html'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('head_html') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="footer_html">Footer HTML (optional)</label>
                                <textarea name="footer_html" class="form-control" placeholder="<script>\nfoo?$!%$bar\n</script>" rows="3" {{ $canWriteAll ? '' : 'readonly' }}>{{ old('footer_html') }}</textarea>
                                @if ($errors->has('footer_html'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('footer_html') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="published_at">Published At</label>
                                <input type="date" name="published_at" class="form-control border-input" value="{{ old('published_at') ? old('published_at') : date('Y-m-d') }}" required>
                                @if ($errors->has('published_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('published_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control border-input" required>
                                    <option value="draft" {{ old('status') && old('status') === 'draft' ? 'selected' : '' }}>下書き</option>
                                    <option value="published" {{ old('status') && old('status') === 'published' ? 'selected' : '' }}>公開</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
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

@section('add_script')
<script>
// ページを離れようとした際に、アラートを表示する
var onBeforeunloadHandler = function(e) {
    e.returnValue = '記事の編集途中ですが、このページを離れても大丈夫ですか？';
};
window.addEventListener('beforeunload', onBeforeunloadHandler, false);
document.querySelector('button[type="submit"]').addEventListener('click', function(e) { // submitであれば通す
    window.removeEventListener('beforeunload', onBeforeunloadHandler);
}, false);
</script>
@endsection