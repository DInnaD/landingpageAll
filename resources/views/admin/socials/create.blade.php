
@extends('layouts.app')

    @extends('admin.header')
    @extends('layouts.panel')
<?php  /** @var \Illuminate\Support\ViewErrorBag $errors    $page_*/  ?>
@section('panel')
    <div class="panel-heading container-fluid">
    
        <div class="form-group">
        
        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('socials.index', compact('social')) }}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Social</b></div>
            <a class="pull-right btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ url('/admin')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> admin
            </a> 
        <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{--Form::open(['class' => 'confirm-delete', 'route' => ['social.destroy', $social->id], 'method' => 'DELETE'])}--}

                    {{-- link_to_route('social.edit', 'edit', [$social->id], ['class' => 'btn btn-primary btn-xs']) --}} 

                    
                    {{--Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()--}}
                </div>
            </div>   

        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'socials.store']) !!}
                               

                                
        @include('admin.socials._form')
        <input type="hidden" name="created_by" value="{{Auth::id()}}">

        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    

@endsection
