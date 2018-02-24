@extends('layouts.app')

    @extends('admin.header')
    @extends('layouts.panel')
<?php  /** @var \Illuminate\Support\ViewErrorBag $errors */  ?>
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('pages.index', compact('portfolio')) }}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Edit Page: <b>{{$page->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['route' => array_merge(['pages.destroy'], compact('portfolio', 'page')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                    
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::model($page, ['route' => ['pages.update', $portfolio, $page], 'method'=> 'PUT', 'enctype' => 'multipart/form-data', 'file'=>true]) !!}
       

        @include('admin.pages._form')
        @include('admin.pages._edit_form')

        <div class="form-group">
            {!! Form::button('Edit', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    {{--@include('layouts.errors') --}}

@endsection
