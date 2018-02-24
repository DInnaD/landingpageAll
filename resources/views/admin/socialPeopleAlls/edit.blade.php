@extends('layouts.app')

    @extends('admin.header_all')
    @extends('layouts.panel')
<?php  /** @var \Illuminate\Support\ViewErrorBag $errors */  ?>
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('socialPeopleAlls.index', compact('peopleAll'))}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Edit SocialPeople: <b>{{$socialPeopleAll->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => array_merge(['socialPeopleAlls.destroy'], compact('peopleAll', 'socialPeopleAll')),'class' => 'confirm-delete', 'method' => 'DELETE'])}}
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ url('/admin')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> admin
            </a>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::model($socialPeopleAll, ['route' => ['socialPeopleAlls.update', 'peopleAll' => $peopleAll, 'socialPeopleAll' => $socialPeopleAll], 'method' => 'PUT']) !!}


        @include('admin.socialPeopleAlls._form')
        @include('admin.socialPeopleAlls._edit_form')

        <div class="form-group">
            {!! Form::button('Edit', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    {{--@include('layouts.errors') --}}

@endsection
