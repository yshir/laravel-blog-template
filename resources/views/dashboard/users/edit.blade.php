@extends('dashboard.layouts.app')

@section('users_sidebar_class', 'active')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                      <img src="{{ asset('paper-dashboard/img/background.jpg') }}" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                          <img class="avatar border-white" id="preview" src="{{ isset($user->avatar) ? asset('img/avatars/'.$user->avatar) : asset('img/avatars/default_avatar.jpg') }}" alt="..."/>
                          <h4 class="title">{{ $user->name }}<br />
                             <a href="#"><small>{{ isset($user->nickname) ? '@'.$user->nickname : '@'.$user->name }}</small></a>
                          </h4>
                        </div>
                        <p class="description text-center">
                            "I like the way you work it <br>
                            No diggity <br>
                            I wanna bag it up"
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>{{ $user->posts->count() }}<br /><small>Posts</small></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>126<br /><small>PV</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>94<br /><small>UU</small></h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <form style="display:inline" action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin: 20px;">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ route('dashboard.users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" name="name" class="form-control border-input" placeholder="Username" value="{{ $errors->any() ? old('name') : $user->name }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" name="nickname" class="form-control border-input" placeholder="Nickname" value="{{ $errors->any() ? old('nickname') : $user->nickname }}">
                                        @if ($errors->has('nickname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nickname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control border-input" placeholder="Email" value="{{ $errors->any() ? old('email') : $user->email }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label name="twitter">Twitter URL</label>
                                        <input type="text" name="twitter" class="form-control border-input" placeholder="https://twitter.com/{Twitter ID}" value="{{ $errors->any() ? old('twitter') : (isset($user->sns_links) ? json_decode($user->sns_links)->twitter : '') }}">
                                        @if ($errors->has('twitter'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('twitter') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label name="facebook">Facebook URL</label>
                                        <input type="text" name="facebook" class="form-control border-input" placeholder="https://www.facebook.com/{Facebook ID}" value="{{ $errors->any() ? old('facebook') : (isset($user->sns_links) ? json_decode($user->sns_links)->facebook : '') }}">
                                        @if ($errors->has('facebook'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" class="" value="{{ old('avatar') }}">
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control border-input">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danger！</h4>
                    </div>
                    <div class="content text-center">
                        <form style="display:inline" action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>
</div>
@endsection

@section('add_script')
{{-- formで選択した画像をプレビュー --}}
<script>
    var file = document.querySelector('#avatar');
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
@endsection