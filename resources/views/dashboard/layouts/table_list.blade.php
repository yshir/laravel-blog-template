@extends('dashboard.layouts.app')

@section('content')    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header" style="display:flex; justify-content: space-between;">
                    <div>
                        <h4 class="title">@yield('t-title')</h4>
                        <p class="category">@yield('t-category')</p>
                    </div>
                    @yield('create_btn')
                </div>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            @yield('t-content')
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection