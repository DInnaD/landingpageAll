@extends('layouts.app')

    @extends('admin.header')
    @extends('layouts.panel')
<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\SocialPeople $socialPeople */
?>
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('socialPeoples.index', compact('people'))}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">SocialPeoples: <b>{{$socialPeople->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => array_merge(['socialPeoples.destroy'], compact('people', 'socialPeople')),'class' => 'confirm-delete', 'method' => 'DELETE'])}}
                    {{-- link_to_route('socialPeoples.edit', 'edit', ['people' => $people, 'socialPeople' => $socialPeople], ['class' => 'btn btn-primary btn-xs']) --}} |
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

        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
            @foreach ($socialPeople->getAttributes() as $attribute => $value)
                <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
