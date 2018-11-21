@extends('dashboard.layouts.app')

@section('posts_sidebar_class', 'active')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-post">
                    <div class="image" style="height: auto;">
                      <img src="{{ isset($post->thumbnail) ? asset('img/posts/'.$post->thumbnail) : asset('img/posts/default.jpg') }}" id="preview" alt="thumbnail_preview"/>
                    </div>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>1<br /><small>Posts</small></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>126<br /><small>PV</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>94<br /><small>UU</small></h5>
                            </div>
                        </div>
                    </div>
                    @if ($canWriteAll)
                        <hr style="margin: 0;">
                        <div class="text-center">
                            <div class="row">
                                <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="delete" class="submit btn btn-danger" style="margin: 20px;">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Post</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ route('dashboard.posts.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control border-input" placeholder="Title" value="{{ $post->title }}" required>
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
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <p class="form-control">https://test.com/post/</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <input type="slug" name="slug" class="form-control border-input" placeholder="Slug" value="{{ $post->slug }}" required>
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
                                            @if (isset($post->category))
                                                <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
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
                                        <label for="user_id">Author</label>
                                        <select name="user_id" id="user_id" class="form-control border-input" required>
                                            <option value="{{ $post->user->id }}">{{ $post->user->name }}</option>
                                            @if ($post->user_id !== Auth::id())
                                                <option value="{{ Auth::id() }}">{{ Auth::user()->name }}</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description (Max: 300)</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Meta description..." rows="3">{{ $post->meta_description }}</textarea>
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
                                        <label for="thumbnail">Thumbnail</label>
                                        <input type="file" id="thumbnail" name="thumbnail" accept="image/png, image/jpeg" class="" value="{{ $post->thumbnail }}">
                                        @if ($errors->has('thumbnail'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('thumbnail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label name="body">Body</label>
                                        <textarea id="body" name="body" class="form-control" placeholder="Here can be your nice text" rows="10" required>{{ $post->body }}</textarea>
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
                                        <input type="text" name="canonical" class="form-control border-input" placeholder="Duplicated page URL: https://example.com/foo/bar " value="{{ $post->canonical }}" {{ $canWriteAll ? '' : 'readonly' }}>
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
                                        <textarea name="head_html" class="form-control" placeholder="<script>\nfoo?$!%$bar\n</script>" rows="3" {{ $canWriteAll ? '' : 'readonly' }}>{{ $post->head_html }}</textarea>
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
                                        <textarea name="footer_html" class="form-control" placeholder="<script>\nfoo?$!%$bar\n</script>" rows="3" {{ $canWriteAll ? '' : 'readonly' }}>{{ $post->footer_html }}</textarea>
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
                                        <input type="date" name="published_at" class="form-control border-input" value="{{ date('Y-m-d', strtotime($post->published_at)) }}" required>
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
                                            <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>下書き</option>
                                            <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>公開</option>
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
                                <button type="submit" id="update" style="margin: 20px;" class="btn btn-info btn-fill btn-wd">Save</button>
                            </div>
                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')

{{-- tinymceのセットアップ --}}
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
    selector:'textarea#body',
    branding: false,
    plugins: "link image code jbimages",
    menubar: false,
    toolbar: 'undo redo | styleselect | bold italic blockquote | link image jbimages | code',
    relative_urls: false,
});
</script>

{{-- formで選択した画像をプレビュー --}}
<script>
var file = document.querySelector('#thumbnail');
file.onchange = function (){
  var fileList = file.files;
  //読み込み
  var reader = new FileReader();
  reader.readAsDataURL(fileList[0]); 
  //読み込み後
  reader.onload = function  () {
    document.querySelector('#preview').src = reader.result;
  };
};
</script> 

{{-- ページを離れようとした際に、アラートを表示する --}}
<script>
var onBeforeunloadHandler = function(e) {
    e.returnValue = '記事の編集途中ですが、このページを離れても大丈夫ですか？';
};
window.addEventListener('beforeunload', onBeforeunloadHandler, false);
document.querySelector('#update').addEventListener('click', function(e) {
    window.removeEventListener('beforeunload', onBeforeunloadHandler);
}, false);
document.querySelector('#delete').addEventListener('click', function(e) {
    window.removeEventListener('beforeunload', onBeforeunloadHandler);
}, false);
</script>
@endsection