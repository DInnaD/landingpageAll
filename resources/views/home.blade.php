<!--ul class="social_links">
            <li style="margin-top: 14px; margin-left: 5px;">@include('call-request::link')</li-->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <p>{{ Auth::user()->name }}</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
       <div class="form-group">
        
        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{-- route('admin.pages.index', compact('pages')) --}}{{ url('/'),'Back' }}{{-- link_to_route('admin.index', compact('data')) --}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
        </a>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
